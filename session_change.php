<?php 
	if(isset($_POST['session'])){
		$session = $_POST['session'];
	//	echo 'The session is '.$session;
		file_put_contents('session.txt', $session);
		echo $session;
	}
?>