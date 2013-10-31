<!DOCTYPE html>
<?php
require_once('../../get_db.php');
$id = mysql_real_escape_string(htmlentities(trim($_GET['id'])));
$loc = mysql_query('SELECT * FROM locations WHERE id = '.$id) or die("Could not perform query... ".mysql_error());
?>
<html>
	<head>
		<title>Show Location</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Home" />
		<link type="text/css" rel="stylesheet" href="locations_style.css"/> 		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../javascript/zebra_rows.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="../javascript/jquery.js"></script>
		<script type="text/javascript" src="../javascript/init.js"></script>
		<script type="text/javascript" src="../javascript/form_validation.js"></script>
		<script type="text/javascript" src="../javascript/effects.js"></script>
	</head>
		<body>
			<?php include('locations_show-edit_header.php'); ?>	
			<div id="content">
				<table cellpadding='1' cellspacing='1' id='resultTable'>
					<thead>
						<tr>
							<th>Address</th>
							<th>Room</th>
							<th>Container Number</th>
							<th>Comments</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
				<tbody>
				<?php
				while ($row = mysql_fetch_array($loc)) {
					print ("<tr>");
					print ("<td>");
					print ($row['name']);
					print (' ');
					print ($row['address_line_1']);
					print (' ');
					print ($row['address_line_2']);
					print (', ');
					print ($row['city']);
					print (' ');
					print ($row['state_province_region']);
					print (' ');
					print ($row['postal_code']);
					print (', ');
					print ($row['country']);
					print ("</td>");
					print ("<td>");
					print ($row['room']);
					print ("</td>");
					print ("<td >");
					if($row['container_number'] !== '0'){
						print ($row['container_number']);
					} else {
						print ('N/A');
					}
					print ("</td>");
					print ("<td>");
					if($row['location_comments'] !== ''){
						print ($row['location_comments']);
					} else {
						print ('N/A');
					}
					print ("</td>");
					print ("<td>");
					print ("<a href='locations_edit.php?id=".$row['id']."' class='editButton'>");
					print ("EDIT");
					print ("</a>");
					print ("</td>");
					print ("<td>");
					print ("<a href='locations_delete.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\");' class='deleteButton'>");
					print ("DELETE");
					print ("</a>");
					print ("</td>");
					print ("</tr>");
				}
				?>
				</tbody>
				</table>
				<?php include('../google_maps/google_maps.html'); ?>
				<?php mysql_close($connection); ?>
			</div>
			<?php include('../../footer.php'); ?>
		</body>
</html>