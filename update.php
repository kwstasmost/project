<?php
require_once("connectDb.php");
require_once("session.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];
    $fname     = mysqli_real_escape_string($db,$_POST['fname']);
    $lname     = mysqli_real_escape_string($db,$_POST['lname']);
    $mail      = mysqli_real_escape_string($db,$_POST['mail']);
    $user_type = mysqli_real_escape_string($db,$_POST['user_type']);
    $sql = "UPDATE users SET fname='$fname',lname='$lname',email='$mail', user_type='$user_type' WHERE userid=$userid"; 
    if($db->query($sql) === true){ 
        echo "User info were updated successfully.";
        header("location: index.php"); 
    } else{ 
        echo "Could not update user.";
        //header("location: index.php"); 
    }
}