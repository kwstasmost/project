<?php
// require_once("connectDb.php");
// $id=$_GET['id'];
// $mail=$_GET['mail'];
// $sql = "SELECT * FROM applications where id=$id";
// $result = $db->query($sql);
// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
// $date=$row['date'];

// if($row['status']==='pending'){
//     $msg= "<i>Dear employee, your supervisor has accepted your application submitted on\n
//     {$date}.</i>";
//     $sql = "UPDATE applications SET status='approved' WHERE id=$id"; 
//     $db->query($sql);
// }

// $id=$row['id'];
// $message ="<i>Dear supervisor, employee {$_SESSION['user']} requested for some time off, starting on {$_POST['vacation_start']} and<br>\n
// ending on {$_POST['vacation_end']}, stating the reason:<br>\n
// {$_POST['reason']}<br>\n
// Click on one of the below links to approve or reject the application:\n
// <a href='approve.php?id=$id&mail=$mail'>Approve</a> - <a href='reject.php?id=$id&mail=$mail'>Reject</a></i>";
// $subject="Vacations";
// //mail($mail,$subject,$message);