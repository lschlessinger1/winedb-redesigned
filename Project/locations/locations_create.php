<?php
require_once('../../get_db.php');
$name = mysql_real_escape_string(htmlentities(trim($_POST['new_name'])));
$address_line_1 = mysql_real_escape_string(htmlentities(trim($_POST['new_address_line_1'])));
$address_line_2 = mysql_real_escape_string(htmlentities(trim($_POST['new_address_line_2'])));
$city = mysql_real_escape_string(htmlentities(trim($_POST['new_city'])));
$state_province_region = mysql_real_escape_string(htmlentities(trim($_POST['new_state_province_region'])));
$postal_code = mysql_real_escape_string(htmlentities(trim($_POST['new_postal_code'])));
$country = mysql_real_escape_string(htmlentities(trim($_POST['new_country'])));
$room = mysql_real_escape_string(htmlentities(trim($_POST['new_room'])));
$container_number = mysql_real_escape_string(htmlentities(trim($_POST['new_container_number'])));
$location_comments = mysql_real_escape_string(htmlentities(trim($_POST['new_location_comments'])));

$address = $address_line_1.' '.$address_line_2.', '.$city.', '.$state_province_region.' '.$postal_code. ' '.$country;
$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($address)."&sensor=false";
$get = file_get_contents($url);
$lat = json_decode($get)->results[0]->geometry->location->lat;
$lon = json_decode($get)->results[0]->geometry->location->lng;

mysql_query("INSERT INTO locations (name, address_line_1, address_line_2, city, state_province_region, postal_code, country, lat, lon, room, container_number, location_comments)
 VALUES ('".$name."', '".$address_line_1."', '".$address_line_2."', '".$city."',
 '".$state_province_region."', '".$postal_code."', '".$country."', '".$lat."', '".$lon."', '".$room."', '".$container_number."', '".$location_comments."')") or die ("Could not perform query... ".mysql_error());
mysql_close($connection);
header("Location:locations_index.php");
exit;
?>