<?php
   session_start();

   if(!isset($_SESSION['userid'])){
      header("location:login.php");
      session_destroy();
      $_SESSION = array();
   }
?>