<?php
	$server = "localhost";
	$db_username = "lou_schlessinger";
	$db_password = "admin000";
	$connection = mysql_connect($server, $db_username, $db_password) or die(mysql_error());
	$db = mysql_select_db("lou_wine_db", $connection) or die(mysql_error());
?>