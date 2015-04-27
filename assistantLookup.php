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
        ?>
        <header>
            <img src="img/dukes.png" style="width:225px;height:200px"> <br>
            Manager Page!
        </header>
        
        <nav>
            <a href="managerPage.php">Availability Form</a><br>
            <a href="nextSemesterPrep.php">Next Semester Prep</a><br>
            <a href="assistantLookup.php">Assistant lookup</a><br>
            <a href="index.php">Employee Form</a></br>
        </nav>
        <section>
            <select name="person[0]" id="person">
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
        </section>
    </body>
</html>
