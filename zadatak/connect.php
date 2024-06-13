<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "portal_vijesti";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if (!$connection) {
    die('Error connecting to MySQL server: ' . mysqli_connect_error());
}

mysqli_set_charset($connection, "utf8");
?>

