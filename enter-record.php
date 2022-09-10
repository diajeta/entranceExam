<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>jQuery Example</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/mystyle.css"/>
</head>
<body>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Entrance Examination</h3>
		</div>
		<div class="panel-body">
			Entrance Examination for <?php echo file_get_contents('session.txt'); ?> Academic Session
		</div>
	</div>
<div id="content">
	<h1>To enter records choose a subject</h1>

	<div class="choices">
		<h2>Choose subject:</h2>
		<select id="select_subject" name="selsub">
			<option value=""></option>
			<option value="ma">Mathematics</option>
			<option value="en">English Language</option>
			<option value="qa">Quantitative Aptitude</option>
			<option value="ps">Primary Science</option>
			<option value="va">Verbal Aptitude</option>
			<option value="gk">General Knowledge</option>
			<option value="rs">Reading Skill</option>
		</select>
	</div>
	<button id="display_data" type="button" class="btn btn-success">Display Data</button><hr/>
	<div id="live_data"></div>
</div>
<div id="sum"></div>
<div id="avg"></div>
    
<?php 
	include 'footer/footer.php';
?>