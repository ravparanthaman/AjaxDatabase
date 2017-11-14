<?php
    $lastname = "";
    $firstname = "";
    $email ="";
    $sql = "";
    if (isset($_POST['searchlastname']))
    {
        $lastname =  $_POST['searchlastname'];
        $sql = "Select * from userinformation where lastname='" .$lastname . "';";
    }
    else if (isset($_POST['searchfirstname']))
    {
        $firstname = $_POST['searchfirstname'];
        $sql = "Select * from userinformatin where firstname='" .$firstname . "';";
    }
    else if (isset($_POST['searchemail']))
    {
        $email = $_POST['searchemail'];
        $sql = "Select * from userinformation where email='" .$email . "';";
    }
    echo $sql;
    $server =  'localhost' ;
    $username = 'aravinthan';
    $password = 'shomiya23';
    $dbname = 'registration';

    $connection = mysqli_connect($server,$username,$password,$dbname);

    if (!$connection){
        echo "problem connecting";
    } 
    else {
        //echo "connected successfully, ";
    }

    $query = mysqli_query($connection, $sql);
    if ($query){
         //Fetch rows if successful 
        echo "  <table><thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Email </th>
                <th>Phone </th>
                <th>Gender </th>
            </tr>
        </thead><tbody>";
        while ($row = mysqli_fetch_row($query)){
            printf("<tr>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                    <td>%s</td>
                </tr> " 
        , $row[1], $row[2], $row[3], $row[5], $row[6]);
        }
        echo " </tbody></table>    ";
        mysqli_free_result($query);
        mysqli_close($connection);
    } else {
        echo "mysql_query error - couldn't search signup table";
    }
?>