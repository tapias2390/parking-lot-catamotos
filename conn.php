<?php

//MySQLi Procedural

$servername = "localhost";
//$username = "castamot_parking-lot";
$username = "root";
//$password = "X9s[lgRqml3O";
$password = "";
$database = "castamot_parking-lot";
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
