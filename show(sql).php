<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.png">

    <title>Stored Informations Display</title>
    <style>
        body {
            background-color: black;
            color: white;
        }

        pre {
            background-color: transparent;
            border: 1px solid #ccc;
            color: white;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            margin-bottom: 10px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
            overflow: auto; /* Add overflow for long content */
        }

        pre:focus {
            border-color: #007bff;
            background-color: transparent; /* Set background color to transparent when focused */
            outline: none;
        }
    </style>
</head>
<body>
    <h2>All informations...<hr></h2>
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

$query = "SELECT id, name, email, phone, in_time, subject, out_time, created_at FROM users";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
  $date = new DateTime($row["created_at"]); // create a new DateTime object from the created_at column
  $formatted_date = $date->format('d/m/Y') . "\tTime: " . $date->format('h:i A') . "\tsec: " . $date->format('s');
  echo "<pre>ID: " . $row["id"] . "</pre>";
  echo "<p>Name: " . $row["name"] . "</p>";
  echo "<p>Email: " . $row["email"] . "</p>";
  echo "<p>Phone: " . $row["phone"] . "</p>";
  echo "<p>In_time: " . $row["in_time"] . "</p>";
  echo "<p>Subject: " . $row["subject"] . "</p>";
  echo "<p>Out_time: " . $row["out_time"] . "</p>";
  echo "<p>Date: {$formatted_date}</p>";
  echo "<p><br><br></p>";
}

mysqli_free_result($result);
mysqli_close($conn);

}
    ?>
</body>
</html>