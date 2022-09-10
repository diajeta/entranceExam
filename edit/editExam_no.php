<?php
    include '../siteResource/db.php';

    
        $serial = $_POST["serial"];
        $examNo = $_POST["examNo"];

    	if(empty($examNo)){
    		echo 'The Exam number field can not be empty.';
    	}else{
    		$connect = mysqli_connect($db_host, $db_user, $db_pass, "admission");
    		$session = file_get_contents('../session.txt');

    		$sql1 = "SELECT * FROM `admission` WHERE `examNo` = ".$examNo." AND `session` = '".$session."'";
        	$result = $connect->query($sql1);
        	if(mysqli_num_rows($result) !=0){
        		echo 'There is a student with admission number '.$examNo;
        	}else{
				$sql = "UPDATE `admission` set `examNo`= '".$examNo."' where `serialNo` = ".$serial." and session = '".$session."'";

    			mysqli_query($connect, $sql);
    			echo 'Updated!!';
        	}
    	}
    	
        
?>