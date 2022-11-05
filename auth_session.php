<?php
include('php/connect.php');
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    if (!isset($_SESSION["email"])) {
        header("Location: login.php");
        }
    exit();
}
