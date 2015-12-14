<?php
//Step1
$user = 'root';
$password ='root';
$db = 'bd';
$host ='localhost';

$db_select = mysqli_init();
$sucess = mysqli_real_connect(
    $db_select, $host, $user, $password, $db);
if (!sucess) {
    echo "Cannot connect to DB";
}
mysqli_query($db_select, "SET NAMES 'utf8'");
/*

 $db = mysqli_connect("localhost","root", "root"); 
 if (!$db) {
 die("Database connection failed miserably: " . mysqli_error());
 }
//Step2
 $db_select = mysqli_select_db("bd",$db);
 if (!$db_select) {
 die("Database selection also failed miserably: " . mysqli_error());
 }
*/



/*

 $db = mysql_connect("localhost","root","root"); 
 if (!$db) {
 die("Database connection failed miserably: " . mysql_error());
 }
//Step2
 $db_select = mysql_select_db("bd",$db);
 if (!$db_select) {
 die("Database selection also failed miserably: " . mysql_error());
 }
*/



?>