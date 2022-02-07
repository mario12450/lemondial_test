<?php

// session_start();

if (session_status() == PHP_SESSION_NONE) {
session_start(); }
if (isset($_SESSION['session_var_user'])) { }
else {
header("location: login.php"); }

session_destroy();

header("location:login.php");
die();

?>