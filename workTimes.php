<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Work Schedule form</title>
        <link rel="stylesheet" href="css\main.css">
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
        $jac = 1234;
        $servername = $_SESSION['servername'];
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $dbname = $_SESSION['dbname'];

        $conn = new mysqli($servername, $username, $password, $dbname);
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
            <tr>
                <th>7:45am - 10:00am</th>
                <td>
                    <center>
                        Available:
                        <br>
                        <input type="radio" name="monOpen" value="yes" checked>Yes
                        <input type="radio" name="monOpen" value="availNo">No
                        Preferred:
                        <br>
                        <select name="monOpenPref">
                            <option value="neither">No Preference</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</opton>
                        </select>
                    </center>
                </td>
                <td>
                    <center>
                        Available?
                        <br>
                        <input type="radio" name="tuesOpen" value="yes" checked>Yes
                        <input type="radio" name="tuesOpen" value="no">No
                        <br>
                        Preferred:
                        <br>
                        <select name="tuesOpenPref">
                            <option value="neither">No Preference</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</opton>
                        </select>
                    </center>
                </td>
            <td>
                <center>
                    Available?
                    <br>
                    <input type="radio" name="wensOpen" value="yes" checked>Yes
                    <input type="radio" name="wensOpen" value="no">No
                    <br>
                    Preferred:
                    <br>
                    <select name="wensOpenPref">
                        <option value="neither">No Preference</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</opton>
                    </select>
                </center>
            </td>
            <td>
                <center>
                    Available?
                    <br>
                    <input type="radio" name="thurOpen" value="yes" checked>Yes
                    <input type="radio" name="thurOpen" value="no">No
                    <br>
                    Preferred:
                    <br>
                    <select name="thurOpenPref">
                        <option value="neither">No Preference</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</opton>
                    </select>
                </center>
            </td>
            <td>
                <center>
                    Available?
                    <br>
                    <input type="radio" name="friOpen" value="yes" checked>Yes
                    <input type="radio" name="friOpen" value="no">No
                    <br>
                    Preferred:
                    <br>
                    <select name="friOpenPref">
                        <option value="neither">No Preference</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</opton>
                    </select>
                </center>
            </td>
        </tr>
        <tr>
            <th>10:00am - 12:00pm</th>
            <td>
                <center>
                    Available?
                    <br>
                    <input type="radio" name="mon1012" value="yes" checked>Yes
                    <input type="radio" name="mon1012" value="no">No
                    <br>
                    Preferred:
                    <br>
                    <select name="mon1012Pref">
                        <option value="neither">No Preference</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</opton>
                    </select>
                </center>
            </td>
            <td>
                <center>
                    Available?
                    <br>
                    <input type="radio" name="tues1012" value="yes" checked>Yes
                    <input type="radio" name="tues1012" value="no">No
                    <br>
                    Preferred:
                    <br>
                    <select name="tues1012Pref">
                        <option value="neither">No Preference</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</opton>
                    </select>
                </center>
            </td>
            <td><center>
                Available?
                <br>
                <input type="radio" name="wens1012" value="yes" checked>Yes
                <input type="radio" name="wens1012" value="no">No
                <br>
                Preferred:
                <br>
                <select name="wens1012Pref">
                    <option value="neither">No Preference</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</opton>
                </select>
            </center></td>
            <td><center>
                Available?
                <br>
                <input type="radio" name="thur1012" value="yes" checked>Yes
                <input type="radio" name="thur1012" value="no">No
                <br>
                Preferred:
                <br>
                <select name="thurs1012Pref">
                    <option value="neither">No Preference</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</opton>
                </select>
            </center></td>
            <td><center>
                Available?
                <br>
                <input type="radio" name="fri1012" value="yes" checked>Yes
                <input type="radio" name="fri1012" value="no">No
                <br>
                Preferred:
                <br>
                <select name="fri1012Pref">
                    <option value="neither">No Preference</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</opton>
                </select>
            </center></td>
        </tr>
        <tr>
            <th>12:00pm - 2:00pm</th>
            <td><center>
            Available?
            <br>
            <input type="radio" name="mon122" value="yes" checked>Yes
            <input type="radio" name="mon122" value="no">No
            <br>
            Preferred:
            <br>
            <select name="mon122Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="tues122" value="yes" checked>Yes
            <input type="radio" name="tues122" value="no">No
            <br>
            Preferred:
            <br>
            <select name="tues122Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="wens122" value="yes" checked>Yes
            <input type="radio" name="wens122" value="no">No
            <br>
            Preferred:
            <br>
            <select name="wens122Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="thur122" value="yes" checked>Yes
            <input type="radio" name="thur122" value="no">No
            <br>
            Preferred:
            <br>
            <select name="thur122Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="fri122" value="yes" checked>Yes
            <input type="radio" name="fri122" value="no">No
            <br>
            Preferred:
            <br>
            <select name="fri122Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        </tr>
        <tr>
            <th>2:00pm - 4:00pm</th>
            <td><center>
            Available?
            <br>
            <input type="radio" name="mon24" value="yes" checked>Yes
            <input type="radio" name="mon24" value="no">No
            <br>
            Preferred:
            <br>
            <select name="mon24Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="tues24" value="yes" checked>Yes
            <input type="radio" name="tues24" value="no">No
            <br>
            Preferred:
            <br>
            <select name="tues24Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="wens24" value="yes" checked>Yes
            <input type="radio" name="wens24" value="no">No
            <br>
            Preferred:
            <br>
            <select name="wens24Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="thur24" value="yes" checked>Yes
            <input type="radio" name="thur24" value="no">No
            <br>
            Preferred:
            <br>
            <select name="thurs24Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="fri24" value="yes" checked>Yes
            <input type="radio" name="fri24" value="no">No
            <br>
            Preferred:
            <br>
            <select name="fri24Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        </tr>
        <tr>
            <th>4:00pm - 6:00pm</th>
            <td><center>
            Available?
            <br>
            <input type="radio" name="mon46" value="yes" checked>Yes
            <input type="radio" name="mon46" value="no">No
            <br>
            Preferred:
            <br>
            <select name="mon46Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="tues46" value="yes" checked>Yes
            <input type="radio" name="tues46" value="no">No
            <br>
            Preferred:
            <br>
            <select name="tues46Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="wens46" value="yes" checked>Yes
            <input type="radio" name="wens46" value="no">No
            <br>
            Preferred:
            <br>
            <select name="wens46Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="thur46" value="yes" checked>Yes
            <input type="radio" name="thur46" value="no">No
            <br>
            Preferred:
            <br>
            <select name="thur46Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="fri46" value="yes" checked>Yes
            <input type="radio" name="fri46" value="no">No
            <br>
            Preferred:
            <br>
            <select name="fri46Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        </tr>
        <tr>
            <th>6:00pm - 8:00pm</th>
            <td><center>
            Available?
            <br>
            <input type="radio" name="mon68" value="yes" checked>Yes
            <input type="radio" name="mon68" value="no">No
            <br>
            Preferred:
            <br>
            <select name="mon68Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="tues68" value="yes" checked>Yes
            <input type="radio" name="tues68" value="no">No
            <br>
            Preferred:
            <br>
            <select name="tues68Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="wens68" value="yes" checked>Yes
            <input type="radio" name="wens68" value="no">No
            <br>
            Preferred:
            <br>
            <select name="wens68Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="thur68" value="yes" checked>Yes
            <input type="radio" name="thur68" value="no">No
            <br>
            Preferred:
            <br>
            <select name="thur68Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="fri68" value="yes" checked>Yes
            <input type="radio" name="fri68" value="no">No
            <br>
            Preferred:
            <br>
            <select name="fri68Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        </tr>
        <tr>
            <th>8:00pm - 10:00pm</th>
            <td><center>
            Available?
            <br>
            <input type="radio" name="mon810" value="yes" checked>Yes
            <input type="radio" name="mon810" value="no">No
            <br>
            Preferred:
            <br>
            <select name="mon810Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="tues810" value="yes" checked>Yes
            <input type="radio" name="tues810" value="no">No
            <br>
            Preferred:
            <br>
            <select name="tues810Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="wens810" value="yes" checked>Yes
            <input type="radio" name="wens810" value="no">No
            <br>
            Preferred:
            <br>
            <select name="wens810Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="thur810" value="yes" checked>Yes
            <input type="radio" name="thur810" value="no">No
            <br>
            Preferred:
            <br>
            <select name="thur810Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="fri810" value="yes" checked>Yes
            <input type="radio" name="fri810" value="no">No
            <br>
            Preferred:
            <br>
            <select name="fri810Pref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        </tr>
        <tr>
            <th>10:00pm - 12:00am</th>
            <td><center>
            Available?
            <br>
            <input type="radio" name="monClose" value="yes" checked>Yes
            <input type="radio" name="monClose" value="no">No
            <br>
            Preferred:
            <br>
            <select name="monClosePref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="tuesClose" value="yes" checked>Yes
            <input type="radio" name="tuesClose" value="no">No
            <br>
            Preferred:
            <br>
            <select name="tuesClosePref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="wensClose" value="yes" checked>Yes
            <input type="radio" name="wensClose" value="no">No
            <br>
            Preferred:
            <br>
            <select name="wensClosePref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="thurClose" value="yes" checked>Yes
            <input type="radio" name="thurClose" value="no">No
            <br>
            Preferred:
            <br>
            <select name="thurClosePref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        <td><center>
            Available?
            <br>
            <input type="radio" name="friClose" value="yes" checked>Yes
            <input type="radio" name="friClose" value="no">No
            <br>
            Preferred:
            <br>
            <select name="friClosePref">
                <option value="neither">No Preference</option>
                <option value="yes">Yes</option>
                <option value="no">No</opton>
            </select>
        </center></td>
        </tr>
        </table>
            <center><p><input type='submit' value='Submit'/></p></center>
        </form>
    </body>
</html>
