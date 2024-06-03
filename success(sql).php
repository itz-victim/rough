    <?php
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');
    session_start(); // Start the session
    //error_reporting(E_ERROR | E_PARSE);

    $response = '';
    if (isset($_SESSION['response'])) {
            $response = $_SESSION['response'];
            unset($_SESSION['response']); // Remove the message from the session variable
        }

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
            <center><h3>SUCCESSFUL ✅<hr></h3></center>
            <h4>congratulations🎉....</h4>
            <p><font style='color: cyan;'>(Your data saved.)</font></p>

        <?php
        // Display the message from the session variable
        if (isset($response)) {
            echo "<p>Message : <font style='color: #FFFF00;'>{$response}</font></p>";
        }
        // destroy all session variables
        session_unset();

        // end the session
        session_destroy();
    ?>
        </div>
    </body>
    </html>