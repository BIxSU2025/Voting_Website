<?php
session_start();
include("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `admincheck` WHERE `username`='$username' AND `password`='$password'";
    $result = mysqli_query($con, $query);

    if ($row = mysqli_fetch_array($result)) {
        
        $_SESSION['username'] = $username;

        
        if (isset($_POST['remember'])) {
            setcookie("username", $username, time() + 60, "/"); 
        }

        header("location: adminpage.php");
        exit();
    } else {
        header("location:adminloginpage.php");
    }
}
?>



