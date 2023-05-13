<?php

// Connect to the database
$servername = "localhost";
$username = "itech182";
$password = "kKznoaUFjM%q";
$dbname = "itech182";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the submitted username and password match any user in the database
$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM users WHERE NAME = '$username' AND PASSWORD = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    // If there's a match, redirect the user to "example.html"
    header("Location: https://alexplayer050801.github.io/Vlad-Alexandru-new-code-2/Vlad%20Alexandru%20new-code.html");
} else {
    // If there's no match, redirect the user to "no.html"
    header("Location: https://alexplayer050801.github.io/b-e/bids-and-exhibtions.html");
}

$conn->close();

?>

