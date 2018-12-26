<?php

$host = "localhost";
$username = "root";
$pass = ""; 
$db = "giangday";

$conn = mysqli_connect($host,$username,$pass,$db);

if ($conn === false) {
  die("ERROR: Could not connect. " . mysqli_connect_error());
}