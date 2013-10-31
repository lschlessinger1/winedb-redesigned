jQuery(document).ready(function ($) {
	function runEffect() {
	  var selectedEffect = "blind";
	  var options = {};
	  if ( selectedEffect === "scale" ) {
		options = { percent: 0 };
	  } else if ( selectedEffect === "size" ) {
		options = { to: { width: 200, height: 60 } };
	  }
	  // run the effect
	  $( ".blindableForm" ).toggle( selectedEffect, options, 500 ); // make this more specific
	};
	
	// set effect from select menu value
	$( ".clickableLegend" ).click(function() { // make this more specific
		console.log("clickableLegend has been clicked.");
		runEffect();
		return false;
	});
});
	