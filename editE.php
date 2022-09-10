<?php
    include 'siteResource/db.php';

    
        $id = $_POST["id"];
        $exam_value = $_POST["exam_value"];
        $subject = $_POST["subject"];

    
    	$connect = mysqli_connect($db_host, $db_user, $db_pass, "admission");
    	$session = file_get_contents('session.txt');
        $sql = "UPDATE `admission` set `".$subject."`= ".$exam_value." where examNo = ".$id." and session = '".$session."'";
       
    	mysqli_query($connect, $sql);
?>