<!DOCTYPE html>
<?php
require_once('../../get_db.php');
$wines = mysql_query('SELECT * FROM wines ORDER BY wine_created_at') or die("Could not perform query... ".mysql_error());

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
		<script type="text/javascript" src="../javascript/jquery.js"></script>
		<script type="text/javascript" src="../javascript/init.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script src="../javascript/zebra_rows.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../javascript/form_validation.js"></script>
		<script type="text/javascript" src="../javascript/effects.js"></script>
		
		<link rel="stylesheet" href="../jquery-css-dropdown-plugin-master/dropdown-menu.css" />
		<link rel="stylesheet" href="../jquery-css-dropdown-plugin-master/dropdown-menu-skin.css" />
		<script type="text/javascript" src="../jquery-css-dropdown-plugin-master/lib/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="../jquery-css-dropdown-plugin-master/dropdown-menu.min.js"></script>
		<script type="text/javascript">
		$(function() {
			$('#regions').dropdown_menu({
				sub_indicators : true,
				vertical : true
			});
		});
		$(function() {
			$('#types').dropdown_menu({
				sub_indicators : true,
				vertical : true
			});
		});
		</script>
		<style type="text/css">
		#searchArea{

		}
		#topNav {
			height: 75px;
			border-bottom: 1px solid black;
		}
		#leftTabs {
			float:left;
			width:250px;
			height:75px;
	
		}
		#leftTabs table{
			margin-top:15px;
			margin-bottom:0;
			margin-left:auto;
			margin-right:auto;
		}
		#rightTabs {
			float:right;
			display:inline;
		}
		#rightTabs ul li{
			list-style-type:none;
			text-decoration:none;
			display:inline;
			margin:5px;
		}
		#sideBarLeft {
			float:left;
			width:250px;
		}
		#sideBarLeft div {
			padding-bottom:20px;
		}
		#sideBarLeft div h4{
			padding-top:10px;
			border-top:1px solid black;
		}
		#wineSearchDiv{
			padding-bottom:20px;
		}
		#wineSearchDiv table{
			margin-left:250px;
			margin-top:10px;
		}
		#search {
			width:400px;
			padding: 3px;
			font-size: 16px;
		}
		#createWine {
			text-decoration:none;
		}
		#results {
			float:right;
			width:550px;
			margin-right:10px;
			margin-bottom:10px;
			
		}
		#results tbody tr td.pagination{
			width: 300px;
			margin-top: 6px;
			margin-right: 10px;
			margin-bottom: 10px;
		}
		#results tbody tr td.filters{
			width:270px;
		}
		#results tbody tr td a.result{
			display:block;
		}
		.pagination div a{
			margin: 0 6px 0 0;
			padding: 2px 5px 2px 5px;
			width: auto;
			float: left;
			background: #ccc;
			color: #260a07;
			border: 1px solid #e1cdc1;
			font-size: 11px;
			text-decoration:none;
		}
		.small, .small em {
			font-size: 10px;
		}
		</style>
		
	</head>
		<body>
			<?php include('../../wines_header.php'); ?>
				<div id="site">
					<div id="wrapper">
						<div id="app" style="margin-top: 57px;" class="home">
						<?php// include('../../new_wine.php'); ?>
						<div id="searchArea">
							<div id="topNav">
								<div id="leftTabs">
									<table>
									<tbody>
										<tr>
											<td>
												<a id="createWine" href="#">Create a Wine</a>
											</td>
										</tr>
									</tbody>
								</table>
								</div>
								<div id="rightTabs">
									<ul>
										<li>
											<a href="#">Tab 1</a>
										</li>
										<li>
											<a href="#">Tab 2</a>
										</li>
									</ul>
								</div>
								
							</div>
							<div id="wineSearchDiv">
								<table>
									<tbody>
										<tr>
											<td>
												<input id="search" type="text" placeholder="Search for a wine..."/>
											</td>
											<td>
												<input type="submit" value="Search"/>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							
							<div id="results">
								<table>
									<tbody>
										<tr>
											<td class="pagination">
													<div>
														<a href="#"><strong>1</strong></a>
														<a href="#"><strong>2</strong></a>
														<a href="#"><strong>3</strong></a>
														<a href="#"><strong>></strong></a>
													</div>
											</td>
											<td class="filters">
													<a href="#">Sort by: </a>
													<a href="#">Display: </a>
											</td>
										</tr>
										<tr>
											<td>
												<h3><a href="#">Naia Verdejo 2004</a></h3>
												<p class="small"><em>Naia | Spain | Rueda | 2004</em></p>
												<p>No reviews</p>
											</td>
											<td class="actions">
												<a class="result" href="#">Review</a>
												<a class="result" href="#">Add</a>
												<a class="result" href="#">Find a vintage</a>
												<a class="result" href="#">Share</a>
											</td>
										</tr>
										<tr>
											<td>
												<h3><a href="#">Marques de Caceres Satinela Rioja Blanco 1998</a></h3>
												<p class="small"><em>Marques de Caceres | Spain | Rioja | 1998</em></p>
												<p>No reviews</p>
											</td>
											<td class="actions">
												<a class="result" href="#">Review</a>
												<a class="result" href="#">Add</a>
												<a class="result" href="#">Find a vintage</a>
												<a class="result" href="#">Share</a>
											</td>
										</tr>
										<tr>
											<td>
												<h3><a href="#">Salneval Albarino 2007</a></h3>
												<p class="small"><em>Salneval | Spain | Other Spain | 2007</em></p>
												<p>No reviews</p>
											</td>
											<td class="actions">
												<a class="result" href="#">Review</a>
												<a class="result" href="#">Add</a>
												<a class="result" href="#">Find a vintage</a>
												<a class="result" href="#">Share</a>
											</td>
										</tr>
										<tr>
											<td>
												<h3><a href="#">Gran Sarao Cava</a></h3>
												<p class="small"><em>Gran Sarao | Spain | 2010</em></p>
												<p>No reviews</p>
											</td>
											<td class="actions">
												<a class="result" href="#">Review</a>
												<a class="result" href="#">Add</a>
												<a class="result" href="#">Find a vintage</a>
												<a class="result" href="#">Share</a>
											</td>
										</tr>
										<tr>
											<td>
												<h3><a href="#">Alta Vin "Tinto Joven" 2011</a></h3>
												<p class="small"><em>Alta Vin | Spain | Other Spain | 2011</em></p>
												<p>No reviews</p>
											</td>
											<td class="actions">
												<a class="result" href="#">Review</a>
												<a class="result" href="#">Add</a>
												<a class="result" href="#">Find a vintage</a>
												<a class="result" href="#">Share</a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<div id="sideBarLeft">
								<div id="searchRegions">
									<h4 id="regionHeader">Search Regions</h4>
									<ul id="regions" class="dropdown-menu">
										<li><a href="#">Canada</a></li>
										<li>
											<a href="#">France</a>
											<ul>
												<li>
													<a href="#">Bordeaux</a>
												</li>
												<li>
													<a href="#">Rhone</a>
												</li>
											</ul>
										</li>
									</ul>
								</div>
								<div id="searchType">
									<h4 id="typeHeader">Search Type</h4>
									<ul id="types" class="dropdown-menu">
										<li>
											<a href="#">Red Wines</a>
											<ul>
												<li>
													<a href="#">Cabernet Franc</a>
												</li>
												<li>
													<a href="#">Merlot</a>
												</li>
											</ul>
										</li>
										<li>
											<a href="#">France</a>
											<ul>
												<li>
													<a href="#">Bordeaux</a>
												</li>
											</ul>
										</li>
									</ul>
								</div>
								<div id="searchVineyard">
									<h4 id="vineyardHeader">Search Vineyard</h4>
									<input type="text" />
								</div>
								<div id="searchVintage">
									<h4 id="vintageHeader">Search Vintage</h4>
									<select>
										<option>2013</option>
										<option>2012</option>
										<option>2011</option>
										<option>2010</option>
										<option>2009</option>
									</select>
								</div>
							</div>
						</div>
						<!--
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
										<th>Wine Notes</th>
										<th>Quantity</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>
								<tbody> -->
								<?php
								/*while ($row = mysql_fetch_array($wines)) {
									$wine_id = $row['id'];
									print ("<tr>");
									print ("<td>");
									print ("<a href='wines_show.php?id=".$row['id']."' class='showNameAnchor'>");
									print ($row['grape_varietal']);
									print (' ');
									print ($row['region']);
									print (' ');
									print ($row['wine_maker_or_vineyard']);
									print ("</a>");
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
									if($row['wine_comments'] !== ''){
										print ($row['wine_comments']);
									} else {
										print ('N/A');
									}
									print ("</td>");
									print ("<td>");
									print (calcQuantity($wine_id)); //what about adding # bottle(s)
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
								*/?>
							<!--</tbody>
						</table>
					--></div>
				</div>
			</div> 
			<?php include('../../footer.php'); ?>
		</body>
		<?php mysql_close($connection); ?>
</html>