<?php
require_once('../../get_db.php');
	$id = mysql_real_escape_string(htmlentities(trim($_GET['id'])));
	$location = mysql_fetch_array(mysql_query('SELECT * FROM locations WHERE id = '.$id));
?>
<html>
	<head>
		<title>Edit Location</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="Edit Location" />
		<link type="text/css" rel="stylesheet" href="locations_style.css"/> 		
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
	<?php include('locations_show-edit_header.php'); ?>
	<fieldset>			
		<legend class="clickableLegend">Edit Location</legend>
			<form id="editLocationForm" method="POST" action="locations_update.php?id=<?php echo$location['id']; ?>" class="blindableForm" name="new_location_form" onsubmit="checkForm(4)">
			<p class="fieldReq">Fields that must be completed are marked with a red asterisk (<span class="mandatory">*</span>).</p>
					<p class="newLocationInputPar"><span class="mandatory">* </span><label class="locationLabel" for="updated_room">Room: </label><input id="room" type="text" class="newLocationInput" name="updated_room" value="<?php echo $location['room']; ?>" title="The name of the room" required/></p> 
					
					<p class="newLocationInputPar"><label class="locationLabel" for="updated_container_number">Container Number: </label><input id="containerNumber" type="text" class="newLocationInput" name="updated_container_number" value="<?php if($location['container_number'] !== '0') {echo $location['container_number'];} ?>" title="Which container number would you like?"/></p> 
					
					<p class="newLocationInputPar"><label class="locationLabel" for="updated_location_comments">Comments: </label><textarea id="locationComments" type="text" class="newLocationInput" name="updated_location_comments" rows="4"><?php echo $location['location_comments']; ?></textarea></p>
			
					<p id="locationSubmit"><input id="submit" value="Update!" type="submit"/></p>
			</form>
	</fieldset>
		<?php include('../../footer.php'); ?>
	</body>
</html>
<?php mysql_close($connection); ?>