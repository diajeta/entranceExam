<?php 
	include 'siteResource/db.php';

	function countDigits($num_val){
		$count = 0;
		while($num_val != 0){
			$num_val = round($num_val / 10);
			$count = $count+1;
		}
		return $count;
	}
?>

<html>
<head>
	<title>Student result</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/thestyle.css"/>
	<script>
		function printContent(el){
			var restorepage = document.body.innerHTML;
			var printcontent = document.getElementById(el).innerHTML;
			document.body.innerHTML = printcontent;
			window.print();
			document.body.innerHTML = restorepage;
		}
	</script>
</head>
<body>
	<div class="choices">
		<hr/>
		<button type="button" class="btn btn-success" onclick="printContent('Result_data')">Print Result</button><hr/>
	</div>
	<div id="Result_data" class="RData">
			
	<?php
		$output = '';
		$examNo = $_POST["examNo"];
		$marksObt = '';
		$leadZero = '';
		if(countDigits($examNo) == 1){
			$leadZero = '00';
		}elseif(countDigits($examNo) == 2){
			$leadZero = '0';
		}else{
			$leadZero = '';
		}
		$connect = mysqli_connect($db_host, $db_user, $db_pass, "admission");
		$sql = "SELECT * FROM `admission` WHERE `examNo` = ".$examNo." AND `session` = '".$session."'" ;
    	$result = mysqli_query($connect, $sql) or die('error getting data');
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			if($row['class'] == 'JS1'){
				$marksObt = '530';
			}else{
				$marksObt = '330';
			}

		$output .="<div><div style=\" display: inline-block; vertical-align: top\"> <img src=\"img/college.jpg\" alt=\"\" height=\"140\" width=\"120\">
		</div>
		<div style=\" display: inline-block; vertical-align: top\">
		        <h2>JEED TRINITY COLLEGE</h2>
		        <h4>6/8, AJE STREET, ILASAMAJA-ISOLO, LAGOS.</h4>
		        <h6>MOTTO: KNOWLEDGE SAVES</h6>       
		</div>
		</div><hr><h5><em>Our ref:_______________________ Your Ref:_______________________ Date:______________</em></h5><br>";
		$output .="<h5 style='text-decoration: underline'>RESULT OF ENTRANCE EXAMINATION/ADMISSION LETTER</h5>";
		        $output .= "NAME: ".$row['name']."</br>";
		        $output .= "EXAM NO.: ";
		        if(($row['class'] == 'JS1')||($row['class'] == 'JS2')||($row['class'] == 'JS3')){
		        	$output .= "JTC/JS/".$leadZero.$row['examNo']."</br>"; 
		        }else{
		        		$output .= "JTC/SS/".$leadZero.$row['examNo']."</br>";
		        }
		        $output .= "ADDRESS: ".$row['address']."</br>";
		        $output .= "GENDER: ".$row['gender']."</br>";
		        $output .= "CLASS SEEKING ADMISSION INTO: ".$row['class']."</br>";
		        $output .= "<table width =\"600\" border =\"1\" cellpadding =\"1\" cellspacing =\"2\">";

		        $output .= "<tr><th>SUBJECT</th><th>MARKS OBTAINABLE</th><th>MARKS OBTAINED</th><th>REMARK</th></tr>";
			  
				$output .= "<tr><td>MATHEMATICS.</td><td>100</td><td>".$row['ma']."</td><td>".checkGrade($row['ma'])."</td></tr>";
				$output .= "<tr><td>ENGLISH LANGUAGE</td><td>100</td><td>".$row['en']."</td><td>".checkGrade($row['en'])."</td></tr>";
				$output .= "<tr><td>QUANTITATIVE APTITUDE</td><td>50</td><td>".$row['qa']."</td><td>".checkGradeb($row['qa'])."</td></tr>";
				$output .= "<tr><td>PRIMARY SCIENCE</td><td>100</td><td>".$row['ps']."</td><td>".checkGrade($row['ps'])."</td></tr>";
				$output .= "<tr><td>VARBAL APTITUDE</td><td>50</td><td>".$row['va']."</td><td>".checkGradeb($row['va'])."</td></tr>";
				$output .= "<tr><td>GENERAL KNOWLEDGE</td><td>100</td><td>".$row['gk']."</td><td>".checkGrade($row['gk'])."</td></tr>";
				$output .= "<tr><td>READING SKILL</td><td>30</td><td>".$row['rs']."</td><td>".checkGradec($row['rs'])."</td></tr>";
				$output .= "</table><br>";
			
				$output .= "TOTAL OBTAINABLE MARKS: ".$marksObt."<br>";
				$output .= "TOTAL MARKS OBTAINED: ".$row['total']." PERCENTAGE: ".number_format($row['percentage'], 2);
			
				
				echo $output;
			}
				function checkGrade($en){
				    if ($en > 89) {
				        return 'Very Good';
				    } else if ($en > 79) {
				        return 'Good Result';
				    } else if ($en > 69) {
				        return 'Good Result';
				    } else if ($en > 59) {
				        return 'Satisfactory';
				    } else if ($en > 54) {
				        return 'Satisfactory';
				    } else if ($en > 49) {
				        return 'Satisfactory';
				    } else if ($en > 44) {
				        return 'Pass';
				    } else if ($en > 39) {
				        return 'Pass';
				    } else if ($en > 1) {
				        return 'Fail';
				    } else { return '--'; }
				}

				function checkGradec($en){
				    if ($en > 24) {
				        return 'Satisfactory';
				    } else if ($en > 14) {
				        return 'Fair';
				    }else if ($en > 1) {
				        return 'Poor';
				    } else { return '--'; }
				}

				function checkGradeb($en){
				    if ($en > 45) {
				        return 'Very Good';
				    } else if ($en > 40) {
				        return 'Good Result';
				    } else if ($en > 35) {
				        return 'Good Result';
				    } else if ($en > 27) {
				        return 'Satisfactory';
				    } else if ($en > 25) {
				        return 'Satisfactory';
				    } else if ($en > 49) {
				        return 'Satisfactory';
				    } else if ($en > 22) {
				        return 'Pass';
				    } else if ($en > 20) {
				        return 'Pass';
				    }else if ($en > 1) {
				        return 'Fail';
				    } else { return '--'; }
				}
			    
							echo "<table width =\"600\" style=\" margin-top: 10px\" border =\"1\" ></tr>";
							echo "<tr><td style='height: 70px; vertical-align: top'>COMMENT:</td></tr>";
							echo "<tr><td style='height: 70px; vertical-align: top'>RECOMMENDATION:</td></tr>";
							echo "</table>";
							echo "<div class='sign-box'><div class='sign sign-left'>PROPRIETOR</div><div class='sign sign-right'>PRINCIPAL</div></div>";
	?>


	</div>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>