<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

Created by: Seth Kuller 2015
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Work Schedule form</title>
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <style type="text/css">
            #Text1
            {
                height: 0px;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        //$jac = $_SESSION['jac'];
        $jac = $_SESSION['jac'];
        $servername = $_SESSION['servername'];
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $dbname = $_SESSION['dbname'];

        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $filters = array (
              "reason" => FILTER_SANITIZE_STRING  
            );
        }
        
        $shiftTimes = [
            '7:45' => '10:00',
            '10:00' => '12:00',
            '12:00' => '14:00',
            '14:00' => '16:00',
            '16:00' => '18:00',
            '18:00' => '20:00',
            '20:00' => '22:00',
            '22:00' => '00:15'
        ];
        
        if(is_array($_POST['day'])){
            $days = $_POST['day'];
            //loop through each day
            foreach($days as $day){
                //Loop through each shift on that day
                foreach ($day as $shift){
                    //get shift time and if they are available or not
                    $time = $shift['time'];
                    $available = $shift['available'];
                    if ($available === "No"){
                        $reason = $shift['reason'];
                        $availableBool = 0;
                    }
                    else {
                        $availableBool = 1;
                    }
                    
                    $preferred = $shift['preferred'];
                    $shiftDay = $shift['day'];
                    if ($availableBool === 1) {
                        $sql = "INSERT INTO availability (jac, day, start_time, end_time, "
                                . "preferred, available) "
                                . "VALUES ($jac, '$shiftDay', '$time', '$shiftTimes[$time]', "
                                . "'$preferred', $availableBool)";
                    }
                    else {
                        $sql = "INSERT INTO availability (jac, day, start_time, end_time, "
                                . "preferred, available, reason) "
                                . "VALUES ($jac, '$shiftDay', '$time', '$shiftTimes[$time]', "
                                . "'$preferred', $availableBool, '$reason')";
                    }
                    
                    if ($conn->query($sql) === TRUE) {
                        $_SESSION["jac"] = $jac;
                        header("Location: thanks.php");
                        echo "Record created successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
        }
        ?>
        <form id='classSchedule' method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
        <table id="schedTable">
            <h2><center>Preferred Work Times</center></h2>
            Fill out the following table.</br>
            If you are available during a specific shift, select the "Yes" dial.
            Otherwise, select the "No" dial. </br>
            If you prefer the specific shift, select "Yes" under Preferred. If you wish to not work the shift, select "No" </br></br>

            <tr>
                <th></th>
                <th>Monday</th>
                <th>Tuesday</th>		
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
            </tr>
            <?php
                $shiftTimes = [
                    '7:45' => '10:00',
                    '10:00' => '12:00',
                    '12:00' => '14:00',
                    '14:00' => '16:00',
                    '16:00' => '18:00',
                    '18:00' => '20:00',
                    '20:00' => '22:00',
                    '22:00' => '00:15'
                ];
                $milToStandTime = [
                    '7:45' => '7:45',
                    '10:00' => '10:00',
                    '12:00' => '12:00',
                    '14:00' => '2:00',
                    '16:00' => '4:00',
                    '18:00' => '6:00',
                    '20:00' => '8:00',
                    '22:00' => '10:00',
                    '00:15' => '12:15'
                ];
        
                $days = ['mon', 'tue', 'wed', 'thu', 'fri'];
                
                
                //To not have to hard code each and every shift I loop through each shift one at a time
                //In each shift I loop through each day and echo the html so create the box
                //There are two hidden input types in order to actually be able to tell which shift is which when looping through the results
                foreach($shiftTimes as $key => $value) {
                    $startTime = $key;
                    $endTime = $value;
                    echo '<tr>';
                    //Convert 24 Hour time to 12 Hour time in order to display shift time better
                    echo "<th>$milToStandTime[$startTime] - $milToStandTime[$endTime]</th>";
                    foreach($days as $day){
                        if (!($day === "fri" && ($startTime === '16:00' || $startTime === '18:00' ||
                                $startTime === '20:00' || $startTime === '22:00'))){
                            echo "<td>";
                                echo "<center>";
                                    echo "Available?";
                                    echo "<br>";
                                    echo "<input type=\"radio\" name=\"day[$day][$startTime][available]\" value=\"yes\" checked onClick=\"removeReason(this)\" >Yes";
                                    echo "<input type=\"radio\" name=\"day[$day][$startTime][available]\" value=\"No\" onClick=\"addReason(this)\" >No";
                                    echo "<input type=\"hidden\" name=\"day[$day][$startTime][time]\" value=\"$startTime\" >";
                                    echo "<input type=\"hidden\" name=\"day[$day][$startTime][day]\" value=\"$day\" >";
                                    echo "<br>";
                                    echo "Preferred?";
                                    echo "<br>";
                                    echo "<select name=\"day[$day][$startTime][preferred]\">";
                                        echo "<option value=\"neither\">No Preference</option>";
                                        echo "<option value=\"yes\">Yes</option>";
                                        echo "<option value=\"no\">No</option>";
                                    echo "</select>";
                                echo "</center>";
                            echo "</td>";
                        }
                    }
                    echo '</tr>';
                }
            ?>
        </table>
            <center><p><input type='submit' value='Submit'/></p></center>
        </form>
        <script language="JavaScript" src="javascript/workTimes.js" type="text/javascript"></script>
    </body>
</html>
