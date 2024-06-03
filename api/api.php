<?php

// Database settings
$servername = "localhost:3306"; // Change this to your MySQL servername
$username = "root"; // Change this to your MySQL root username
$password = ""; // Change this to your MySQL root password
$dbname = "user_database"; // Change to your desired database name

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Get the limit value from the query parameter
    $limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 10;

    // Prepare a SQL query to select data from the user table
    $sql = "SELECT * FROM users LIMIT " . $limit;

    // Execute the SQL query
    $res = mysqli_query($conn, $sql);

    // Determine the number of rows in the result set
    $count = mysqli_num_rows($res);

    // Set the Content-Type of the response to application/json
    header('Content-Type', 'application/json');

    // If some data is found
    if ($count > 0) {
        // Initialize an empty array to store the data
        $arr = [];

        // Fetch each row of the result set as an associative array
        // and store it in the $arr array
        while ($row = mysqli_fetch_assoc($res)) {
            $arr[] = $row;
        }

        // Print out the JSON string with some additional status information
        echo json_encode(['status' => true, 'data' => $arr, 'result' => 'found']);
    } else {
        // If no data is found, print out a JSON string with some additional status information
        echo json_encode(['status' => true, 'data' => 'No data found', 'result' => 'not']);
    }
}

?>