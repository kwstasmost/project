<?php
require_once("connectDb.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {

   $mail     = mysqli_real_escape_string($db,$_POST['mail']);
   $password = mysqli_real_escape_string($db,$_POST['password']);
   $sql = "SELECT * FROM users WHERE email = '$mail' and password = '$password'";
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $count = mysqli_num_rows($result);

   if($count == 1) {
      session_start();
      $_SESSION['user'] = $row['fname'].' '. $row['lname'];
      $_SESSION['userid'] = $row['userid'];
      $_SESSION['mail'] = $row['email'];
      $_SESSION['user_type'] = $row['user_type'];
      header("location: index.php");
   }else {
      header("location: login.php");
      echo "Invalid email and/or password.";
   }
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<title>Company vacations</title>
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" 
class="form-inline" style="margin-left:25%;margin-top:20%;">
<div class="form-group">
   <label for="mail">Email:</label>
   <input type="text" name="mail" placeholder="Enter Email" class="form-control" required>
</div>
<div class="form-group">
   <label for="password">Password:</label>
   <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
</div>
   <input type="submit" value="Login" id="submit" class="btn btn-primary form-control">
</form>
</body>
</html>
