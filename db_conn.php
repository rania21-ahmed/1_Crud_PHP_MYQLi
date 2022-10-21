<?php

$servers  ="localhost";
$username ="root";
$pass ="";
$db_name="crud";

$conn =mysqli_connect($servers,$username,$pass,$db_name);

if(!$conn){
    die("This is faild".$conn);
}

// echo "Successful connection data base";