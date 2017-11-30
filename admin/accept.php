<?php

session_start();
require_once "../includes/connect.php";

$doctorID = $_GET['doctorID'];

$sql = "update doctor set status = 'accepted' where doctorID = $doctorID;";
if ($conn->query($sql) !== TRUE) {
        
		
		header("Location: logged.php?accept=error");
		exit();
}

header("Location: ../logged.php?accept=success");
exit();

?>
