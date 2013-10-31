<!DOCTYPE html>
<script type="text/javascript">
	function updateFilter() {
		var x = document.getElementById("filter").value;
		document.getElementById('filterSpan').innerHTML = x;
	}
</script>

<form action="" method="POST" id="homeSearchForm">
	<label id="searchLabel">Search <span id="filterSpan"></span></label>
		<input type="text" name="keyword" id="searchInput" maxlength="133"/> <!--make autocomplete for this-->
	<input type="submit" value="" id="submit" class="imgClass"/>
	<label for="filter" id="filterLabel" class="searchFilterLabel">Filter</label>
		<select id="filter" type="text" name="filter" onchange="updateFilter();"> 
			<option value="all">All</option>
			<option value="wines">Wines</option>
			<option value="bottles">Bottles</option>
			<option value="locations">Locations</option>
		</select>
	<label for="results" id="resultsLabel" class="searchFilterLabel" id="resultsLabel">Results </label>
		<select id="results" type="text" name="results"> 
			<option value="10">10</option>
			<option value="20">20</option>
			<option value="50">50</option>
		</select>
</form>
