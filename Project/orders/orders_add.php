<?php
require_once('../../get_db.php');
$order_id = substr_replace(mysql_real_escape_string(htmlentities(trim($_GET['id']), "",-4)));
$locations= mysql_real_escape_string(htmlentities(trim($_GET['locations'])));
$order = mysql_query('SELECT * FROM orders WHERE id = '.$order_id)or die("Could not perform query... ".mysql_error());
$any_bad_values = false;
$locations = explode(",", $locations);
array_pop($locations);
$tmp = array();
$total = (int) 0; //total is the quantity of user input
$bottles_before_query = mysql_query("select count(1) FROM bottles");
$rows_before = mysql_fetch_array($bottles_before_query);
$total_before = $rows_before[0];
while($row = mysql_fetch_array($order)){
	$wine_id = $row['wine_id'];
	$order_qty = $row['quantity'];
}
foreach($locations as $location){
	array_push($tmp, explode(' ',$location));
}
foreach($tmp as $locs){
	$i = 0;
	foreach($locs as $vals){
		$vals = intval(substr($vals,strpos($vals, '=')+1)); //remove everything before the =, just left with value
		if(check_not_empty($vals)){	
			$any_bad_values = true;
		}
		if($i%2==1 && $any_bad_values == false){ //then it is a qty val
			$total = $total +(int) intval($vals);	
		}
		$i++;
	}
}

/**FORMAT OF $tmp
	let x be any number between 0 and $tmp.count() - 1
	$tmp[x] = some location
	$tmp[x][0] = location_id
	$tmp[x][1] = quantity
**/

if($any_bad_values == false && $total == $order_qty){
	insertBottles($tmp, $order_qty, $wine_id);
	//check that bottles were inserted before deleting
	$bottles_after_query = mysql_query("select count(1) FROM bottles");
	$rows_after = mysql_fetch_array($bottles_after_query);
	$total_after = $rows_after[0];
	if($total_before == $total_after - $total){ //if bottles query was successful
		deleteOrder($order_id);
		echo 'success';
	}
} else {
	echo 'failure';
}
function insertBottles($locations, $order_qty, $wine_id){ 
	$is_open = 0; //default is closed
	foreach($locations as $location){
		$location_id = intval(substr($location[0],strpos($location[0], '=')+1));
		$quantity = intval(substr($location[1],strpos($location[1], '=')+1));
		for($i=1; $i<=$quantity; $i++) {
			mysql_query("INSERT INTO bottles (is_open, wine_id, location_id) VALUES ('".$is_open."', '".$wine_id."', '".$location_id."')") or die ("Could not perform query... ".mysql_error());
		}
	}
}
function check_not_empty($val){
	if($val == 'null' || $val == ''){
		return true;
	}
}
function deleteOrder($order_id){
	$delete_order = 'DELETE FROM orders WHERE id = '.$order_id;
	mysql_query($delete_order) or die("Deletion error ".mysql_error());
}
mysql_close($connection);
exit; 
?>