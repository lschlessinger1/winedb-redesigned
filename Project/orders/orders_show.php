<!DOCTYPE html>
<?php
require_once('../../get_db.php');
$id = mysql_real_escape_string(htmlentities(trim($_GET['id'])));
$order = mysql_query('SELECT * FROM orders WHERE id = '.$id) or die("Could not perform query... ".mysql_error());
$wines = mysql_query('SELECT * FROM wines') or die("Could not perform query... ".mysql_error());
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
		<title>Show Location</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Home" />
		<link type="text/css" rel="stylesheet" href="orders_style.css"/> 		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../javascript/zebra_rows.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="../javascript/jquery.js"></script>
		<script type="text/javascript" src="../javascript/init.js"></script>
		<script type="text/javascript" src="../javascript/form_validation.js"></script>
		<script type="text/javascript" src="../javascript/effects.js"></script>
	</head>
		<body>
			<?php include('orders_show-edit_header.php'); ?>	
			<div id="content">
			<table cellpadding='1' cellspacing='1' id='resultTable'>
				<thead>
					<tr>
						<th>Wine</th>
						<th>Estimated Arrival</th>
						<th>Quantity</th>
						<th>Comments</th>
						<th>Add</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
			<tbody>
			<?php
				while ($row = mysql_fetch_array($order)) {
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
			<?php include('../../footer.php'); ?>
		</body>
</html>