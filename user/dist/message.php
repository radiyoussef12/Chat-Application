
<?php 
include_once "config.php";

$sqlState=$conn->prepare('DELETE  FROM id');
		$sqlState->execute();


$sqlState=$conn->prepare('INSERT INTO ID (id) VALUES (?)');
		$sqlState->execute([$_GET['user_id']]);
		$result = $sqlState->get_result();
include_once "user.php";

?>

