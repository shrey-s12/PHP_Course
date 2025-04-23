<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert in MySQL</title>
</head>

<body>
    <center>
        <form action="insertEmp.php" method="post">
            <lable for="eid">Employee ID: </lable>
            <input type="text" name="eid" placeholder="Enter Employee ID"><br><br>
            <lable for="ename">Employee Name: </lable>
            <input type="text" name="ename" placeholder="Enter Employee Name"><br><br>
            <lable for="emob">Employee Mobile: </lable>
            <input type="text" name="emob" placeholder="Enter Employee Mobile"><br><br>
            <lable for="edept">Employee Department: </lable>
            <input type="text" name="edept" placeholder="Enter Employee Department"><br><br>
            <lable for="esal">Employee Salary: </lable>
            <input type="text" name="esal" placeholder="Enter Employee Salary"><br><br>
            <input type="submit" value="Insert" name="insert">
        </form>
        <?php

        if (isset($_POST["insert"])) {
            $eid = $_POST["eid"];
            $ename = $_POST["ename"];
            $emob = $_POST["emob"];
            $edept = $_POST["edept"];
            $esal = $_POST["esal"];

            $myconn = mysqli_connect('localhost', 'root', '', 'practice_db', 3307);
            if (!$myconn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            echo "Connected successfully! <br>";
            $sql = "insert into employeedetail value(?,?,?,?,?)";
            $ps = $myconn->prepare($sql);
            $ps->bind_param("isisi", $eid, $ename, $emob, $edept, $esal);
            $ps->execute();
            echo "Data Inserted Successfully";
        }
        ?>
    </center>
</body>

</html>