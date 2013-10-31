<?php
require_once('../../get_db.php');
$wine_id = mysql_real_escape_string(htmlentities(trim($_POST['get_wine_id'])));
$estimated_arrival = mysql_real_escape_string(htmlentities(trim($_POST['new_estimated_arrival'])));
$quantity = mysql_real_escape_string(htmlentities(trim($_POST['new_quantity'])));
$order_comments = mysql_real_escape_string(htmlentities(trim($_POST['new_order_comments'])));
mysql_query("INSERT INTO orders (wine_id, estimated_arrival, quantity, order_comments) VALUES ('".$wine_id."', '".$estimated_arrival."', '".$quantity."', '".$order_comments."')") or die ("Could not perform query... ".mysql_error());
mysql_close($connection);
header("Location:orders_index.php");
exit;
?>