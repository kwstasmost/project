<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div style="margin-top:30px;">
    <div class="col-md-10 col-md-offset-1">
<?php
require_once("connectDb.php");
require_once("session.php");
if($_SESSION['user_type']==="employee"){
    ?>
    <form action="requestForm.php" method="post">
        <input type="submit" value="Create application" class="btn btn-success" id="submit">
    </form>
    <?php
    echo "<i style='float:right;'>Welcome user ".$_SESSION['user']."</i><br>";
    echo "<a href='logout.php' style='float:right;'>Log out</a><br><br>";
    $sql = "SELECT * FROM applications";
    $result = $db->query($sql);
    if ($result->num_rows > 0){
        echo "<table class='table'><tr>
        <th>Date submitted</th>
        <th>Dates requested</th>
        <th>Days requested</th>
        <th>Status</th></tr>";
        while($row = $result->fetch_assoc()) {
            $datetime1 = new DateTime($row["vacation_start"]);
            $datetime2 = new DateTime($row["vacation_end"]);
            $difference = $datetime1->diff($datetime2);
            echo "<tr><td>".$row['date']."</td>
            <td>".$row['vacation_start']." - ".$row['vacation_end']."</td>
            <td>".$difference->d." days</td>
            <td>".$row['status']."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "There are no applications.";
    }
}else{
    ?>
    <form action="createUser.php" method="post">
        <input type="submit" value="Create user" class="btn btn-success" id="submit">
    </form>
    <?php
    echo "<i style='float:right;'>Welcome user ".$_SESSION['user']."</i><br>";
    echo "<a href='logout.php' style='float:right;'>Log out</a><br><br>";
    $sql = "SELECT * FROM users";
    $result = $db->query($sql);
    if ($result->num_rows > 0){
        echo "<table class='table'><tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>User type</th></tr>";
        while($row = $result->fetch_assoc()) {
            $id=$row['userid'];
            echo "<tr><td><a href='updateUser.php?userid=$id'>".$row['fname']."</a></td>
            <td><a href='updateUser.php?userid=$id'>".$row['lname']."</a></td>
            <td><a href='updateUser.php?userid=$id'>".$row['email']."</a></td>
            <td><a href='updateUser.php?userid=$id'>".$row['user_type']."</a></td></tr>";
        }
        echo "</table>";
    } else {
        echo "There are no users.";
    }
}
$db->close();
?>
    </div>
</div>
</body>
</html>
