<?php
session_start();
$_SESSION['logged_in'] = false;
header("Location: home.php");?>