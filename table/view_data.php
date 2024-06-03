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

// Query parent table
$parentQuery = "SELECT * FROM parent_table";
$parentResult = $conn->query($parentQuery);

echo "<h2>Parent Table</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Name</th></tr>";
if ($parentResult->num_rows > 0) {
    while($row = $parentResult->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>No records found</td></tr>";
}
echo "</table>";


// Query child table
$childQuery = "SELECT child_table.id, parent_table.name AS parent_name, child_table.child_data 
                FROM child_table 
                INNER JOIN parent_table 
                ON child_table.parent_id = parent_table.id";

$childResult = $conn->query($childQuery);

echo "<h2>Child Table</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Parent Name</th><th>Child_name</th></tr>";
if ($childResult->num_rows > 0) {
    while($row = $childResult->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["parent_name"]."</td><td>".$row["child_data"]."</td></tr>";
    }
} else {
    echo "<tr><td colspan='3'>No records found</td></tr>";
}
echo "</table>";

// Close the database connection
$conn->close();
?>
