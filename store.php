<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Cache-Control: post-chechk=0, pre-check=0, FALSE');
header('Pragma: no-cache');
header('Expires: 0');
session_start(); // Start the session

// Database settings
$servername = "localhost:3306"; // Change this to your MySQL servername
$username = "root"; // Change this to your MySQL root username
$password = ""; // Change this to your MySQL root password
$dbname = "user_database"; // Change to your desired database name

// Create a new connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Success & Error message
$msg = "Your Data Saved...";
$err = "Something Wrong Happend!";
$derr = "Database Error";
$eerr = "You Entered Not Sufficient Data.";
$perr = "Data Can't Be Fetched.";

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input from the POST data
    $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $in_time = isset($_POST['in_time']) ? $_POST['in_time'] : '';
    $subject = isset($_POST['subject']) ? $_POST['subject'] : '';
    $out_time = isset($_POST['out_time']) ? $_POST['out_time'] : '';
    date_default_timezone_set('Asia/Kolkata');
    $current_date_time = date('Y-m-d H:i:s');

    // Check if all input is set
    if (!empty($user_name) && !empty($email) && !empty($phone) && !empty($in_time) && !empty($subject) && !empty($out_time)) {
        
        // Prepare the SQL statement to insert the user data
        $sql = "INSERT INTO users (name, email, phone, in_time, subject, out_time, created_at) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind the parameters
            $stmt->bind_param("sssssss", $user_name, $email, $phone, $in_time, $subject, $out_time, $current_date_time);

            // Execute the statement
            $result = $stmt->execute();

            // Check if the execution was successful
            if ($result) {
                $stmt->close();
                $conn->close();
                $msg = htmlspecialchars($msg, ENT_QUOTES, 'UTF-8');
                $_SESSION['response'] = $msg;
                header("Location: success(sql).php"); 
                exit;
            } else {
                $temp = $conn->error;
                // Close the statement
                $stmt->close();
                // Close the database connection
                $conn->close();
                $output1="Error: $sql";
                $output1 = htmlspecialchars($output1, ENT_QUOTES, 'UTF-8');
                $temp = htmlspecialchars($temp, ENT_QUOTES, 'UTF-8');
                $_SESSION['response'] = $err;
                $_SESSION['error'] = $temp;
                header("Location: error(sql).php"); 
                exit;
            }
        } else {
            // Close the database connection
            $conn->close();
            $output1="Error in Database connection...";
            $output1 = htmlspecialchars($output1, ENT_QUOTES, 'UTF-8');
            $derr = htmlspecialchars($derr, ENT_QUOTES, 'UTF-8');
            $_SESSION['response'] = $output1;
            $_SESSION['error'] = $derr;
            header("Location: error(sql).php"); // Redirect to error page
            exit;
        }
} else {
        // Close the database connection
        $conn->close();
        $output1="Error in Processing Data...";
        $output1 = htmlspecialchars($output1, ENT_QUOTES, 'UTF-8');
        $eerr = htmlspecialchars($eerr, ENT_QUOTES, 'UTF-8');
        $_SESSION['response'] = $output1;
        $_SESSION['error'] = $eerr;
        header("Location: error(sql).php"); // Redirect to error page
        exit;
}
} else {
        // Close the database connection
        $conn->close();
        $output1="Error in POST Request...";
        $output1 = htmlspecialchars($output1, ENT_QUOTES, 'UTF-8');
        $perr = htmlspecialchars($perr, ENT_QUOTES, 'UTF-8');
        $_SESSION['response'] = $output1;
        $_SESSION['error'] = $perr;
        header("Location: error(sql).php"); // Redirect to error page
        exit;
    
}
}
?>