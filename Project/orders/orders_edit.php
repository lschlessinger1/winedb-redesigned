<?php
require_once('../../get_db.php');
$id = mysql_real_escape_string(htmlentities(trim($_GET['id'])));
$order = mysql_fetch_array(mysql_query('SELECT * FROM orders WHERE id = '.$id)) or die("Could not perform query... ".mysql_error());
$wines = mysql_query('SELECT * FROM wines') or die("Could not perform query... ".mysql_error());
$locations = mysql_query('SELECT * FROM locations') or die("Could not perform query... ".mysql_error());
function getWine($wine_id){ //$wine_id is foreign key from orders table
$wines = mysql_query('SELECT * FROM wines WHERE id = '.$wine_id) or die("Could not perform query... ".mysql_error());
	$wine = "";
	while($row = mysql_fetch_array($wines)){
		$wine .= $row['grape_varietal'];
		$wine .= ' ';
		$wine .= $row['region'];
		$wine .= ' ';
		$wine .= $row['wine_maker_or_vineyard'];
	}
	return $wine; //wine name
}
?>
<html>
	<head>
		<title>Edit Order</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Edit Order" />
		<link type="text/css" rel="stylesheet" href="orders_style.css"/> 		
				<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
		<script type="text/javascript" src="../javascript/jquery.js"></script>
		<script type="text/javascript" src="../javascript/init.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script src="../javascript/zebra_rows.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script type="text/javascript" src="../javascript/form_validation.js"></script>
		<script type="text/javascript" src="../javascript/effects.js"></script>
	</head>

	<body>
		<?php 
		include('orders_show-edit_header.php');?>
		<fieldset>			
		<legend class="clickableLegend">Edit Order</legend>
			<form id="editOrderForm" method="POST" action="orders_update.php?id=<?php echo $order['id']; ?>" onsubmit="checkForm(5)" name="edit_order_form" class="blindableForm">
				<p class="fieldReq">Fields that must be completed are marked with a red asterisk (<span class="mandatory">*</span>).</p>
				<p class="newOrderInputPar"><span class="mandatory">* </span><label class="orderLabel" for="order_search">Wine: </label>
					<select id="wineId" type="text" name="updated_wine_id"> 
					<?php while($row = mysql_fetch_array($wines)){
								if($row['id'] == $bottle['wine_id']){
									print("<option value=".$row["id"]." selected>".$row['color']." ".$row["vintage"]." ".$row['grape_varietal']." ".$row['wine_maker_or_vineyard']."</option>");
								} else {
									print("<option value=".$row["id"].">".$row['color']." ".$row["vintage"]." ".$row['grape_varietal']." ".$row['wine_maker_or_vineyard']."</option>");
								} 
							}
					?>
					</select>
				</p>
				
				<p class="newOrderInputPar"><label class="orderLabel" for="estimatedArrival">Estimated Arrival: </label><input id="orderEstimatedArrival" type="text" class="newOrderInput" name="updated_estimated_arrival" value="<?php if($order['estimated_arrival'] !== '0000-00-00'){ echo $order['estimated_arrival'];} ?>" /></p> 
				
				<p class="newOrderInputPar"><span class="mandatory">* </span><label class="orderLabel" for="quantity">Quantity: </label><input id="quantity" type="text" class="newOrderInput" name="updated_quantity" value="<?php echo $order['quantity']; ?>" min="1" required/></p>
				
				<p class="newOrderInputPar"><label class="orderLabel" for="order_comments">Comments: </label><textarea id="orderComments" type="text" class="newOrderInput" name="updated_order_comments" rows="4"><?php echo $order['order_comments']; ?></textarea></p>

				<p id="orderSubmit"><input id="submit" value="Update!" type="submit"/></p>
			</form>
		</fieldset>
		<?php include('../../footer.php'); ?>
	</body>
</html>
<?php mysql_close($connection); ?>