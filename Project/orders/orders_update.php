<?php
require_once('../../get_db.php');
$wine_id = mysql_real_escape_string(htmlentities(trim($_POST['updated_wine_id'])));
$estimated_arrival = mysql_real_escape_string(htmlentities(trim($_POST['updated_estimated_arrival'])));
$quantity = mysql_real_escape_string(htmlentities(trim($_POST['updated_quantity'])));
$order_comments = mysql_real_escape_string(htmlentities(trim($_POST['updated_order_comments'])));
$id = mysql_real_escape_string(htmlentities(trim($_GET['id'])));

mysql_query('UPDATE orders SET wine_id="'.$wine_id.'", estimated_arrival="'.$estimated_arrival.'", quantity="'.$quantity.'", order_comments="'.$order_comments.'"WHERE id = '.$id) or die("Could not perform query... ".mysql_error());

mysql_close($connection);
header('Location: orders_index.php');
exit;
?>