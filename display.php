<?php
include 'siteResource/db.php';




$connect = mysqli_connect($db_host, $db_user, $db_pass, "admission");

$session = file_get_contents('session.txt');
$output = '';
$subject = $_POST["subject"];

                $sql = "SELECT `examNo`, `name`,`".$subject."` FROM admission WHERE `session` = '".$session."'";
                $result = mysqli_query($connect, $sql);
                $serial = 1;
                $output .= '
                <div class="table-responsive">
	                <table class="table table-bordered table-striped">
		                <tr>
		                	<th width="10%">S/N</th>
			                <th width="20%">Exam No.</th>
			                <th width="50%">Name</th>
			                <th width="20%">Score</th>
		                </tr>';
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $output .= '<tr class="selections" data-id2="'.$row["examNo"].'"><td>'.$serial++.'</td><td>'.$row["examNo"].'</td>
				                <td>'.$row["name"].'</td>
				                <td class="exam" data-id1="'.$row["examNo"].'" contenteditable >'.$row[$subject].'</td></tr>

	                ';
                    }
                }else{
                    $output .= '<tr>
				                <td colspan="7">Data not Found</td>
			                </tr>';
                }
                $output .= '</table>
	                </div>';
                echo $output;


	function inArray($varArray, $value){
		foreach($varArray as $post){
			if($post == $value){
				return true;
			}
		}
		return false;
	}
?>