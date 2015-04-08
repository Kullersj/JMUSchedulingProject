<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Next Semester Prep</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <style type="text/css">
            #Text1
            {
                height: 0px;
            }
            .error {color: #FF0000;}
        </style>
    </head>
    <body>
        <?php
        session_start();
        $_SESSION["servername"] = $servername;
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION["dbname"] = $dbname;
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        $year = $semester = "";
        $semesterErr = $yearErr = "";
        
         if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["semester"])){
                    $fnameErr = "Next Semester is required";
                }
                if (empty($_POST["year"])){
                    $lnameErr = "Year is required";
                }
               $flters = array(
                   "semester" => FILTER_SANITIZE_STRING,
                   "year" => FILTER_VALIDATE_INT
               );
               $result = filter_input_array(INPUT_POST, $flters);
               $semester = test_input($result['semester']);
               $year = test_input($result['year']);
               
               $tables = ['employee', 'availability', 'class_schedule'];
               foreach($tables as $table){
                   moveToArchive($table);
               }
         }
         
        function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }
            
        function moveToArchive($table){
            $archiveTable = "$table"."_archive";
            
            $sql = "INSERT into $archiveTable SELECT * FROM $table;";
            
             if ($conn->query($sql) === TRUE) {
                //header("Location: classSchedule.php");
                echo "Records moved Successfully";
                $deleteSQL = "DELETE FROM $table;";
                if ($conn->query($deleteSQL) === TRUE) {
                    //header("Location: classSchedule.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        ?>
        <form id='semesterPrep' method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
            <input type="text" name="semester" placeholder="Semester" style="margin-left: 30px;" value="<?php echo $semester;?>"/>
            <span class="error">* <?php echo $semesterErr;?></span></br>
            
            <input type="text" name="year" placeholder="Year" style="margin-left: 30px;" value="<?php echo $year;?>"/>
            <span class="error">* <?php echo $yearErr;?></span></br>
            
            <input type='submit' name='submit' value='Submit'/>
        </form>
    </body>
</html>
