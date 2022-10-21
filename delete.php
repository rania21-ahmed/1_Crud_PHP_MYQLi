<?php

include "db_conn.php";
$id=$_GET['id'];
$sql ="DELETE FROM `members` WHERE `id`='$id'";

$query = mysqli_query($conn,$sql);

if($query){
    header("location:index.php?msg=Record delete succefuly");
}else{
    echo "Failed " . mysqli_error($conn);
}