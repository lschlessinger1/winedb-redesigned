<!DOCTYPE html>
<?php
require_once('../../get_db.php');
$id = mysql_real_escape_string(htmlentities(trim($_GET['id'])));
$wine = mysql_query('SELECT * FROM wines WHERE id = '.$id)or die("Could not perform query... ".mysql_error());
function calcQuantity($wine_id) {
	$bottles = mysql_query('SELECT bottles.id, wines.id
	FROM wines
	LEFT JOIN bottles
	ON wines.id = bottles.wine_id 
	') or die("Could not perform query... ".mysql_error());
	
	$quantity = 0;
    while ($row = mysql_fetch_array($bottles)) {
		if($row['id'] == $wine_id){
			$quantity++;
		}
	}
	return $quantity;
}
?>
<html>
	<head>
		<title>Wine Index</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Home" />
		<link type="text/css" rel="stylesheet" href="wines_style.css"/> 		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../javascript/zebra_rows.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="../javascript/jquery.js"></script>
		<script type="text/javascript" src="../javascript/init.js"></script>
		<script type="text/javascript" src="../javascript/form_validation.js"></script>
		<script type="text/javascript" src="../javascript/effects.js"></script>
	</head>
		<body>
			<div id="content">
			<?php include('wines_show-edit_header.php'); ?>
			<br />
			<table cellpadding='1' cellspacing='1' id='resultTable'>
			<thead>
			<tr>
			<th>Name</th>
			<th>Vintage</th>
			<th>Region</th>
			<th>Country</th>
			<th>Wine Maker/Vineyard</th>
			<th>Supplier</th>
			<th>Price</th>
			<th>Peak Drinking Period</th>
			<th>Color</th>
			<th>Grape Varietal</th>
			<th>Percent Alcohol</th>
			<th>Comments</th>
		    <th>Quantity</th>
			<th>Edit</th>
			<th>Delete</th>
			</tr>
			</thead>
			<tbody>
			<?php
			while ($row = mysql_fetch_array($wine)) {
				$wine_id = $row['id'];
				print ("<tr>");
				print ("<td>");
				print ($row['grape_varietal']);
				print (' ');
				print ($row['region']);
				print (' ');
				print ($row['wine_maker_or_vineyard']);
				print ("</td>");
				print ("<td >");
				print ($row['vintage']);
				print ("</td>");
				print ("<td >");
				print ($row['region']);
				print ("</td>");
				print ("<td >");
				if($row['country'] !== ''){
					print ($row['country']);
				} else {
					print ('N/A');
				}
				print ("</td>");
				print ("<td >");
				print ($row['wine_maker_or_vineyard']);
				print ("</td>");
				print ("<td >");
				if($row['supplier'] !== ''){
					print ($row['supplier']);
				} else {
					print ('N/A');
				}
				print ("</td>");
				print ("<td >");
				if($row['price'] !== '0.00'){
					print ("$");
					print ($row['price']);
				} else {
					print ('N/A');
				}
				print ("</td>");
				print ("<td >");
				if($row['lower_life_expectancy'] !== '0000' && $row['upper_life_expectancy'] !== '0000'){
					print ($row['lower_life_expectancy']);
					print(' - ');
					print ($row['upper_life_expectancy']);
					print ("</td>");
				} else {
					print ('N/A');
				}
				print ("</td>");
				print ("<td >");
				print ($row['color']);
				print ("</td>");
				print ("<td >");
				print ($row['grape_varietal']);
				print ("</td>");
				print ("<td >");
				if($row['percent_alcohol'] !== '0.00'){
					print ($row['percent_alcohol']);
					print ("%");
				} else {
					print ('N/A');
				}
				print ("</td>");
				print ("<td >");
				if($row['wine_comments'] !== ''){
					print ($row['wine_comments']);
				} else {
					print ('N/A');
				}
				print ("</td>");
				print ("<td>");
				print (calcQuantity($wine_id)); // make # bottle(s)
				print ("</td>");
				print ("<td>");
				print ("<a href='wines_edit.php?id=".$row['id']."' class='editButton'>");
				print ("EDIT");
				print ("</a>");
				print ("</td>");
				print ("<td>");
				print ("<a href='wines_delete.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\");' class='deleteButton'>");
				print ("DELETE");
				print ("</a>");
				print ("</td>");
				print ("</tr>");
				}
				?>
				</tbody>
				</table>
			</div>
			<?php include('../../footer.php'); ?>
		</body>
		<?php mysql_close($connection); ?>
</html>