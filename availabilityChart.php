<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/classSchedule.css">
    </head>
    <body>
        <?php
            session_start();
            $servername = $_SESSION['servername'];
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
            $dbname = $_SESSION['dbname'];
            
            $conn = new mysqli($servername, $username, $password, $dbname);

            $days = $_POST['day'];
            
            function printNames($sql){
                $servername = $_SESSION['servername'];
                $username = $_SESSION['username'];
                $password = $_SESSION['password'];
                $dbname = $_SESSION['dbname'];

                $conn = new mysqli($servername, $username, $password, $dbname);
                echo '<td>';
                echo '<ul>';
                $result = $conn->query($sql);
                if ($result->num_rows > 0){
                    while($row = $result->fetch_assoc()) {
                        $name = "{$row['first']} {$row['last']}";
                        echo '<li>' .$name.'</li>';
                    }
                }
                echo '</ul>';
                echo '</td>';
            }
            
        ?>
        <table id="availabilityTable">
            <tr>
                <td></td>
                <?php
                    foreach ($days as $day) {
                        switch ($day){
                            case 'mon':
                                $day = 'Monday';
                                break;
                            case 'tue':
                                $day = 'Tuesday';
                                break;
                            case 'wed':
                                $day = 'Wednesday';
                                break;
                            case 'thu':
                                $day = 'Thursday';
                                break;
                            case 'fri':
                                $day = 'Friday';
                                break;
                        }
                        echo '<td>'.$day.'</td>';
                    }
                ?>
            </tr>
            <tr>
                <td>7:45 - 10</td>
                <?php 
                    foreach ($days as $day) {
                        $sql = "SELECT DISTINCT e.first, e.last FROM employee e "
                                . "LEFT JOIN `class_schedule` c ON e.eID = c.eID WHERE "
                                . "c.$day = 0 XOR c.$day = 1 AND NOT "
                                . "( (c.start_time >= Cast('7:45' AS time) AND c.end_time <= Cast('10:00' AS time)) OR"
                                . "(c.start_time <= Cast('7:45' AS time) AND c.end_time >= Cast('7:45' AS time)) OR"
                                . "(c.start_time >= Cast('7:45' AS time) AND c.start_time <= Cast('10:00' AS time))"
                                . ")";
                        printNames($sql);
                    }
                ?>
            </tr>
            <tr>
                <td>10 - 12</td>
                <?php 
                    foreach ($days as $day) {
                        $sql = "SELECT DISTINCT e.first, e.last FROM employee e "
                                . "LEFT JOIN `class_schedule` c ON e.eID = c.eID WHERE "
                                . "c.$day = 0 XOR c.$day = 1 AND NOT "
                                . "( (c.start_time >= Cast('10:00' AS time) AND c.end_time <= Cast('12:00' AS time)) OR"
                                . "(c.start_time <= Cast('10:00' AS time) AND c.end_time >= Cast('10:00' AS time)) OR"
                                . "(c.start_time >= Cast('10:00' AS time) AND c.start_time <= Cast('12:00' AS time))"
                                . ")";
                                printNames($sql);
                    }
                ?>
            </tr>
            <tr>
                <td>12 - 2</td>
                <?php 
                    foreach ($days as $day) {
                        $sql = "SELECT DISTINCT e.first, e.last FROM employee e "
                                . "LEFT JOIN `class_schedule` c ON e.eID = c.eID WHERE "
                                . "c.$day = 0 XOR c.$day = 1 AND NOT "
                                . "( (c.start_time >= Cast('12:00' AS time) AND c.end_time <= Cast('14:00' AS time)) OR"
                                . "(c.start_time <= Cast('12:00' AS time) AND c.end_time >= Cast('12:00' AS time)) OR"
                                . "(c.start_time >= Cast('12:00' AS time) AND c.start_time <= Cast('14:00' AS time))"
                                . ")";
                                printNames($sql);
                    }
                ?>
            </tr>
            <tr>
                <td>2 - 4</td>
                <?php 
                    foreach ($days as $day) {
                        $sql = "SELECT DISTINCT e.first, e.last FROM employee e "
                                . "LEFT JOIN `class_schedule` c ON e.eID = c.eID WHERE "
                                . "c.$day = 0 XOR c.$day = 1 AND NOT "
                                . "( (c.start_time >= Cast('14:00' AS time) AND c.end_time <= Cast('16:00' AS time)) OR"
                                . "(c.start_time <= Cast('14:00' AS time) AND c.end_time >= Cast('14:00' AS time)) OR"
                                . "(c.start_time >= Cast('14:00' AS time) AND c.start_time <= Cast('16:00' AS time))"
                                . ")";
                                printNames($sql);
                    }
                ?>
            </tr>
            <tr>
                <td>4 - 6</td>
                <?php 
                    foreach ($days as $day) {
                        $sql = "SELECT DISTINCT e.first, e.last FROM employee e "
                                . "LEFT JOIN `class_schedule` c ON e.eID = c.eID WHERE "
                                . "c.$day = 0 XOR c.$day = 1 AND NOT "
                                . "( (c.start_time >= Cast('16:00' AS time) AND c.end_time <= Cast('18:00' AS time)) OR"
                                . "(c.start_time <= Cast('16:00' AS time) AND c.end_time >= Cast('16:00' AS time)) OR"
                                . "(c.start_time >= Cast('16:00' AS time) AND c.start_time <= Cast('18:00' AS time))"
                                . ")";
                                printNames($sql);
                    }
                ?>
            </tr>
            <tr>
                <td>6 - 8</td>
                <?php 
                    foreach ($days as $day) {
                        $sql = "SELECT DISTINCT e.first, e.last FROM employee e "
                                . "LEFT JOIN `class_schedule` c ON e.eID = c.eID WHERE "
                                . "c.$day = 0 XOR c.$day = 1 AND NOT "
                                . "( (c.start_time >= Cast('18:00' AS time) AND c.end_time <= Cast('20:00' AS time)) OR"
                                . "(c.start_time <= Cast('18:00' AS time) AND c.end_time >= Cast('18:00' AS time)) OR"
                                . "(c.start_time >= Cast('18:00' AS time) AND c.start_time <= Cast('20:00' AS time))"
                                . ")";
                                printNames($sql);
                    }
                ?>
            </tr>
            <tr>
                <td>8 - 10</td>
                <?php 
                    foreach ($days as $day) {
                        $sql = "SELECT DISTINCT e.first, e.last FROM employee e "
                                . "LEFT JOIN `class_schedule` c ON e.eID = c.eID WHERE "
                                . "c.$day = 0 XOR c.$day = 1 AND NOT "
                                . "( (c.start_time >= Cast('20:00' AS time) AND c.end_time <= Cast('22:00' AS time)) OR"
                                . "(c.start_time <= Cast('20:00' AS time) AND c.end_time >= Cast('20:00' AS time)) OR"
                                . "(c.start_time >= Cast('20:00' AS time) AND c.start_time <= Cast('22:00' AS time))"
                                . ")";
                                printNames($sql);
                    }
                ?>
            </tr>
            <tr>
                <td>10 - 12:15</td>
                <?php 
                    foreach ($days as $day) {
                        $sql = "SELECT DISTINCT e.first, e.last FROM employee e "
                                . "LEFT JOIN `class_schedule` c ON e.eID = c.eID WHERE "
                                . "c.$day = 0 XOR c.$day = 1 AND NOT "
                                . "( (c.start_time >= Cast('22:00' AS time) AND c.end_time <= Cast('23:50' AS time)) OR"
                                . "(c.start_time <= Cast('22:00' AS time) AND c.end_time >= Cast('22:00' AS time)) OR"
                                . "(c.start_time >= Cast('22:00' AS time) AND c.start_time <= Cast('23:50' AS time))"
                                . ")";
                            printNames($sql);
                    }
                ?>
            </tr>
        </table>
    </body>
</html>
