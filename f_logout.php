<?php
session_start();
session_unset();
header("location:f_login.php");
?>