<?php
    include '../siteResource/db.php';

    
        $serial = $_POST["serial"];
        $address = strtoupper($_POST["address"]);

    
    	$connect = mysqli_connect($db_host, $db_user, $db_pass, "admission");
    	$session = file_get_contents('../session.txt');
        $sql = "UPDATE `admission` set `address`= '".$address."' where `serialNo` = ".$serial." and session = '".$session."'";

    	mysqli_query($connect, $sql);
    	echo $session;
?>