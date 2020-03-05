<?php
// require_once("connectDb.php");
// $id=$_GET['id'];
// $mail=$_GET['mail'];
// $sql = "SELECT * FROM applications where id=$id";
// $result = $db->query($sql);
// $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
// $date=$row['date'];

// if($row['status']==='pending'){
//     $msg= "<i>Dear employee, your supervisor has rejected your application submitted on\n
//     {$date}.</i>";
//     $sql = "UPDATE applications SET status='rejected' WHERE id=$id"; 
//     $db->query($sql);
// }