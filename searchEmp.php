<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: gray;
            text-align: center;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .no-data {
            color: red;
            font-size: 20px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <h2>Employee Details</h2>

    <?php
    $myconn = mysqli_connect('localhost', 'root', '', 'practice_db', 3307);
    if (!$myconn) {
        die("<p class='no-data'>Connection failed: " . mysqli_connect_error() . "</p>");
    }
    echo "<p>Connected successfully!</p>";

    $sql = "SELECT * FROM employeedetail";
    $record = $myconn->query($sql);

    if (mysqli_num_rows($record) > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Name</th><th>Mobile No.</th><th>Department</th><th>Salary</th></tr>";

        while ($row = mysqli_fetch_assoc($record)) {
            echo "<tr>
                    <td>{$row["empId"]}</td>
                    <td>{$row["empName"]}</td>
                    <td>{$row["empMobileNo"]}</td>
                    <td>{$row["empDep"]}</td>
                    <td>{$row["empSalary"]}</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='no-data'>No data found</p>";
    }

    mysqli_close($myconn);
    ?>

</body>

</html>