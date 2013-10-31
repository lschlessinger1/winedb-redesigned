<!DOCTYPE html>
<?php
require_once('../../get_db.php');
$result = mysql_query('SELECT * FROM locations') or die("Could not perform query... ".mysql_error());
?>
<html>
	<head>
		<title>Wine Database</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="locations" />
		<link type="text/css" rel="stylesheet" href="locations_style.css"/> 		
		<script type="text/javascript" src="../javascript/jquery.js"></script>
		<script type="text/javascript" src="../javascript/init.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script src="../javascript/zebra_rows.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../javascript/form_validation.js"></script>
		<script type="text/javascript" src="../javascript/effects.js"></script>
		<script>
		$(document).ready(function() {
			$("#postalCode").keyup(function() {
			var el = $(this);
			
			if ((el.val().length == 5) && (is_int(el.val()))) { 
				$.ajax({
				  url: "http://zip.elevenbasetwo.com",
				  cache: false,
				  dataType: "json",
				  type: "GET",
				  data: "zip=" + el.val(),
				  success: function(result, success) {
					console.log(result);
					el.css('border-color','green');
				  },
				  error: function(result, success) {
					el.css('border-color','yellow');
				  }
				});
			}
		});
		});
		function is_int(value){ 
		  if ((parseFloat(value) == parseInt(value)) && !isNaN(value)) {
			  return true;
		  } else { 
			  return false;
		  } 
		}
		</script>
	</head>
		<body>
			<?php include('../../locations_header.php'); ?>
			<div id="site">
					<div id="wrapper">
						<div id="app" style="margin-top: 57px;" class="home">
			<?php include('../../new_location.php'); ?>
				<table cellpadding='1' cellspacing='1' id='resultTable'>
					<thead>
						<tr>
							<th>Room</th>
							<th>Room</th>
							<th>Container Number</th>
							<th>Comments</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
				<tbody> 
				<?php
				while ($row = mysql_fetch_array($result)) {
					print ("<tr>");
					print ("<td>");
					print ("<a href='locations_show.php?id=".$row['id']."' class='showNameAnchor'>");
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
					print ("</a>");
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
				<?php mysql_close($connection); ?>
			</div>
			</div>
			</div>
			<?php include('../../footer.php'); ?>
		</body>
</html>