<?php
require_once("connectDb.php");
require_once("session.php");
if(isset($_POST['submit']) ){
    $fname     = mysqli_real_escape_string($db,$_POST['fname']);
    $lname     = mysqli_real_escape_string($db,$_POST['lname']);
    $mail      = mysqli_real_escape_string($db,$_POST['mail']);
    $password  = sha1(mysqli_real_escape_string($db,$_POST['password']));
    $user_type = mysqli_real_escape_string($db,$_POST['user_type']);
    $sql = "INSERT INTO users (fname, lname, email,password,user_type)
    VALUES ('$fname', '$lname', '$mail','$password','$user_type')";
    if($_POST['password']===$_POST['cpassword']){
        if ($db->query($sql) === TRUE) {
            echo "New user created successfully";
            header("location: index.php");
        } else {
            echo "Error creating user.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"method="post" class="form-group" style="margin: 5% 5%;">
	<label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname"><br>
    <label for="lname">Last name:</label><br>
    <input type="text" id="lname" name="lname"><br>
    <label for="mail">Email:</label><br>
    <input type="text" id="mail" name="mail"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br>
    <label for="cpassword">Confirm password:</label><br>
    <input type="password" id="cpassword" name="cpassword"><br><br>
    <label for="usertype">User type:</label>
    <select id="usertype" name="user_type">
    <option value="employee">Employee</option>
    <option value="admin">Admin</option>
    </select><br><br>
	<input type="submit" value="Create" id="submit" name="submit">
</form>
</body>
</html>