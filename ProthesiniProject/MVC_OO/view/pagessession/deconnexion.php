<?php 
   session_start();
   session_destroy();
   index("location:login.php");
?>