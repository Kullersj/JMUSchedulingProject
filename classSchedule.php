<html>
    <head>
        <meta charset="UTF-8">
        <title>Class Schedule Form</title>
        <link rel="stylesheet" href="css\main.css">
        <style type="text/css">
            #Text1
            {
                height: 0px;
            }
        </style>
    </head>
    <?php
    session_start();
    //$jac = $_SESSION['jac'];
    $jac = 1234;
    $servername = $_SESSION['servername'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $dbname = $_SESSION['dbname'];

    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $filters = array
            (
            "class" => array(
                "subject" => FILTER_SANITIZE_STRING,
                "num" => FILTER_VALIDATE_INT,
                "prof" => FILTER_SANITIZE_STRING,
                "loc" => FILTER_SANITIZE_STRING,
                "start" => FILTER_SANITIZE_STRING,
                "end" => FILTER_SANITIZE_STRING 
                )
            
        );
        $result = filter_input_array(INPUT_POST, $filters);
        $class = $result['class'];
        foreach($class as $class){
            $subject = test_input($class['subject']);
            $num = test_input($class['num']);
            $prof = test_input($class['prof']);
            $loc = test_input($class['loc']);
            $start = test_input($class['start']);
            $end = test_input($class['end']);
            
            $sql = "INSERT INTO class_schedule (eID, subject, number, professor,
                        location, start_time, end_time)
                        VALUES ($jac, '$subject', '$num', $prof, 
                        '$loc', '$start', '$end')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION["jac"] = $jac;
                //header("Location: classSchedule.php");
                echo "Record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <body>
        <img src="img/dukes.png" style="width:225px;height:200px">
        <h1><center>JMU Scheduling Form</center></h1>
        <form id='classSchedule' method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
            <table id="ClassTable">
                <tr>
                    <td>Subject</td>
                    <td>Class Number</td>
                    <td>Professor</td>
                    <td>Class Location</td>
                    <td>Start Time</td>
                    <td>End Time</td>
                </tr>
                <tr>
                    <td><input type="text" name="class[1][subject]" id="subject" placeholder="Subject" value="<?php echo $subject; ?>" size=10/></td>
                    <td><input type="text" name="class[1][num]" id="num" placeholder="Class Number" value="<?php echo $num; ?>" size=10/></td>
                    <td><input type="text" name="class[1][prof]" id="prof" placeholder="Professor" value="<?php echo $prof; ?>" size=10/></td>
                    <td><input type="text" name="class[1][loc]" id="loc" placeholder="Class Location" value="<?php echo $loc; ?>" size=10/></td>
                    <td><input type="time" name="class[1][start]" id="start" placeholder="Start Time" value="<?php echo $start; ?>" size=10/></td>
                    <td><input type="time" name="class[1][end]" id="end" placeholder="End Time" value="<?php echo $end; ?>" size=10/></td>
                    <td><input type="button" id="addClass" value="Add Class" onclick="insRow()" size=10/></td>
                    <td><input type="button" id="delClass" value="Delete Class" onclick="deleteRow(this)" size=10/></td>       
                </tr>
            </table>
            <p><input type='submit' value='Continue'/></p>
        </form>
        <script language="JavaScript" src="javascript/modifyRow.js" type="text/javascript"></script>
    </body>
</html>

