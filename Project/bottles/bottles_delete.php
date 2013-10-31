<?php
require_once('../../get_db.php');
$id = mysql_real_escape_string(htmlentities(trim($_GET['id'])));

$delete_bottle = 'DELETE FROM bottles WHERE id = '.$id;
mysql_query($delete_bottle) or die("Deletion error ".mysql_error()); 

mysql_close($connection);
header("Location:bottles_index.php?page=home");
exit;
?>