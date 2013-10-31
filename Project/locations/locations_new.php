<!DOCTYPE html>
<?php
require_once('../../get_db.php');
$result = mysql_query('SELECT * FROM locations') or die("Could not perform query... ".mysql_error());
?>
<html>
	<head>
		<title>Wine Database</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="New Location" />
		<link type="text/css" rel="stylesheet" href="locations_style.css"/> 		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../javascript/zebra_rows.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="../javascript/jquery.js"></script>
		<script type="text/javascript" src="../javascript/init.js"></script>
		<script type="text/javascript" src="../javascript/form_validation.js"></script>
	</head>
		<body>
			<?php include('locations_show-edit_header.php'); ?>
			<div id="content">
				<?php include('../../new_location.php'); ?>
			</div>
			<?php include('../../footer.php'); ?>
		</body>
</html>