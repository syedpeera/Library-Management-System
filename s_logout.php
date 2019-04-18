<?php
session_start();
session_unset();
header("location:s_login.php");
?>