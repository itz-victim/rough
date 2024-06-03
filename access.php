<!DOCTYPE html>
<html>
<head>
    <title>View Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
       }

        form {
            display: flex;
            margin-bottom: 20px;
        }

        input[type="number"] {
            padding: 6px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 50%;
        }

        input[type="submit"] {
            padding: 6px 12px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 40%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        Enter number of rows to view: <input type="number" name="rows" value="">
        <input type="submit" value="View Data">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rows = $_POST["rows"];
        if ($rows >0) {

        $url = "http://localhost/api/api.php?limit=". $rows;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set custom request header
        /*$headers = array(
            'X-Limit: ' . $rows
        );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        */
        $result = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($result, true);

        if (isset($result['status'])) {
            if ($result['status'] == true) {
                // API request was successful
    ?>
                <table>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone</td>
                        <td>In_Time</td>
                        <td>Subject</td>
                        <td>Out_Time</td>
                        <td>Date</td>
                    </tr>
                    <?php
                    foreach ($result['data'] as $list) {
                        echo "<tr>
                                <td>" . $list['id'] . "</td>
                                <td>" . $list['name'] . "</td>
                                <td>" . $list['email'] . "</td>
                                <td>" . $list['phone'] . "</td>
                                <td>" . $list['in_time'] . "</td>
                                <td>" . $list['subject'] . "</td>
                                <td>" . $list['out_time'] . "</td>
                                <td>" . $list['created_at'] . "</td>
                              </tr>";
                    }
                    ?>
                </table>
                <?php
            } else {
                // API request failed
                echo "API request failed: " . $result['message'];
            }
        } else {
            echo "API not working";
        }
    } else {
        echo "Please enter any number > 0";
    }
}
    ?>
</body>
</html>