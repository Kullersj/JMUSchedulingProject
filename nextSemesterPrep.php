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
        <link rel="stylesheet" type="text/css" href="css/semesterPrep.css">
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
        $servername = "134.126.151.66";
        $username = "labops";
        $password = "XmAs24";
        $dbname = "labOps";
        
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
                   if (moveToArchive($table, $conn)){
                       $defaultSQL = "ALTER TABLE $table "
                            . "CHANGE COLUMN `semester` `semester` VARCHAR(8) "
                                . "NOT NULL DEFAULT '$semester', "
                            . "CHANGE COLUMN `year` `year` YEAR "
                               . "NOT NULL DEFAULT $year;";
                       if ($conn->query($defaultSQL) === TRUE) {
                           echo "Next Semester Prep completed";
                       }
                   }
                   
               }
         }
         
        function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }
            
        function moveToArchive($table, $conn){
            $archiveTable = "$table"."_archive";
            
            $sql = "INSERT into $archiveTable SELECT * FROM $table;";
            
            
             if ($conn->query($sql) === TRUE) {
                //header("Location: classSchedule.php");
                echo "Records moved Successfully";
                $deleteSQL = "DELETE FROM $table;";
                if ($conn->query($deleteSQL) === TRUE) {
                    return True;
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
            
            <div id="Submit">
            <input type='submit' name='submit' value='Submit'/>
            </div>
        </form>
    </body>
</html>
