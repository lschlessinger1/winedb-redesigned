<?php
require_once('../../get_db.php');
	$id = mysql_real_escape_string(htmlentities(trim($_GET['id'])));
	$bottle = mysql_fetch_array(mysql_query('SELECT * FROM bottles WHERE id = '.$id));
	$wines = mysql_query('SELECT * FROM wines');
	$locations = mysql_query('SELECT * FROM locations ORDER BY room') or die("Could not perform query... ".mysql_error());
	function getLocation($loc_id){
	$all_locations = mysql_query('SELECT * FROM locations');
	$location = "";
	while($row = mysql_fetch_array($all_locations)){
		if($row['id'] == $loc_id){
			$location .= $row['room'];
			if($row['container_number'] !== '0'){
				$location .= " ";
				$location .=$row['container_number'];
			}
		}
	}
	return $location; //room and (container number)
}
?>
<html>
	<head>
		<title>Edit Bottle</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Edit Bottle" />
		<link type="text/css" rel="stylesheet" href="bottles_style.css"/> 		
		<script type="text/javascript" src="../javascript/jquery.js"></script>
		<script type="text/javascript" src="../javascript/init.js"></script>
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
		<script src="../javascript/zebra_rows.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../javascript/form_validation.js"></script>
		<script type="text/javascript" src="../javascript/effects.js"></script>
	</head>
	<body>
		<?php 
			include('bottles_show-edit_header.php');
		?>
			<div id="editBottleDiv">
				<fieldset id="editBottleFieldset">			
					<legend class="clickableLegend">Edit Bottle</legend>
					<?php echo '<form id="editBottleForm" action="bottles_update.php?id='.$bottle['id'].'" method="POST" class="blindableForm" name="edit_bottle_form" onsubmit="checkForm(3)">' ?>
						<p class="fieldReq">All fields must be completed, except those marked "Optional".</p>
						<p class="newBottleInputPar"><label class="bottleLabel" for="is_open">Is Open?: </label>
							<?php if($bottle['is_open'] == 0){
								echo 'closed';
							} else if ($bottle['is_open'] == 1){
								echo 'open';
							}?>
							<input type="radio" id="is_open" name="is_open" value="<?php 
							if($bottle['is_open'] == 0){
								echo 'closed';
							} else if ($bottle['is_open'] == 1){
								echo 'open';
							}
							?>" checked="checked"/>
							<?php if($bottle['is_open'] == 0){
								echo 'open';
							} else if ($bottle['is_open'] == 1){
								echo 'closed';
							}?>
							<input type="radio" id="is_open" name="is_open" value="<?php 
							if($bottle['is_open'] == 0){
								echo 'open';
							} else if ($bottle['is_open'] == 1){
								echo 'closed';
							}?>"/>
						</p>
						<p class="newBottleInputPar"><label class="bottleLabel" for="wine_search">Wine: </label>
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
						<p class="newBottleInputPar"><label class="bottleLabel" for="location">Location: </label>
							<select id="wineLocation" type="text" name="updated_location_id"> 
							<?php
							while($row = mysql_fetch_array($locations)){
								if($row['id'] == $bottle['location_id']){
									print("<option value=".$row["id"]." selected>".getLocation($row['id'])."</option>");
								} else {
									print("<option value=".$row["id"].">".getLocation($row['id'])."</option>");
								}
							}
							?>
							</select>
						</p>
						<p class="newBottleInputPar"><label class="bottleLabel" for="bottle_comments">Comments: </label>
						<textarea id="bottleComments" type="text" class="newBottleInput" name="updated_bottle_comments" placeholder="Optional" rows="4"><?php echo $bottle['bottle_comments']; ?></textarea>
						</p>
					<p id="bottleSubmit"><input id="submit" value="Update" type="submit"/></p>
					</form>
				</fieldset>
			</div>
		<?php include('../../footer.php'); ?>
	</body>
</html>
<?php mysql_close($connection); ?>