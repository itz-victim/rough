<?php
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
session_start(); // Start the session
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.png">

    <title>Finally</title>
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
        }

        h1, h3 {
            background-color: transparent;
            border: 1px solid #ccc;
            color: white;
            padding: 10px;
            border-radius: 15px;
            width: fit-content;
            margin: 10px auto;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
            text-align: center;
        }

        h1:focus, h3:focus {
            border-color: #007bff;
            background-color: transparent; /* Set background color to transparent when focused */
            outline: none;
        }

        h1 {
            font-size: 14px; /* Change the font size to 14px */
        }

h4 {
  margin: 0; /* remove the top margin of the h1 element */
}

p {
  margin: 0; /* remove the bottom margin of the p element */
}


    </style>
</head>
<body>
    <div>
        <center><h3>UNSUCCESSFUL ❌<hr></h3></center>
        <h4>sorry🙍🏻‍♂️....</h4>
        <p><font style='color: pink;'>(Unable to save data.)</font></p>

    <?php
    // Display the message from the session variable
    if (isset($_SESSION['response'])) {
        echo "<p>Message : <span style='color: #FFFF00;'>{$_SESSION['response']}</span></p>";
        unset($_SESSION['response']); // Remove the message from the session variable
    }
    if (isset($_SESSION['error'])) {
        echo "<p>Error : <span style='color: red;'>{$_SESSION['error']}</span></p>";
        unset($_SESSION['error']); // Remove the message from the session variable
    }
    // destroy all session variables
    session_unset();

    // end the session
    session_destroy();
    ?>

<p><a href="index.html" style="color: cyan;">Return to the homepage</a></p>

    </div>
</body>
</html>