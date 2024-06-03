<?php
// Database connection parameters
$servername = "localhost:3306";
$username = "root";
$password = "";
$database = "user_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define your SQL queries
$createParentTableSQL = "CREATE TABLE parent_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50)
)";

$createChildTableSQL = "CREATE TABLE child_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    parent_id INT,
    FOREIGN KEY (parent_id) REFERENCES parent_table(id),    
    child_data VARCHAR(50)
)";

// Execute the SQL queries
if ($conn->query($createParentTableSQL) === TRUE) {
    echo "Parent table created successfully. ";
} else {
    echo "Error creating parent table: " . $conn->error;
}

if ($conn->query($createChildTableSQL) === TRUE) {
    echo "Child table created successfully. ";
} else {
    echo "Error creating child table: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
