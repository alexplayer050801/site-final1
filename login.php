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

// Create a table to store user data
$sql = "CREATE TABLE users (
    ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    NAME VARCHAR(30) NOT NULL,
    PASSWORD VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Add users to the database
$sql = "INSERT INTO users (ID, NAME, PASSWORD)
           VALUES (1, 'Alex', '1234')";
$conn->query($sql);

$sql = "INSERT INTO users (ID, NAME, PASSWORD)
           VALUES (2, 'Andrei', '1234')";
$conn->query($sql);

$sql = "INSERT INTO users (ID, NAME, PASSWORD)
           VALUES (3, 'Maria', '1234')";
$conn->query($sql);

// Read all users from the database
$sql = "SELECT ID, NAME, PASSWORD from users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["ID"]. " - Name: " . $row["NAME"]. " - Password: " . $row["PASSWORD"]. "<br>";
    }
} else {
    echo "0 results";
}

// Update a user's password
$sql = "UPDATE users set PASSWORD = '5678' where ID = 1";
$conn->query($sql);

// Delete a user from the database
$sql = "DELETE from users where ID = 3";
$conn->query($sql);

// Close the database connection
$conn->close();

?>
