<?php
include 'siteResource/db.php';




$connect = mysqli_connect($db_host, $db_user, $db_pass, "admission");

$session = file_get_contents('session.txt');
$output = '';
$adnum = $_POST["adnum"];

                $sql = "SELECT `serialNo`, `examNo`, `name`, `address`, `class`, `gender` FROM `admission` WHERE `examNo` = '".$adnum."' AND `session` = '".$session."'";
                $result = mysqli_query($connect, $sql);
                $serial = 1;
                $output .= '
                <div class="table-responsive">
	                <table class="table table-bordered table-striped">
		                <tr>
		                	<th width="30%">Data</th>
			                <th width="70%">Values</th>
		                </tr>';
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        $output .= '<tr><td>NAME: </td>
				                <td class="select_name" data-id1="'.$row["serialNo"].'" contenteditable>'.$row["name"].'</td></tr>';
				      	$output .= '<tr><td>EXAM NO.: </td>
				                <td class="select_examNo" data-id2="'.$row["serialNo"].'" contenteditable>'.$row["examNo"].'</td></tr>';
				        $output .= '<tr><td>ADDRESS: </td>
				                <td class="select_add" data-id3="'.$row["serialNo"].'" contenteditable>'.$row["address"].'</td></tr>';
				        $output .= '<tr><td>CLASS: </td>
				                <td class="select_class" data-id4="'.$row["serialNo"].'" contenteditable>
				                <select name="class" id="classes">
				                	<option selected disabled hidden>'.$row["class"].'</option>
                                    <option value="JS1">JS1</option>
                                    <option value="JS2">JS2</option>
                                    <option value="JS3">JS3</option>
                                    <option value="SS1A">SS1A</option>
                                    <option value="SS1B">SS1B</option>
                                    <option value="SS1C">SS1C</option>
                                    <option value="SS2A SCIENCE">SS2A SCIENCE</option>
                                    <option value="SS2B ART">SS2B ART</option>
                                    <option value="SS2C COMMERCIAL">SS2C COMMERCIAL</option>
                                </select></td></tr>';
                        $output .= '<tr><td>GENDER: </td>
				                <td class="select_gen" data-id5="'.$row["serialNo"].'" contenteditable>
				                <select name="gen" id="gender">
				                	<option selected disabled hidden>'.$row["gender"].'</option>
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                </select></td></tr>';
                    }
                }else{
                    $output .= '<tr>
				                <td colspan="2">Data not Found</td>
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