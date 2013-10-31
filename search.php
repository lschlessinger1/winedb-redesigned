<?php
require_once('get_db.php');
/*session_start();
$q = trim($_GET["keyname"]);
$filter = trim($_GET["filter"]);
$search = false;
$query = ""; */
function search_results($keywords){
	$search_table = trim($_POST["filter"]);
	$num_display_results = trim($_POST["results"]);
	$returned_results = array();
	$where = "";
	$keywords = preg_split('/[\s]+/', $keywords);
	$total_keywords = count($keywords);
	if($search_table === "all") {
		$where .= '(';
		foreach($keywords as $key=>$keyword){
			$where .= "color LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ") OR (";
		foreach($keywords as $key=>$keyword){
			$where .= "vintage LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ") OR (";
		foreach($keywords as $key=>$keyword){
			$where .= "grape_varietal LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ") OR (";
		foreach($keywords as $key=>$keyword){
			$where .= "region LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ") OR (";
		foreach($keywords as $key=>$keyword){
			$where .= "wine_maker_or_vineyard LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ')';
		$results = "SELECT bottles.id, bottles.is_open, bottles.wine_id, bottles.location_id, bottles.bottle_comments, wines.vintage, wines.region, wines.country, wines.wine_maker_or_vineyard, wines.supplier, wines.price, wines.lower_life_expectancy, wines.upper_life_expectancy, wines.color, wines.grape_varietal, wines.percent_alcohol, wines.wine_comments, locations.room, locations.container_number, locations.location_comments
				FROM bottles
				LEFT JOIN wines
				ON bottles.wine_id=wines.id 
				LEFT JOIN locations 
				ON bottles.location_id=locations.id WHERE $where";
		$results_num = ($results = mysql_query($results)) ? mysql_num_rows($results) : 0;
		if($results_num === 0) {
			return false;
		} else {
			while($results_row = mysql_fetch_assoc($results)){
				$returned_results[] = array ('id' => $results_row['id'], 'color' => $results_row['color'], 'vintage' => $results_row['vintage'], 'region' => $results_row['region'], 'grape_varietal' => $results_row['grape_varietal'], 'wine_maker_or_vineyard' => $results_row['wine_maker_or_vineyard'], 'room' => $results_row['room'], 'container_number' => $results_row['container_number']);
			}
			return $returned_results;
		}
	} else if($search_table === "wines"){
		$where .= '(';
		foreach($keywords as $key=>$keyword){
			$where .= "color LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ") OR (";
		foreach($keywords as $key=>$keyword){
			$where .= "vintage LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ") OR (";
		foreach($keywords as $key=>$keyword){
			$where .= "grape_varietal LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ") OR (";
		foreach($keywords as $key=>$keyword){
			$where .= "region LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ") OR (";
		foreach($keywords as $key=>$keyword){
			$where .= "wine_maker_or_vineyard LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ')';
		$results = "SELECT * FROM wines WHERE $where";
		$results_num = ($results = mysql_query($results)) ? mysql_num_rows($results) : 0;
		if($results_num === 0) {
			return false;
		} else {
			while($results_row = mysql_fetch_assoc($results)){
				$returned_results[] = array ('id' => $results_row['id'], 'color' => $results_row['color'], 'vintage' => $results_row['vintage'], 'region' => $results_row['region'], 'grape_varietal' => $results_row['grape_varietal'], 'wine_maker_or_vineyard' => $results_row['wine_maker_or_vineyard']);
			}
			return $returned_results;
		}
	} else if($search_table === "bottles"){
		$where .= '(';
		foreach($keywords as $key=>$keyword){
			$where .= "color LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ") OR (";
		foreach($keywords as $key=>$keyword){
			$where .= "vintage LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ") OR (";
		foreach($keywords as $key=>$keyword){
			$where .= "grape_varietal LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ") OR (";
		foreach($keywords as $key=>$keyword){
			$where .= "region LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ") OR (";
		foreach($keywords as $key=>$keyword){
			$where .= "wine_maker_or_vineyard LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ')';
		$results = "SELECT bottles.id, bottles.is_open, bottles.wine_id, bottles.location_id, bottles.bottle_comments, wines.vintage, wines.region, wines.country, wines.wine_maker_or_vineyard, wines.supplier, wines.price, wines.lower_life_expectancy, wines.upper_life_expectancy, wines.color, wines.grape_varietal, wines.percent_alcohol, wines.wine_comments, locations.room, locations.container_number, locations.location_comments
				FROM bottles
				LEFT JOIN wines
				ON bottles.wine_id=wines.id 
				LEFT JOIN locations 
				ON bottles.location_id=locations.id WHERE $where";
		$results_num = ($results = mysql_query($results)) ? mysql_num_rows($results) : 0;
		if($results_num === 0) {
			return false;
		} else {
			while($results_row = mysql_fetch_assoc($results)){
				$returned_results[] = array ('id' => $results_row['id'], 'color' => $results_row['color'], 'vintage' => $results_row['vintage'], 'region' => $results_row['region'], 'grape_varietal' => $results_row['grape_varietal'], 'wine_maker_or_vineyard' => $results_row['wine_maker_or_vineyard'], 'room' => $results_row['room'], 'container_number' => $results_row['container_number']);
			}
			return $returned_results;
		}
	} else if($search_table === "locations"){
		$where .= '(';
		foreach($keywords as $key=>$keyword){
			$where .= "room LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ") OR (";
		foreach($keywords as $key=>$keyword){
			$where .= "container_number LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ") OR (";
		foreach($keywords as $key=>$keyword){
			$where .= "location_comments LIKE '%$keyword%'";
			if($key != ($total_keywords - 1)){
				$where .= " AND ";
			}
		}
		$where .= ')';
		$results = "SELECT * FROM locations WHERE $where";
		$results_num = ($results = mysql_query($results)) ? mysql_num_rows($results) : 0;
		if($results_num === 0) {
			return false;
		} else {
			while($results_row = mysql_fetch_assoc($results)){
				$returned_results[] = array ('id' => $results_row['id'], 'room' => $results_row['room'], 'container_number' => $results_row['container_number'], 'location_comments' => $results_row['location_comments']);
			}
			return $returned_results;
		}
	} else {
		return false;
	}/*
	foreach($keywords as $key=>$keyword){
		$where .= "'column' LIKE '%$keyword%'";
		if($key != ($total_keywords - 1)){
			$where .= " AND ";
		}
	}*/
	/*$results = "SELECT `column1`, LEFT(`description`, 70) as `description`, `column3` FROM `table` WHERE $where";
	$results_num = ($results = mysql_query($results)) ? mysql_num_rows($results) : 0;
	if($results_num === 0) {
		return false;
	} else {
		while($results_row = mysql_fetch_assoc($results)){
			$returned_results[] = array ('column1' => $results_row['column1'], 'column2' => $results_row['column2']);
		}
		return $returned_results;
	}*/
}
/*if($q == "" || $q == null){
	$_SESSION['results'] = "";
	$_SESSION['search'] = $search;
	Header('Location: Project/wine_db_home.php');
	exit();
}
if ($filter == "all"){ //join all of the tables
$query = "SELECT bottles.id, bottles.is_open, bottles.wine_id, bottles.location_id, wines.name, wines.vintage, wines.region, wines.country, wines.wine_maker_or_vineyard, wines.supplier, wines.price, wines.lower_life_expectancy, wines.upper_life_expectancy, wines.color, wines.grape_type, wines.percent_alcohol, wines.wine_notes, locations.room, locations.container_number, locations.loc_notes
FROM bottles
LEFT JOIN wines
ON bottles.wine_id=wines.id 
LEFT JOIN locations 
ON bottles.location_id=locations.id WHERE name LIKE '%$q%' OR vintage LIKE '%$q%' OR region LIKE '%$q%' OR country LIKE '%$q%' OR wine_maker_or_vineyard LIKE '%$q%' OR supplier LIKE '%$q%' OR price LIKE '%$q%' OR upper_life_expectancy LIKE '%$q%' OR lower_life_expectancy LIKE '%$q%'OR color LIKE '%$q%' OR grape_type LIKE '%$q%' OR percent_alcohol LIKE '%$q%' OR wine_notes LIKE '%$q%' OR room LIKE '%$q%' OR container_number LIKE '%$q%' OR loc_notes LIKE '%$q%' LIMIT 0,$_GET[results]";

} else if ($filter == "wines") {
$query = "SELECT * FROM wines WHERE name LIKE '%$q%' OR vintage LIKE '%$q%' OR region LIKE '%$q%' OR country LIKE '%$q%' OR wine_maker_or_vineyard LIKE '%$q%' OR supplier LIKE '%$q%' OR price LIKE '%$q%' OR upper_life_expectancy LIKE '%$q%' OR lower_life_expectancy LIKE '%$q%'OR color LIKE '%$q%' OR grape_type LIKE '%$q%' OR percent_alcohol LIKE '%$q%' OR wine_notes LIKE '%$q% 'LIMIT 0,$_GET[results]";
} else if ($filter == "bottles") {
$query = "SELECT bottles.id, bottles.is_open, bottles.wine_id, bottles.location_id, wines.name, wines.vintage, wines.region, wines.country, wines.wine_maker_or_vineyard, wines.supplier, wines.price, wines.lower_life_expectancy, wines.upper_life_expectancy, wines.color, wines.grape_type, wines.percent_alcohol, wines.wine_notes, locations.room, locations.container_number, locations.loc_notes
FROM bottles
LEFT JOIN wines
ON bottles.wine_id=wines.id 
LEFT JOIN locations 
ON bottles.location_id=locations.id WHERE name LIKE '%$q%' OR vintage LIKE '%$q%' OR region LIKE '%$q%' OR country LIKE '%$q%' OR wine_maker_or_vineyard LIKE '%$q%' OR supplier LIKE '%$q%' OR price LIKE '%$q%' OR upper_life_expectancy LIKE '%$q%' OR lower_life_expectancy LIKE '%$q%'OR color LIKE '%$q%' OR grape_type LIKE '%$q%' OR percent_alcohol LIKE '%$q%' OR wine_notes LIKE '%$q%' LIMIT 0,$_GET[results]";
} else if ($filter == "locations")
$query = "SELECT * FROM locations WHERE room LIKE '%$q%' OR container_number LIKE '%$q%' OR loc_notes LIKE '%$q%' LIMIT 0,$_GET[results]";
else 
	echo "No filter was selected"; // is this possible?
	// still have to make a separate page for the results of the search
	// i can reuse each query and output for each sub-page i.e. a search in locations/locations_index.php will be the same search
$results = mysql_query($query);
if(mysql_num_rows($results) >= 1) {
	$output = "";
	$numResults = 0;
	if($filter == "wines"){
		while($row = mysql_fetch_array($results)) {
			$output .=  "Name: " . $row['name'] . "<br />";
			$output .=  "Vintage: " . $row['vintage'] . "<br />";
			$output .=  "Region: " . $row['region'] . "<br />";
			$output .=  "Country: " .  $row['country'] . "<br />";
			$output .=  "Wine Maker/Vineyard: " . $row['wine_maker_or_vineyard'] . "<br />";
			$output .=  "Supplier: " .  $row['supplier'] . "<br />";
			$output .=  "Price: $" .  $row['price'] . "<br />";
			$output .=  "Upper Life Expectancy: " . $row['upper_life_expectancy'] . "<br />";
			$output .=  "Lower Life Expectancy: " . $row['lower_life_expectancy'] . "<br />";
			$output .=  "Color: " .  $row['color'] . "<br />";
			$output .=  "Grape Type: " . $row['grape_type'] . "<br />";
			$output .=  "Percent Alcohol: " . $row['percent_alcohol'] . "<br />";
			$output .=  "Wine Notes: " .  $row['wine_notes'] . "<br />";
			$numResults++;
		}
		$_SESSION['results'] = $output;
		$_SESSION['search'] = $search;
		echo "The search '".$q."' returned '".$numResults."' results";
	} else if($filter == "all"){
		while($row = mysql_fetch_array($results)) {
			$output .=  "Name: " . $row['name'] . "<br />";
			$output .=  "Vintage: " . $row['vintage'] . "<br />";
			$output .=  "Region: " . $row['region'] . "<br />";
			$output .=  "Country: " .  $row['country'] . "<br />";
			$output .=  "Wine Maker/Vineyard: " . $row['wine_maker_or_vineyard'] . "<br />";
			$output .=  "Supplier: " .  $row['supplier'] . "<br />";
			$output .=  "Price: $" .  $row['price'] . "<br />";
			$output .=  "Upper Life Expectancy: " . $row['upper_life_expectancy'] . "<br />";
			$output .=  "Lower Life Expectancy: " . $row['lower_life_expectancy'] . "<br />";
			$output .=  "Color: " .  $row['color'] . "<br />";
			$output .=  "Grape Type: " . $row['grape_type'] . "<br />";
			$output .=  "Percent Alcohol: " . $row['percent_alcohol'] . "<br />";
			$output .=  "Wine Notes: " .  $row['wine_notes'] . "<br />";
			$output .=  "is open: " .  $row['is_open'] . "<br />";
			$output .=  "locId: " .  $row['location_id'] . "<br />";
			$output .=  "wine Id: " .  $row['wine_id'] . "<br />";
			$output .=  "Room: " . $row['room'] . "<br />";
			$output .=  "Container #: " . $row['container_number'] . "<br />";
			$output .=  "Loc Notes: " . $row['loc_notes'] . "<br />";
			$numResults++;
		}
		$_SESSION['results'] = $output;
		$_SESSION['search'] = $search;
		echo "The search '".$q."' returned '".$numResults."' results";
		Header('Location: Project/wine_db_home.php');
	} else if($filter == "bottles"){
		while($row = mysql_fetch_array($results)) {
			$output .=  "Name: " . $row['name'] . "<br />";
			$output .=  "Vintage: " . $row['vintage'] . "<br />";
			$output .=  "Region: " . $row['region'] . "<br />";
			$output .=  "Country: " .  $row['country'] . "<br />";
			$output .=  "Wine Maker/Vineyard: " . $row['wine_maker_or_vineyard'] . "<br />";
			$output .=  "Supplier: " .  $row['supplier'] . "<br />";
			$output .=  "Price: $" .  $row['price'] . "<br />";
			$output .=  "Upper Life Expectancy: " . $row['upper_life_expectancy'] . "<br />";
			$output .=  "Lower Life Expectancy: " . $row['lower_life_expectancy'] . "<br />";
			$output .=  "Color: " .  $row['color'] . "<br />";
			$output .=  "Grape Type: " . $row['grape_type'] . "<br />";
			$output .=  "Percent Alcohol: " . $row['percent_alcohol'] . "<br />";
			$output .=  "Wine Notes: " .  $row['wine_notes'] . "<br />";
			$output .=  "is open: " .  $row['is_open'] . "<br />";
			$output .=  "locId: " .  $row['location_id'] . "<br />";
			$output .=  "wine Id: " .  $row['wine_id'] . "<br />";
			$output .=  "Loc Notes: " .  $row['loc_notes'] . "<br />";
			$numResults++;
		}
		$_SESSION['results'] = $output;
		$_SESSION['search'] = $search;
		echo "The search '".$q."' returned '".$numResults."' results";
		Header('Location: Project/wine_db_home.php');
	} else if($filter == "locations"){
		while($row = mysql_fetch_array($results)) {
			$output .=  "Room: " . $row['room'] . "<br />";
			$output .=  "Container #: " . $row['container_number'] . "<br />";
			$output .=  "Loc Notes: " . $row['loc_notes'] . "<br />";
			$numResults++;
		}
		$_SESSION['results'] = $output;
		$_SESSION['search'] = $search;
		echo "The search '".$q."' returned '".$numResults."' results";
		Header('Location: Project/wine_db_home.php');
	}
	else
		echo "filter was ".$filter;
}
else
	echo "There was no matching record for the search query '" . $q . "'";
	

$_SESSION['results'] = $output;
$_SESSION['search'] = $search;
Header('Location: Project/wine_db_home.php');
exit;*/
?>