<?php
require_once("connectDb.php");
require_once("session.php");
$userid=$_GET['userid'];
$sql = "SELECT * FROM users WHERE userid = '$userid'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
if($count==1){
    $fname     = $row['fname'];
    $lname     = $row['lname'];
    $mail      = $row['email'];
    $user_type = $row['user_type'];
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<form method="post" action="update.php" class="form-group" style="margin: 5% 5%;">
    <input type="hidden" id="userid" name="userid" value="<?php echo $userid; ?>">
	<label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" value="<?php echo $fname;?>"><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname" value="<?php echo $lname;?>"><br>
    <label for="email">Email:</label><br>
    <input type="text" id="mail" name="mail" value="<?php echo $mail;?>"><br><br>
    <label for="usertype">User type:</label>
    <select id="usertype" name="user_type" >
    <option value="employee" <?php if($user_type == 'employee'){ echo ' selected="selected"'; } ?> >Employee</option>
    <option value="admin"    <?php if($user_type == 'admin'   ){ echo ' selected="selected"'; } ?> >Admin</option>
    </select><br><br>
	<input type="submit" value="Update" id="submit">
</form>
</body>
</html>