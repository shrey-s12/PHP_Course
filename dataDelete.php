<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            text-align: center;
            margin: 20px;
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
        <?php
        $myconn = mysqli_connect('localhost', 'root', '', 'practice_db', 3307);
        if (!$myconn) {
            die("<p class='no-data'>Connection failed: " . mysqli_connect_error() . "</p>");
        }
        echo "<p> Connected successfully! </p> <br>";

        session_start();
        $eid = $_SESSION["empId"];

        $sql = "delete from employeedetail where empId=?";
        $ps = $myconn->prepare($sql);
        $ps->bind_param("i", $eid);
        $ps->execute();
        echo "Data Deleted Successfully";
        ?>
    </center>
</body>

</html>