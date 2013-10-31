<!DOCTYPE html>
<?php
require_once('../../get_db.php');
$wines = mysql_query('SELECT * FROM wines') or die("Could not perform query... ".mysql_error());
$bottles = mysql_query('SELECT * FROM bottles') or die("Could not perform query... ".mysql_error());
$locations = mysql_query('SELECT * FROM locations') or die("Could not perform query... ".mysql_error());
?>
<html>
	<head>
		<title>Wine Index</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Home" />
		<link type="text/css" rel="stylesheet" href="wines_style.css"/> 		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../javascript/zebra_rows.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src ="../javascript/jquery.js"></script>
		<script type="text/javascript" src ="../javascript/init.js"></script>
	</head>
		<body>
			<?php include('../../wines_header.php'); ?>
			<div id="content">
			<?php include('../../new_wine.php'); ?>
			</div>
		<?php include('../../footer.php'); ?>
		</body>
		<?php mysql_close($connection); ?>
</html>