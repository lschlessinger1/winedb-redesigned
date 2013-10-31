<?php
require_once('../../get_db.php');
$id = mysql_real_escape_string(htmlentities(trim($_GET['id'])));
$delete_order = 'DELETE FROM orders WHERE id = '.$id;
mysql_query($delete_order) or die("Deletion error ".mysql_error()); // deletes that order
header("Location:orders_index.php");
exit;
?>