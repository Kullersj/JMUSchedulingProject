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
        $jac = $_SESSION['jac'];
        $servername = $_SESSION['servername'];
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $dbname = $_SESSION['dbname'];
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        $subject = $num = $prof = $loc = $start = $end = "";
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $filters = array
            (
                "subject" => FILTER_SANITIZE_STRING,
                "num" => FILTER_VALIDATE_INT,
                "prof" => FILTER_SANITIZE_STRING,
                "loc" => FILTER_SANITIZE_STRING,
                "start" => FILTER_SANITIZE_STRING,
                "end" => FILTER_SANITIZE_STRING
            );
            $result = filter_input_array(INPUT_POST, $filters);
            $subject = test_input($result['subject']);
            $num = test_input($result['num']);
            $prof = test_input($result['prof']);
            $loc = test_input($result['loc']);
            $start = test_input($result['start']);
            $end = test_input($result['end']);
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
            <input type="text" name="subject" placeholder="Subject" style="margin-left: 30px;" value="<?php echo $subject;?>"/></br>
            <input type="text" name="num" placeholder="Class Number" style="margin-left: 30px;" value="<?php echo $num;?>"/></br>
            <input type="text" name="prof" placeholder="Professor" style="margin-left: 30px;" value="<?php echo $prof;?>"/></br>
            <input type="text" name="loc" placeholder="Class Location" style="margin-left: 30px;" value="<?php echo $loc;?>"/></br>
            Start Time <input type="time" name="start" placeholder="Start Time" style="margin-left: 30px;" value="<?php echo $start;?>" /></br>
            End Time <input type="time" name="end" placeholder="End Time" style="margin-left: 30px;" value="<?php echo $end;?>" /></br>
            <p><input type='submit' name='submit' value='Continue'/></p>
        </form>
    </body>
</html>

