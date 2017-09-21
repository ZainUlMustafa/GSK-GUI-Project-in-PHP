<?php
	session_start();
   
	/*if(session_destroy()) {
    	header("Location: login.php");
   	}*/

   	session_destroy();
    $_SESSION = array();
    header("location:login.php");
?>