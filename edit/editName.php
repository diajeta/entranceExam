<?php
    include '../siteResource/db.php';

    
        $serial = $_POST["serial"];
        $name = strtoupper($_POST["name"]);

    
    	$connect = mysqli_connect($db_host, $db_user, $db_pass, "admission");
    	$session = file_get_contents('../session.txt');
        $sql = "UPDATE `admission` set `name`= '".$name."' where `serialNo` = ".$serial." and session = '".$session."'";

    	mysqli_query($connect, $sql);
    	echo $session;
?>