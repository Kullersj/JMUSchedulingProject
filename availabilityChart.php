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
        ?>
        <table id="availabilityTable">
            <tr>
                <td></td>
                <td>Monday</td>
                <td>Tuesday</td>
                <td>Wednesday</td>
                <td>Thursday</td>
                <td>Friday</td>
            </tr>
            <tr>
                <td>7:45 - 10</td>
                <?php 
                
                ?>
            </tr>
            <tr>
                <td>10 - 12</td>
            </tr>
            <tr>
                <td>12 - 2</td>
            </tr>
            <tr>
                <td>2 - 4</td>
            </tr>
            <tr>
                <td>4 - 6</td>
            </tr>
            <tr>
                <td>6 - 8</td>
            </tr>
            <tr>
                <td>8 - 10</td>
            </tr>
            <tr>
                <td>10 - 12:15</td>
            </tr>
        </table>
    </body>
</html>
