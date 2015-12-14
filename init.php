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


?>