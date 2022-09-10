<?php
    include 'siteResource/db.php';

        $mysqli = new mysqli($db_host, $db_user, $db_pass, "admission");
        $id = $_POST["id"];
        $subject = $_POST["subject"];
        $stmt = $mysqli -> prepare("UPDATE admission SET `".$subject."`= NULL where `examNo` = ? and session = ?");
        $stmt -> bind_param("ds", $id, $session);
        $stmt -> execute();
    
?>