<?php 
    include 'siteResource/db.php';
?>

<?php
    if(isset($_POST["submit"])){
                $stuN = strtoupper($_POST["name"]);
                $id = $_POST["examNo"];
                $addr = strtoupper($_POST["address"]);
                $theclass = strtoupper($_POST["class"]);
                $gender = strtoupper($_POST["gender"]);
                $date = time();
        if(empty($stuN)){
            header("Location: index.php?status=name&stuN=$stuN&id=$id&addr=$addr&gender=$gender");
            exit();
        }else{
            if(empty($id)){
                header("Location: index.php?status=examNo&stuN=$stuN&id=$id&addr=$addr&gender=$gender");
                exit();
            }else{
                $conn =  mysqli_connect($db_host, $db_user, $db_pass, "admission");
                $sql = "SELECT * FROM `admission` WHERE `examNo` = ".$id." AND `session` = '".$session."'";
                $result = $conn->query($sql);


                if(mysqli_num_rows($result) !=0){
                 //   echo 'Student already exist.';
                    header("Location: index.php?status=exist&stuN=$stuN&id=$id&addr=$addr&gender=$gender");
                }else{   
                            $mysqli = new mysqli($db_host, $db_user, $db_pass, "admission");
                            $stmt = $mysqli -> prepare("INSERT INTO `admission` (`examNo`, `name`, `session`, `address`, `class`, `date`, `gender`) VALUES (?, ?, ?, ?, ?, ?, ?)");
                            $stmt -> bind_param("dssssss", $id, $stuN, $session, $addr, $theclass, $date, $gender);
                            $stmt -> execute();
                
                //    echo 'Student added to database ';
                    header("Location: index.php?status=success");
                }
            }
        }
    }else{
        header("Location: index.php");
        exit();
    }
    
    
?>