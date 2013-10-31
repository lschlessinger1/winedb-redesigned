<?php
	require_once('../../get_db.php');
	if (isset($_POST['arr']) == true && empty($_POST['arr']) == false ){
		$str = $_POST['arr'];
		$arr = explode('&amp', htmlentities($str));
		$arr0 = explode('=', $arr[0]);
		$keyword = $arr0[1];

		$arr1 = explode('=', $arr[1]);
		$table = $arr1[1];
		
		$arr2 = explode('=', $arr[2]);
		$field = $arr2[1];
	
		$query = mysql_query("SELECT * FROM $table WHERE $field LIKE '%$keyword%' LIMIT 5") or die(mysql_error());
		if(!empty($keyword) && ($keyword !== '' || trim($keyword) !== '')){
			while(($row = mysql_fetch_array($query))){
				echo '<li>', $row[$field], '</li>';
			}
		}
	}
		// if the 'term' variable is not sent with the request, exit
	//echo $_POST['arr'];
	/*if ( !isset($_REQUEST['term']) )
	exit;*/

	/*$q = trim(strtolower($_GET["term"]));
    $return = array();*/
    /*/$query = mysql_query("SELECT * FROM wines WHERE name LIKE '%$q%' AND ") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
    	array_push($return,array('label'=>$row['name'],'value'=>$row['name'])); // how should i do this?
	}
	echo(json_encode($return));
	//What happens if there is more than one wine with the same name, but different column value? for example, same name w/ diff. year.
	// need to add more info than just name, maybe the id, but don't display it.
	// i need to get the id of the wine, and show more info if varietal, region and vintage are the same*/
?>