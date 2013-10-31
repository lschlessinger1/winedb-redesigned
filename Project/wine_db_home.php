<!DOCTYPE html>
<?php
require_once('../get_db.php');
$wines = mysql_query('SELECT * FROM wines') or die("Could not perform query... ".mysql_error());
$locations = mysql_query('SELECT * FROM locations') or die("Could not perform query... ".mysql_error());
include('../search.php');
?>
<html>
	<head>
		<title>Wine Database</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Home" />
		<link type="text/css" rel="stylesheet" href="home_style.css"/> 	
		<script type="text/javascript" src="javascript/jquery.js"></script>
		<script type="text/javascript" src="javascript/init.js"></script>
		<script type="text/javascript" src="../javascript/effects.js"></script>
	</head>
		<body>
			
				<?php include('../home_header.php'); ?>
				<div id="site">
					<div id="wrapper">
						<div id="app" style="margin-top: 57px;" class="home">
							<p id="title_wine"><span id="wineW">W</span>i n e </p>	
							<?php include ('../search_form.php'); ?>
							<p id="title_database">database</p>
							<?php 
							if(isset($_POST['keyword'])){
								echo '<div id="resultsContainer">';
								$keyword = mysql_real_escape_string(htmlentities(trim($_POST['keyword'])));
								$errors = array();
								if(empty($keyword)) {
									$errors[] = 'Please enter a search term';
								} else if(strlen($keyword) < 3) {
									$errors[] = 'Your search term must be 3 or more characters';
								} else if(search_results($keyword) === false) {
									$errors[] = 'Your search for '.$keyword.' returned no results';
								}
								if(empty($errors)){
									search_results($keyword);
									$results = search_results($keyword);
									$results_num = count($results);
									$suffix = ($results_num != 1) ? 's' : '';
									$search_table = trim($_POST["filter"]);
									$num_display_results = trim($_POST["results"]);
									echo'<p id="resultQueryOutput">Your search for <strong>'.$keyword.'</strong> returned <strong>'.$results_num.'</strong> result'.$suffix.'</p>';
									//BEGIN ALL
									if($search_table == "all"){
										if($results_num < $num_display_results){
											foreach($results as $result){
												echo '<p><a href="bottles/bottles_show.php?id='.$result['id'].'"><strong>'.$result["color"]." ".$result['vintage']." ".$result["grape_varietal"]." ".$result['wine_maker_or_vineyard'].'
												</a><pre> '.$result['room'].' '.$result['container_number'].'</pre></p>'; 
											}
										} else if($results_num >= $num_display_results){
											$i = 0;
											foreach($results as $result){ 
												if($i % $num_display_results === 0){
													echo '<p></p>';
												}
												echo '<p><a href="bottles/bottles_show.php?id='.$result['id'].'"><strong>'.$result["color"]." ".$result['vintage']." ".$result["grape_varietal"]." ".$result['wine_maker_or_vineyard'].'
												</a><pre> '.$result['room'].' '.$result['container_number'].'</pre></p>'; 
											}
										}
									}
									//END ALL
									//BEGIN WINES
									if($search_table == "wines"){
										if($results_num < $num_display_results){
											foreach($results as $result){
												echo '<p><a href="wines/wines_show.php?id='.$result['id'].'"><strong>'.$result["color"]." ".$result['vintage']." ".$result["grape_varietal"]." ".$result['wine_maker_or_vineyard'].'</p>'; 
											}
										} else if($results_num >= $num_display_results){
											$i = 0;
											foreach($results as $result){ 
												if($i % $num_display_results === 0){
													echo '<p></p>';
												}
												echo '<p><a href="wines/wines_show.php?id='.$result['id'].'"><strong>'.$result["color"]." ".$row['vintage']." ".$row["region"]." ".$row["grape_varietal"]." ".$row['wine_maker_or_vineyard'].'</p>';
											}
										}
									}
									//END WINES
									//BEGIN BOTTLES
									if($search_table == "bottles"){
										if($results_num < $num_display_results){
											foreach($results as $result){
												echo '<p><a href="bottles/bottles_show.php?id='.$result['id'].'"><strong>'.$result["color"]." ".$result['vintage']." ".$result["grape_varietal"]." ".$result['wine_maker_or_vineyard'].'
												</a><pre> '.$result['room'].' '.$result['container_number'].'</pre></p>'; 
											}
										} else if($results_num >= $num_display_results){
											$i = 0;
											foreach($results as $result){ 
												if($i % $num_display_results === 0){
													echo '<p></p>';
												}
												echo '<p><a href="bottles/bottles_show.php?id='.$result['id'].'"><strong>'.$result["color"]." ".$result['vintage']." ".$result["grape_varietal"]." ".$result['wine_maker_or_vineyard'].'
												</a><pre> '.$result['room'].' '.$result['container_number'].'</pre></p>'; 
											}
										}
									}
									//END BOTTLES
									//BEGIN LOCATIONS
									if($search_table == "locations"){
										if($results_num < $num_display_results){
											foreach($results as $result){
												echo '<p><a href="locations/locations_show.php?id='.$result['id'].'"><strong>'.$result['room'].' '.$result['container_number'].'</strong></a><pre>'.$result['location_comments'].'</pre></p>';
											}
										} else if($results_num >= $num_display_results){
											$i = 0;
											foreach($results as $result){ 
												if($i % $num_display_results === 0){
													echo '<p><a href="#">Display more</a></p>'; //make this
												}
												echo '<p><a href="locations/locations_show.php?id='.$result['id'].'"><strong>'.$result['room'].' '.$result['container_number'].'</strong></a><pre>'.$result['location_comments'].'</pre></p>';
											}
										}
									}
									//END LOCATIONS
									} else {
										foreach($errors as $error){
											echo $error , '</ br>';
										}
									}
								}
								?>
							</div>
						</div>
					</div>
				</div>
				<?php include('../footer.php'); ?>
			
		</body>
</html>