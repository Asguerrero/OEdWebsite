<?php

$server = "localhost";
$username = "id13934709_root";
$password = "tLuj_kFsy3fKaYZ";
$database = "id13934709_outdoor";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn) {
	die("Connection Failed: " .mysqli_connect_error());
} 