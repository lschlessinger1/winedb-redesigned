<!DOCTYPE html>
<?php
require_once('../../get_db.php');
$wines = mysql_query('SELECT * FROM wines') or die("Could not perform query... ".mysql_error());
$orders = mysql_query('SELECT * FROM orders') or die("Could not perform query... ".mysql_error());
$locations = mysql_query('SELECT * FROM locations') or die("Could not perform query... ".mysql_error());
function getWine($wine_id){ //$wine_id is foreign key from orders table
$wines = mysql_query('SELECT * FROM wines WHERE id = '.$wine_id) or die("Could not perform query... ".mysql_error());
	$wine = "";
	while($row = mysql_fetch_array($wines)){
		$wine .= $row['grape_varietal'];
		$wine .= ' ';
		$wine .= $row['region'];
		$wine .= ' ';
		$wine .= $row['wine_maker_or_vineyard'];
	}
	return $wine; //wine name
}
?>
<html>
	<head>
		<title>Order Index</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="orders" />
		<link type="text/css" rel="stylesheet" href="orders_style.css"/>
		<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
		<script type="text/javascript" src="../javascript/jquery.js"></script>
		<script type="text/javascript" src="../javascript/init.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script src="../javascript/zebra_rows.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script type="text/javascript" src="../javascript/form_validation.js"></script>
		<script type="text/javascript" src="../javascript/effects.js"></script>
	</head>
		<body>
			<?php include('../../orders_header.php'); ?>
			<div id="site">
					<div id="wrapper">
						<div id="app" style="margin-top: 57px;" class="home">
						<?php
						if(mysql_num_rows($wines) > 0){
							include('../../new_order.html');
						} else {
							echo '<div style="color: white; text-align:center; padding:10px; margin-bottom:25px;" class="error">';
							echo '<h3 style="width:25%; margin: 0 auto; border: 3px solid #C80000; padding:10px; "> Oops! It looks you haven\'t created any wines yet.</h3>';
							echo '<p style="padding-top:5px; color:#280000 ;">Click <a href="#" style="color:#33CCFF; text-decoration:none;">here</a> to add wines</p>';
							echo '</div>';
						}
						?>
			<table cellpadding='1' cellspacing='1' id='resultTable'>
				<thead>
					<tr>
						<th>Wine</th>
						<th>Estimated Arrival</th>
						<th>Quantity</th>
						<th>Comments</th>
						<th>Add</th>
						<th>Show</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
			<tbody>
			<?php
				while ($row = mysql_fetch_array($orders)) {
					print ("<tr class='removableRow'>");
					print ("<td>");
					print ("<a href='../wines/wines_show.php?id=".$row['wine_id']."' class='showNameAnchor'>");
					print (getWine($row['wine_id']));
					print ("</a>");
					print ("</td>");
					print ("<td>");
					if($row['estimated_arrival'] !== '0000-00-00'){
						print ($row['estimated_arrival']);
					} else {
						print ('N/A');
					}
					print ("<td class='quantity'>");
					if($row['quantity'] !== '0'){
						print ($row['quantity']);
					} else {
						print ('N/A');
					}
					print ("</td>");
					print ("<td>");
					if($row['order_comments'] !== ''){
						print ($row['order_comments']);
					} else {
						print ('N/A');
					}
					print ("</td>");
					print ("<td>");
					print ("<a href='orders_add.php?id=".$row['id']."' class='addButton'>");
					print ("ADD");
					print ("</a>");
					print ("</td>");
					print ("<td>");
					print ("<a href='orders_show.php?id=".$row['id']."' class='showButton'>");
					print ("SHOW");
					print ("</a>");
					print ("</td>");
					print ("<td>");
					print ("<a href='orders_edit.php?id=".$row['id']."' class='editButton'>");
					print ("EDIT");
					print ("</a>");
					print ("</td>");
					print ("<td>");
					print ("<a href='orders_delete.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\");' class='deleteButton'>");
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
			<div id="ordersChooseLocation">
				<form  id="ordersLocationForm">
					<fieldset class="orderLocationsFieldSet">
						<h5 id="addLocationAnchorHeader">Add a Location: </h5>
						<p id="numBottlesLeftPar">You must assign <span id="numBottlesLeft"></span> bottle<span id="pluralBottlesLeft"></span> to location(s)</p>
						<br />
						<!--<input name="new_location_id" type="hidden" value=" "/>
						<!--<input type="text" name="new_location_id" id="location_id" class="text ui-widget-content ui-corner-all" /> -->
						<ol id="chosenLocationsList" name="locationList"></ol>
						<ol id="selectableLocationsList">
						<?php 
							while ($row = mysql_fetch_array($locations)) {
								print('<li class="ui-widget-content" value="'.$row['id'].'">');
								print($row['room']);
								if($row['container_number'] !== '0'){
									print(' ');
									print ($row['container_number']);
								}
								print('</li>');			
							}
						?>
						</ol>
					</fieldset>
				</form>
			</div>
			<?php include('../../footer.php'); ?>
		</body>