<?php
$servername = "hercules.cs.uregina.ca";
$username = "feng209j";
$password = "qazwsx88";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>