<?php

	include 'siteResource/db.php';

//	$mysqli = new mysqli($db_host, $db_user, $db_pass, "admission");
	$id = $_POST["identity"];
	$sum = $_POST["sum"];
	$avg = $_POST["avg"];
	// $stmt = $mysqli -> prepare("UPDATE admission set `total`= ? , `percentage`= ? where `examNo` = ? and session = ?");
	// $stmt -> bind_param("ddds", '$sum', '$avg', '$id', '$session');
	// $stmt -> execute();
	$connect = mysqli_connect($db_host, $db_user, $db_pass, "admission");
    	$session = file_get_contents('session.txt');
        $sql = "UPDATE `admission` set `total`= ".$sum.", `percentage`= ".$avg." where examNo = ".$id." and session = '".$session."'";
       
    	mysqli_query($connect, $sql);
?>