<?php
    include '../siteResource/db.php';

    
        $serial = $_POST["serial"];
        $clas = $_POST["clas"];

    
    	$connect = mysqli_connect($db_host, $db_user, $db_pass, "admission");
    	$session = file_get_contents('../session.txt');
        $sql = "UPDATE `admission` set `class`= '".$clas."' where `serialNo` = ".$serial." and session = '".$session."'";

    	mysqli_query($connect, $sql);
    	echo $session;
?>