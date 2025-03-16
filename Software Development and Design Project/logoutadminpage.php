<?php
include("dbconnect.php");
session_start();
session_unset();
header("location:adminloginpage.php");
?>