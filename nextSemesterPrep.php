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
    </head>
    <body>
        <?php
        session_start();
        $_SESSION["servername"] = $servername;
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION["dbname"] = $dbname;
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        function moveToArchive($table){
            $archiveTable = "$table"."_archive";
            
            $sql = "INSERT into $archiveTable SELECT * FROM $table;";
            
             if ($conn->query($sql) === TRUE) {
                //header("Location: classSchedule.php");
                echo "Records moved Successfully";
                $deleteSQL = "DELETE FROM $table;";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        ?>
    </body>
</html>
