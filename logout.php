<?php
sessios_start();
session_destroy();

header('location:login.php');
?>