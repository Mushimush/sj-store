<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sjstore";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (session_id() == '') {
    //session has not started
    session_start();
}
