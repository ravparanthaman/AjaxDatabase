<?php
 $lastname = "";
 $firstname = "";
 $email ="";
 $sql = "";
 if (isset($_POST['searchlastname']))
 {
     $lastname =  $_POST['searchlastname'];
     $sql = "Delete  from userinformation where lastname='" .$lastname . "';";
 }
 else if (isset($_POST['searchfirstname']))
 {
     $firstname = $_POST['searchfirstname'];
     $sql = "Delete  from userinformation where firstname='" .$firstname . "';";
 }
 else if (isset($_POST['searchemail']))
 {
     $email = $_POST['searchemail'];
     $sql = "Delete  from userinformation where email='" .$email . "';";
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
   
 }

$query = mysqli_query($connection, $sql);
if($query){
    echo "Records Deleted: " . mysqli_affected_rows($connection);

 mysqli_close($connection);
}
else{
    echo "mysql_query error - couldn't delete rows from userinformation table";
}


?>