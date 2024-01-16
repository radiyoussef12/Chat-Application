<?php
session_start();

include_once "config.php";
if(isset($_GET['logout_id'])){
    $stat='Offline now';
    $sqlState=$conn->prepare('UPDATE   users SET  status="Offline now" WHERE unique_id=?');
    $sqlState->execute([$_GET['logout_id']]);
    $result = $sqlState->get_result();

    
header("location:../../login.php");
}

?>