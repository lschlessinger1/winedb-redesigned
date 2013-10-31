<div id="header">
	<p id="title">Wine Database</p>	
	<div id="navBar">
		<ul class="topnav" id="navButtonList"> 
			<li class="headlink">
				<a href="../wine_db_home.php" class="navBarButton">Home</a> 	
			</li>
			<li class="headlink">
				<a href="../wines/wines_index.php" class="navBarButton">Wines</a>
			</li>	
			<li class="headlink">
				<a href="../locations/locations_index.php" class="navBarButton">Locations</a>	
			</li> 	
			<li class="headlink">
				<a href="../orders/orders_index.php" class="navBarButton">Orders</a>	
			</li> 	
		</ul>
	</div>
		<div id="searchDiv">
			<?php include('search/bottles_search_form.php'); ?>
		</div>
		<div id="bottleLinkDiv">
			<?php
			switch ($page) {
				case 'home':
					$rows = mysql_result(mysql_query('SELECT COUNT(*) FROM wines'), 0); 
					if (!$rows) {  
					print ('<a href="bottles_index.php?page=newWine" class="bottleAnchor">Create Bottles and New Wine</a> ');
					} else {
					print ('<a href="bottles_index.php?page=newWine" class="bottleAnchor">Create Bottles and New Wine</a> ');
					print ('<a href="bottles_index.php?page=updateQuantity" class="bottleAnchor">Add More Bottles</a>');
					}
					break;
				case 'newWine':
					$rows = mysql_result(mysql_query('SELECT COUNT(*) FROM wines'), 0); 
					if (!$rows) {  
					print ('<a href="bottles_index.php?page=home" class="bottleAnchor">Back to Bottles Index</a>');
					} else {
					print ('<a href="bottles_index.php?page=newWine" class="bottleAnchor">Create Bottles and New Wine</a> ');
					print ('<a href="bottles_index.php?page=updateQuantity" class="bottleAnchor">Add More Bottles</a>');
					}
					break;
				case 'updateQuantity':
					print ('<a href="bottles_index.php?page=home" class="bottleAnchor">Back to Bottles Index</a>');
					print ('<a href="bottles_index.php?page=newWine" class="bottleAnchor">Create Bottles and New Wine</a> ');
					break;
				default:
				break;
			}
			?>
		</div>
</div>


