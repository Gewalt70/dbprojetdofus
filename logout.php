<?php
   include 'front/header.php';
   session_destroy();
   header('Location: index.php');
?>
