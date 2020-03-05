<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    $message ="<i>Dear supervisor, employee {$_SESSION['user']} requested for some time off, starting on {$_POST['datefrom']} and<br>\n
    ending on {$_POST['dateto']}, stating the reason:<br>\n
    {$_POST['reason']}<br>\n
    Click on one of the below links to approve or reject the application:\n
    <a href='approve.php'>Approve</a> - <a href='reject.php'>Reject</a></i>";
    echo $message;
}

