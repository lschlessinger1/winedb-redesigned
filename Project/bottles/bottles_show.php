<!DOCTYPE html>
<?php
require_once('../../get_db.php');
$id = mysql_real_escape_string(htmlentities(trim($_GET['id'])));
$bot = mysql_query('SELECT * FROM bottles WHERE id = '.$id) or die("Could not perform query... ".mysql_error());
$bottles = mysql_query('SELECT bottles.id, bottles.is_open, bottles.wine_id, bottles.location_id, bottles.bottle_comments, bottles.bottle_created_at, wines.vintage, wines.region, wines.country, wines.wine_maker_or_vineyard, wines.supplier, wines.price, wines.lower_life_expectancy, wines.upper_life_expectancy, wines.color, wines.grape_varietal, wines.percent_alcohol, wines.wine_comments, locations.room, locations.container_number
FROM bottles
LEFT JOIN wines
ON bottles.wine_id=wines.id 
LEFT JOIN locations 
ON bottles.location_id=locations.id ORDER BY bottles.bottle_created_at 
') or die("Could not perform query... ".mysql_error());
function getLocation($loc_id){
	$locations = mysql_query('SELECT locations.id, locations.room, locations.container_number, bottles.id
	FROM bottles
	LEFT JOIN locations
	ON bottles.location_id = locations.id
	') or die("Could not perform query... ".mysql_error());
	$location = "";
	while($row = mysql_fetch_array($locations)){
		if($row['id'] == $loc_id){
			$location .= $row['room'];
			if($row['container_number'] !== '0'){
				$location .= " ";
				$location .=$row['container_number'];
			}
		}
	}
	return $location; //room and container number
}
?>
<html>
	<head>
		<title>Show Bottle</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Bottles Show" />
		<link type="text/css" rel="stylesheet" href="bottles_style.css"/> 		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../javascript/zebra_rows.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="../javascript/jquery.js"></script>
		<script type="text/javascript" src="../javascript/init.js"></script>
		<script type="text/javascript" src="../javascript/effects.js"></script>
	</head>
		<body>
			<?php include('bottles_show-edit_header.php'); 	?>
			<div id="content">
				<?php include('../../bottles_header.php'); ?>
				
					<table cellpadding='1' cellspacing='1' id='resultTable'>
					<thead>
					<tr>
					<th>Name</th>
					<th>Vintage</th>
					<th>Region</th>
					<th>Country</th>
					<th>Wine Maker/Vineyard</th>
					<th>Supplier</th>
					<th>Price</th> <!---per bottle--->
					<th>Peak Drinking Period</th> 
					<th>Color</th>
					<th>Grape Varietal</th>
					<th>Percent Alcohol</th>
					<th>Is Open?</th>
					<th>Location </th>
					<th>Bottle Comments</th>
					<th>Wine Comments</th> 
					<th>Edit</th>
					<th>Delete</th>
					</tr>
					</thead>
					<tbody>
					<?php
					while ($row = mysql_fetch_array($bottles)) {
						if($row['id'] == $_GET['id']){
							$loc_id = $row['id'];
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
							print ("<a href='https://www.google.com/search?q=".$row['wine_maker_or_vineyard']."'>");
							print ($row['wine_maker_or_vineyard']);
							print ("</a>");
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
							if($row['is_open'] == 0){
								print("Closed");
							} else {
								print("Open!");
							}
							print ("</td>");
							print ("<td >");
							print (getLocation($loc_id));
							print ("</td>");
							print ("<td >");
							if($row['bottle_comments'] !== ''){
								print ($row['bottle_comments']);
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
							print ("<a href='bottles_edit.php?id=".$row['id']."' class='editButton'>");
							print ("EDIT");
							print ("</a>");
							print ("</td>");
							print ("<td>");
							print ("<a href='bottles_delete.php?id=".$row['id']."' onclick='return confirm(\"Are you sure?\");' class='deleteButton'>");
							print ("DELETE");
							print ("</a>");
							print ("</td>");
							print ("</tr>");
							}
						}
						?>
						</tbody>
						</table> 
						<?php include('../../footer.php'); ?>
		</body>
</html>