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
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <?php
            session_start();
            $servername = $_SESSION['servername'];
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
            $dbname = $_SESSION['dbname'];
            
            $conn = new mysqli($servername, $username, $password, $dbname);

            $days = $_POST['day']
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
                        $sql = "SELECT e.first, e.last FROM employee e"
                                . "LEFT JOIN `class_schedule` c ON e.eID = c.eID WHERE"
                                . "{$day} IN class_days AND"
                                . "(NOT ( c.start_time between Cast('7:45' AS time) AND Cast('10:00' AS time))) AND"
                                . "(NOT ( c.end_time between  Cast('7:45' AS time) AND Cast('10:00' AS time))) AND"
                                . "(NOT (c.start_time < Cast('7:45' AS time) AND c.end_time >= Cast('7:45' as time)))";
                    }
                ?>
            </tr>
            <tr>
                <td>10 - 12</td>
                <?php 
                    foreach ($days as $day) {
                        $sql = "SELECT e.first, e.last FROM employee e"
                                . "LEFT JOIN `class_schedule` c ON e.eID = c.eID WHERE"
                                . "{$day} IN class_days AND"
                                . "(NOT ( c.start_time between Cast('10:00' AS time) AND Cast('12:00' AS time))) AND"
                                . "(NOT ( c.end_time between  Cast('10:00' AS time) AND Cast('12:00' AS time))) AND"
                                . "(NOT (c.start_time < Cast('10:00' AS time) AND c.end_time >= Cast('10:00' as time)))";
                    }
                ?>
            </tr>
            <tr>
                <td>12 - 2</td>
                <?php 
                    foreach ($days as $day) {
                        $sql = "SELECT e.first, e.last FROM employee e"
                                . "LEFT JOIN `class_schedule` c ON e.eID = c.eID WHERE"
                                . "{$day} IN class_days AND"
                                . "(NOT ( c.start_time between Cast('12:00' AS time) AND Cast('14:00' AS time))) AND"
                                . "(NOT ( c.end_time between  Cast('12:00' AS time) AND Cast('14:00' AS time))) AND"
                                . "(NOT (c.start_time < Cast('12:00' AS time) AND c.end_time >= Cast('12:00' as time)))";
                    }
                ?>
            </tr>
            <tr>
                <td>2 - 4</td>
                <?php 
                    foreach ($days as $day) {
                        $sql = "SELECT e.first, e.last FROM employee e"
                                . "LEFT JOIN `class_schedule` c ON e.eID = c.eID WHERE"
                                . "{$day} IN class_days AND"
                                . "(NOT ( c.start_time between Cast('14:00' AS time) AND Cast('16:00' AS time))) AND"
                                . "(NOT ( c.end_time between  Cast('14:00' AS time) AND Cast('16:00' AS time))) AND"
                                . "(NOT (c.start_time < Cast('14:00' AS time) AND c.end_time >= Cast('14:00' as time)))";
                    }
                ?>
            </tr>
            <tr>
                <td>4 - 6</td>
                <?php 
                    foreach ($days as $day) {
                        $sql = "SELECT e.first, e.last FROM employee e"
                                . "LEFT JOIN `class_schedule` c ON e.eID = c.eID WHERE"
                                . "{$day} IN class_days AND"
                                . "(NOT ( c.start_time between Cast('16:00' AS time) AND Cast('18:00' AS time))) AND"
                                . "(NOT ( c.end_time between  Cast('16:00' AS time) AND Cast('18:00' AS time))) AND"
                                . "(NOT (c.start_time < Cast('16:00' AS time) AND c.end_time >= Cast('16:00' as time)))";
                    }
                ?>
            </tr>
            <tr>
                <td>6 - 8</td>
                <?php 
                    foreach ($days as $day) {
                        $sql = "SELECT e.first, e.last FROM employee e"
                                . "LEFT JOIN `class_schedule` c ON e.eID = c.eID WHERE"
                                . "{$day} IN class_days AND"
                                . "(NOT ( c.start_time between Cast('18:00' AS time) AND Cast('20:00' AS time))) AND"
                                . "(NOT ( c.end_time between  Cast('18:00' AS time) AND Cast('20:00' AS time))) AND"
                                . "(NOT (c.start_time < Cast('18:00' AS time) AND c.end_time >= Cast('18:00' as time)))";
                    }
                ?>
            </tr>
            <tr>
                <td>8 - 10</td>
                <?php 
                    foreach ($days as $day) {
                        $sql = "SELECT e.first, e.last FROM employee e"
                                . "LEFT JOIN `class_schedule` c ON e.eID = c.eID WHERE"
                                . "{$day} IN class_days AND"
                                . "(NOT ( c.start_time between Cast('20:00' AS time) AND Cast('22:00' AS time))) AND"
                                . "(NOT ( c.end_time between  Cast('20:00' AS time) AND Cast('22:00' AS time))) AND"
                                . "(NOT (c.start_time < Cast('20:00' AS time) AND c.end_time >= Cast('22:00' as time)))";
                    }
                ?>
            </tr>
            <tr>
                <td>10 - 12:15</td>
                <?php 
                    foreach ($days as $day) {
                        $sql = "SELECT e.first, e.last FROM employee e"
                                . "LEFT JOIN `class_schedule` c ON e.eID = c.eID WHERE"
                                . "{$day} IN class_days AND"
                                . "(NOT ( c.start_time between Cast('22:00' AS time) AND Cast('23:99' AS time))) AND"
                                . "(NOT ( c.end_time between  Cast('22:00' AS time) AND Cast('23:99' AS time))) AND"
                                . "(NOT (c.start_time < Cast('22:00' AS time) AND c.end_time >= Cast('22:00' as time)))";
                    }
                ?>
            </tr>
        </table>
    </body>
</html>
