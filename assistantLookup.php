<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Assistant Lookup
        </title>
        <link rel="stylesheet" type="text/css" href="css/assistantLookup.css">
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
            $servername = "134.126.151.66";
            $username = "labops";
            $password = "XmAs24";
            $dbname = "labOps";
            $_SESSION["servername"] = $servername;
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            $_SESSION["dbname"] = $dbname;
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                

                $ID = $_POST['person'];
                
                $fullName = nameSQL($ID, $conn);
                $basicInfo = basicSQL($ID, $conn);
                $classSchedule = classSQL($ID, $conn);
                $availability = availabilitySQL($ID,$conn);
            }
            
            function nameSQL($jac, $conn){
                $sql = "SELECT first, last from employee WHERE jac = $jac";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    return $result->fetch_assoc();
                }
            }
            
            function basicSQL($jac, $conn){
                $sql = "SELECT jac, phone, email, local_address,"
                        . " location, expected_graduation, car, onCampus,"
                        . " back_to_back, both_labs FROM employee WHERE jac = $jac";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    return $result->fetch_assoc();
                }
            }
            function classSQL($jac, $conn){
                $sql = "SELECT DISTINCT subject, number, professor, location,"
                        . " start_time, end_time, mon, tue, wed,"
                        . " thu, fri FROM class_schedule WHERE jac = $jac";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    return $result;
                }
            }
            function availabilitySQL($jac, $conn){
                $sql = "SELECT day, start_time, end_time, preferred, available, "
                        . "reason FROM availability WHERE jac = $jac";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    return $result;
                }
            }
        ?>
        <header>
            <img src="img/dukes.png" style="width:225px;height:200px"> <br>
            Manager Page!
        </header>
        
        <nav>
            <a href="managerPage.php">Availability Form</a><br>
            <a href="nextSemesterPrep.php">Next Semester Prep</a><br>
            <a href="assistantLookup.php">Assistant Lookup</a><br>
            <a href="index.php">Employee Form</a></br>
        </nav>
        <section>
            <form id='classSchedule' method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                <select name="person" id="person">
                    <?php
                        $sql = "SELECT jac, first, last FROM employee ORDER BY first ASC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0){
                            while($row = $result->fetch_assoc()) {
                                $id = $row['jac'];
                                $name = "{$row['first']} {$row['last']}";
                                echo '<option value="' .$id. '">' .$name.'</option>';
                            }
                        }
                    ?>
                </select>
                <input type='submit' name='submit' value='Lookup'/>
            </form>
            <?php 
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    echo "</br></br>";
                    echo "<B>{$fullName['first']} {$fullName['last']}</B>";
                    echo "</br></br>";
                    echo "<B>Basic Info</b>";
                    echo "<table>";
                    echo "<thead>
                        <tr>
                            <td>Jac</td>
                            <td>Phone Number</td>
                            <td>Email</td>
                            <td>Address</td>
                            <td>Lab</td>
                            <td>Grad Year</td>
                            <td>Car</td>
                            <td>On Campus</td>
                            <td>Back to Back</td>
                            <td>Both Labs</td>
                        </tr>
                    </thead>";
                    foreach($basicInfo as $info){
                        echo "<td>$info</td>";
                    }
                    echo "</table>";
                    echo "</br></br>";
                    
                    echo "<b>Class Schedule</b>";
                    echo "<table>";
                    echo "<thead>
                        <tr>
                            <td>Subject</td>
                            <td>Class Number</td>
                            <td>Professor</td>
                            <td>Class Location</td>
                            <td>Start Time</td>
                            <td>End Time</td>
                            <td>Monday</td>
                            <td>Tuesday</td>
                            <td>Wednesday</td>
                            <td>Thursday</td>
                            <td>Friday</td>
                        </tr>
                    </thead>";
                    
                    while ($row = $classSchedule->fetch_assoc()) {
                        echo "<tr>";
                        foreach($row as $info){
                            echo "<td>$info</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</br></br>";
                    echo "<b>Other Conflicts</b>";
                    echo "<table>";
                    echo "<thead>
                        <tr>
                            <td>Day</td>
                            <td>Start Time</td>
                            <td>End Time</td>
                            <td>Preferred</td>
                            <td>Available</td>
                            <td>Reason</td>
                        </tr>
                    </thead>";
                    while ($row = $availability->fetch_assoc()) {
                        echo "<tr>";
                        foreach($row as $info){
                            echo "<td>$info</td>";
                        }
                        echo "</tr>";
                    }
                }
            ?>
        </section>
    </body>
</html>
