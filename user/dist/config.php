<?php

$hostname="localhost";
$username="root";
$password="";
$dbname="phpchatapp_db";

$conn =mysqli_connect($hostname,$username,$password,$dbname);
if(!$conn){
    echo "this is erroe ".mysqli_connect_error();

}

?>