<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete in MySQL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
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
    <center>
        <form action="deleteEmp.php" method="post">
            <lable for="eid">Employee ID: </lable>
            <input type="text" name="eid" placeholder="Enter Employee ID"><br><br>
            <input type="submit" value="Search" name="search">
        </form>
        <?php

        if (isset($_POST["search"])) {
            $eid = $_POST["eid"];

            $myconn = mysqli_connect('localhost', 'root', '', 'practice_db', 3307);
            if (!$myconn) {
                die("<p class='no-data'>Connection failed: " . mysqli_connect_error() . "</p>");
            }
            echo "<p> Connected successfully! </p> <br>";
            $sql = "SELECT * FROM employeedetail WHERE empId = $eid";
            $record = $myconn->query($sql);
            $n = mysqli_num_rows($record);
            if ($n > 0) {
                session_start();
                $_SESSION["empId"] = $eid;
                echo "<table>";
                echo "<tr><th>ID</th><th>Name</th><th>Mobile No.</th><th>Department</th><th>Salary</th></tr>";

                while ($row = mysqli_fetch_assoc($record)) {
                    echo "<tr>
                            <td>{$row["empId"]}</td>
                            <td>{$row["empName"]}</td>
                            <td>{$row["empMobileNo"]}</td>
                            <td>{$row["empDep"]}</td>
                            <td>{$row["empSalary"]}</td>
                            <form action='dataDelete.php' method='post'>
                            <td><input type='submit' name='delete' value='delete'></td>
                            </form>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "<p class='no-data'>No data found</p>";
            }
        }
        ?>
    </center>
</body>

</html>