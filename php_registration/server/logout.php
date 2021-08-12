<?php
   session_start();
   session_unset();
   session_destroy();
   header("Location: http://localhost/php_registration/client/index.php");
   exit();
?>