<?php 
	include 'siteResource/db.php';
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

		$connect = mysqli_connect($db_host, $db_user, $db_pass, "admission");

		$output = '';
		$Part1_output = '';

			$sql = "SELECT * FROM `admission` WHERE `session` = '".$session."' ORDER BY `percentage` DESC";


				echo "<h4>BROADSHEET FOR ENTRANCE EXAMINATION ".$session." ACADEMIC SESSION</h4>";

			$resultA = mysqli_query($connect, $sql) or die('error getting data');
			$Part1_output .= "<table class=\"table table-bordered table-striped\">";
			$Part1_output .= "<tr><th>Exam. No.</th><th>Name</th><th >Mathematics</th><th >English Lang.</th><th >Quantitative Apt.</th><th >Primary Sci.</th><th >Verbal Apti.</th><th >General Know.</th><th >Reading Skill</th><th >Total</th><th >Percentage</th><th >Remark</th></tr>";

			while($row = mysqli_fetch_array($resultA, MYSQLI_ASSOC)){
						
						$Part1_output .= "<tr><td>".$row['examNo']."</td><td>".$row['name']."</td><td>".$row['ma']."</td><td>".$row['en']."</td><td>".$row['qa']."</td><td>".$row['ps']."</td><td>".$row['va']."</td><td>".$row['gk']."</td><td>".$row['rs']."</td><td>".$row['total']."</td><td>".number_format($row['percentage'], 2)."</td><td></td></tr>";
			}
			$Part1_output .= "</table>";
			echo $Part1_output;

	?>


	</div>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
