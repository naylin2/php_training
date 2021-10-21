<?php

$servername = "localhost";
$username = "root";
$password = "yesdaddy";
$db = "test";

$mysqli = new mysqli($servername, $username, $password, $db);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
