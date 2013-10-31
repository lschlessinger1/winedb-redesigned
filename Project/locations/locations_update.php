<?php
require_once('../../get_db.php');
$name = mysql_real_escape_string(htmlentities(trim($_POST['updated_name'])));
$address_line_1 = mysql_real_escape_string(htmlentities(trim($_POST['updated_address_line_1'])));
$address_line_2 = mysql_real_escape_string(htmlentities(trim($_POST['updated_address_line_2'])));
$city = mysql_real_escape_string(htmlentities(trim($_POST['updated_city'])));
$state_province_region = mysql_real_escape_string(htmlentities(trim(($_POST['updated_state_province_region']))));
$postal_code = mysql_real_escape_string(htmlentities(trim($_POST['updated_postal_code'])));
$country = mysql_real_escape_string(htmlentities(trim($_POST['updated_country'])));
$room = mysql_real_escape_string(htmlentities(trim($_POST['updated_room'])));
$container_number = mysql_real_escape_string(htmlentities(trim($_POST['updated_container_number'])));
$location_comments = mysql_real_escape_string(htmlentities(trim($_POST['updated_location_comments'])));
$id = mysql_real_escape_string(htmlentities(trim($_GET['id'])));

$address = $address_line_1.' '.$address_line_2.', '.$city.', '.$state_province_region.' '.$postal_code. ' '.$country;
$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($address)."&sensor=false";
$get = file_get_contents($url);
$lat = json_decode($get)->results[0]->geometry->location->lat;
$lon = json_decode($get)->results[0]->geometry->location->lng;

mysql_query('UPDATE locations SET name="'.$name.'", address_line_1="'.$address_line_1.'", address_line_2="'.$address_line_2.'", city="'.$city.'",
 state_province_region="'.$state_province_region.'", postal_code="'.$postal_code.'",
 country="'.$country.'", room="'.$room.'", lat="'.$lat.'", lon="'.$lon.'", container_number="'.$container_number.'",
 location_comments="'.$location_comments.'"WHERE id = '.$id) or die("Could not perform query... ".mysql_error());

mysql_close($connection);
header('Location: locations_index.php');
exit;
?>