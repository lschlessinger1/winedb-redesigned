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
		<?php include ('search/bottles_search_form.php'); ?>
	</div>
	<div id="bottleLinkDiv">
		<a href="bottles_index.php?page=home" class="bottleAnchor">Bottle Index</a>
		<a href="bottles_index.php?page=newWine" class="bottleAnchor">Create New Wine and Bottle(s)</a>
		<a href="bottles_index.php?page=updateQuantity" class="bottleAnchor">Update Quanity</a>
	</div>
</div>




