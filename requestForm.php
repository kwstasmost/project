<?php
require_once("connectDb.php");
require_once("session.php");
if(isset($_POST['submit'])){
  $date = date("Y-m-d h:i:s");
  $vacation_start = $_POST['vacation_start'];
  $vacation_end   = $_POST['vacation_end'];
  $reason         = $_POST['reason'];
  $userid = $_SESSION['userid'];
  $mail = $_SESSION['mail'];
  $sql = "INSERT INTO applications (userid, date, vacation_start, vacation_end, reason, status)
  VALUES ($userid, '$date', '$vacation_start', '$vacation_end', '$reason', 'pending')";
  
  if ($vacation_end > $vacation_start) {
    $db->query($sql);
    $sql = "SELECT * FROM applications where date='$date'";
    $result = $db->query($sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    header("location: index.php");
  } else {
    echo "Error creating application.<br>";
    echo "<a href='index.php'>Go back</a><br><br>";
    //header("location: index.php");
  }
}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-group" style="margin: 5% 5%;"> 
<h3>Create an application</h3><br><br>
  <label for="vacation_start">Vacation start:</label><br>
  <input type="date" id="vacation_start" name="vacation_start"><br><br>
  <label for="vacation_end">Vacation end:</label><br>
  <input type="date" id="vacation_end" name="vacation_end"><br><br>
  <label for="reason">Reason:</label><br>
  <textarea id="reason" name="reason" rows="4" cols="50"></textarea><br><br>
	<input type="submit" value="Submit" id="submit" name="submit">
</form>
</body>
</html>