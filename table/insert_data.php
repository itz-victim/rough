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

// Get form data
$parentName = $_POST['parent_name'];
$childData = $_POST['child_data'];

// Insert data into parent table
$insertParentSQL = "INSERT INTO parent_table (name) VALUES ('$parentName')";

if ($conn->query($insertParentSQL) === TRUE) {
    echo "New record created in parent table successfully. ";
} else {
    echo "Error inserting record into parent table: " . $conn->error;
}

// Get the ID of the last inserted record in parent table
$parentId = $conn->insert_id;

// Insert data into child table using the parent_id foreign key
$insertChildSQL = "INSERT INTO child_table (parent_id, child_data) VALUES ('$parentId', '$childData')";

if ($conn->query($insertChildSQL) === TRUE) {
    echo "New record created in child table successfully. ";
} else {
    echo "Error inserting record into child table: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
