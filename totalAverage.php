<?php

    include 'siteResource/db.php';

//        $mysqli = new mysqli($db_host, $db_user, $db_pass, "admission");
        $examNo = $_POST["identity"];
        $totalScore = 0;
        $numSubject = 0;
        $theClass = '';
        $average = 0;
        // $stmt = $mysqli -> prepare("SELECT `ma`, `en`, `qa`, `ps`, `va`, `gk`, `rs` FROM admission WHERE `examNo` = ? and session = ?");
        // $stmt -> bind_param("ds", '$examNo', '$session');
        // $stmt -> execute();
        // $result = $stmt -> get_result();

        $connect = mysqli_connect($db_host, $db_user, $db_pass, "admission");
        $session = file_get_contents('session.txt');
        $sql = "SELECT `ma`, `en`, `qa`, `ps`, `va`, `gk`, `rs` FROM admission WHERE `examNo` = ".$examNo." and session = '".$session."'";

        // $sql = "SELECT `ma`, `en`, `qa`, `ps`, `va`, `gk`, `rs` FROM admission WHERE `examNo` = '55' and session = '2019/2020'";
       
        $result = mysqli_query($connect, $sql);


        while($row = mysqli_fetch_array($result)){
            for($i = 0; $i < count($row)/2; $i++){
                $totalScore += $row[$i];
                if($row[$i] > 0){
                    $numSubject++;
                }
            }
        }

        $sqlB = "SELECT `class` FROM admission WHERE `examNo` = ".$examNo." and session = '".$session."'";
        $classVal = mysqli_query($connect, $sqlB) or die('error getting data');


        while ($row = mysqli_fetch_array($classVal, MYSQLI_ASSOC)) {
            $theClass = $row['class'];
        }
        if($theClass === 'JS1'){
            $average = $totalScore*100/530;
        }else{
            $average = $totalScore*100/330;
        }
    //    $average = $totalScore*100/530;
        $totalAvr = array('total' => $totalScore, 'average' => $average);
        $ta = json_encode($totalAvr);
        echo $ta;

?>