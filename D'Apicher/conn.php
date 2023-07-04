<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "apchier";

$conn = mysqli_connect($server, $user, $password, $database);

mysqli_select_db($conn, $database);
?>