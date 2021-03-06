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
        
        //$conn = new mysqli($servername, $username, $password, $dbname);
        
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
                <header>
            <img src="img/dukes.png" style="width:225px;height:200px"> <br>
            Prepare for next semester!
        </header>
        
        <nav>
            <a href="managerPage.php">Availability Form</a><br>
            <a href="nextSemesterPrep.php">Next Semester Prep</a><br>
            <a href="assistantLookup.php">Assistant Lookup</a><br>
            <a href="index.php">Employee Form</a></br>
        </nav>
        <section>
            Delete Contents of the database and move them all to an archive table. </br></br>
            What semester is next?
            <form id='semesterPrep' method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
                  onsubmit="return confirm('Are you sure you want to prepare for next semester?');">
                <div id="semester">
                    <select name="semester" 
                            style="height: 24px; width: 88px; margin-left: 30px; margin-top: 0px">
                        <option value="Fall">Fall</option>
                        <option value="Spring">Spring</option>
                    </select>
                    <span class="error">* <?php echo $semesterErr;?></span></br>
                </div>

                <div id="year">
                    <select name="year" 
                            style="height: 24px; width: 88px; margin-left: 30px; margin-top: 0px">
                        <?php 
                            $date = date('Y');
                            for ($year = $date; $year <= $date+1; $year++){
                                echo "<option value=\"$year\">$year</option>";
                            }
                        ?> 
                    </select>
                    <span class="error">* <?php echo $semesterErr;?></span></br>
                </div>

                <div id="Submit">
                <input type='submit' name='submit' value='Submit'/>
                </div>
            </form>
        </section>
    </body>
</html>
