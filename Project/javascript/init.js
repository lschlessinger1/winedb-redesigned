$(document).ready(function() {
	$('#header').fadeIn('fast');
	var currentTime = new Date()
	var year = currentTime.getFullYear()
	document.getElementById('year').innerHTML = year;
	
	$("#vintage").append("<option value='default'>Select</option>")
	for(var optionYear = 1970; optionYear<=year; optionYear++) // 1970 was arbitrary
		$("#vintage").append("<option value='"+optionYear+"'>"+optionYear+"</option>")
	
	var initialEditVintage = $("#edit_year").attr("initialVintage");
	for(var optionYear = 1970; optionYear<=year; optionYear++){ // 1970 was arbitrary
		if(optionYear == initialEditVintage){
			$("#edit_year").append("<option value='"+initialEditVintage+"' selected>"+initialEditVintage+"</option>")
		} else {
			$("#edit_year").append("<option value='"+optionYear+"'>"+optionYear+"</option>")
		}
	}

	var initialEditCountry = $("#edit_country").attr("initialCountry");
	if (typeof initialEditCountry == "String"){
		initialEditCountry = initialEditCountry.replace('_', ' ');
	}
	$("#edit_country option[value='default']").each(function() {
		$(this).remove();
	});
	$("#edit_country").val(initialEditCountry);
	
	$("#wineLowerLifeExpectancy").append("<option value='default'>Select</option>")
	for(var optionYear = year; optionYear<=year+50; optionYear++) // 50 was arbitrary
		$("#wineLowerLifeExpectancy").append("<option value='"+optionYear+"'>"+optionYear+"</option>");
		
	var initialEditLowerLifeExpectancy = $("#edit_wine_lower_life_expectancy").attr("initialLowerLifeExpectancy");
	$("#edit_wine_lower_life_expectancy").append("<option value=''>Select</option>")
	/*$("#edit_wine_lower_life_expectancy option[value='default']").each(function() {
		$(this).remove();
	});*/
	for(var optionYear = year; optionYear<=year+50; optionYear++){ // 1970 was arbitrary
		if(optionYear == initialEditLowerLifeExpectancy){
			$("#edit_wine_lower_life_expectancy").append("<option value='"+initialEditLowerLifeExpectancy+"' selected>"+initialEditLowerLifeExpectancy+"</option>")
		} else {
			$("#edit_wine_lower_life_expectancy").append("<option value='"+optionYear+"'>"+optionYear+"</option>")
		}
	}
	
	$("#wineUpperLifeExpectancy").append("<option value=''>Select</option>")
	for(var optionYear = year; optionYear<=year+50; optionYear++) // 50 was arbitrary
		$("#wineUpperLifeExpectancy").append("<option value='"+optionYear+"'>"+optionYear+"</option>")
		
	var initialEditUpperLifeExpectancy = $("#edit_wine_upper_life_expectancy").attr("initialUpperLifeExpectancy");
	var initialEditUpperLifeExpectancy = $("#edit_wine_upper_life_expectancy").append("<option value='default'>Select</option>")
	/*$("#edit_wine_upper_life_expectancy option[value='default']").each(function() {
		$(this).remove();
	});*/
	for(var optionYear = year; optionYear<=year+50; optionYear++){ // 1970 was arbitrary
		if(optionYear == initialEditUpperLifeExpectancy){
			$("#edit_wine_upper_life_expectancy").append("<option value='"+initialEditUpperLifeExpectancy+"' selected>"+initialEditUpperLifeExpectancy+"</option>")
		} else {
			$("#edit_wine_upper_life_expectancy").append("<option value='"+optionYear+"'>"+optionYear+"</option>")
		}
	}
	
	var intialEditColor = $("#edit_color").attr("initialColor");
	$("#edit_color option[value='default']").each(function() {
		$(this).remove();
	});
	$("#edit_color").val(intialEditColor);
		

	$(':text').focusin(function() {
		$(this).css('background-color', '#EDEDED');
	});
	$(':text').blur(function() {
		$(this).css('background-color', 'white');
	});
	/*$('.showDropDown').hover(function() {
		$('#headermenudropdown').show();
	});
	$('.showDropDown').hover(function() {
		
		$('#winesheadermenudropdown').show();
		$('#winesheadermenudropdown a').css('display','block');
		$('#winesheadermenudropdown a').css('position','relative');
		var a = $('#winesheadermenudropdown').offset();
		var b = $('.showDropDown').offset();
		var dif = b.left - a.left;
		$('#winesheadermenudropdown a').css('left',dif+'px');
		$('#winesheadermenudropdown a').css('width','auto');
		
		$('#winesheadermenudropdown a').hover(function() {
		
		});
		$('#winesheadermenudropdown').mouseleave(function() {
			$('#winesheadermenudropdown').hide();
		});
	});*/
	
	/** BEGIN jquery ui **/
	
	var ordersLocDialog = $( "#ordersChooseLocation" );
	var wineQty;
	var numLocations = 0;
	$(function() {
		$( document ).tooltip(); // jqueryui tooltip
	});
	$(function() {
		$("#estimatedArrival").datepicker({ // new order
			showAnim: "slide",
			dateFormat: "yy-mm-dd",
			constrainInput: true,
			changeYear: true,
			changeMonth: true,
			minDate: new Date(year,1,1)
		}); 
	});
	$(function() {
		$("#orderEstimatedArrival").datepicker({ //edit Order
			showAnim: "slide",
			dateFormat: "yy-mm-dd",
			constrainInput: true,
			changeYear: true,
			changeMonth: true,
			minDate: new Date(year,0,0)
		}); 
	});
	
	$( ".addButton" ).click(function(event) {
		event.preventDefault();
		var href = $(this).attr("href");
		var row = $(this).parent().parent();
		wineQty = row.find(".quantity").text();
		ordersLocDialog.dialog("option", "href", href, "wineQty", wineQty);
		$('#numBottlesLeft').text(wineQty);
		if(parseInt($('#numBottlesLeft').html()) > 1){
			$('#pluralBottlesLeft').text('s');
		}
		ordersLocDialog.dialog("open");
      });
	$(ordersLocDialog).on( "dialogopen", function( event, ui ) {
		$(ordersLocDialog).dialog( "option", "title", "Add Wine to Inventory" );
		var a = $(".orderLocationsFieldSet").children().first();
		$('#selectableLocationsList li').each(function() {
			$(this).css('display', 'list-item');
		});
		numLocations = 0;
	});
	$( ordersLocDialog ).on( "dialogclose", function( event, ui ) {
		$("#chosenLocationsList").empty();
		$( "#selectableLocationsList li.ui-selected" ).each(function() {
			$(this).removeClass('ui-selected')
			$(this).show();
		});
		$('#numBottlesLeft').empty();
		numLocations = 0;
	});
	ordersLocDialog.dialog({
      autoOpen: false,
      height: 550,
      width: 550,
      modal: true,
      buttons: {
        "Add Bottles": function() {
		  var href = $(this).dialog("option", "href");
		  href += ".php";
		  wineQty = $(this).dialog("option", "wineQty");
		  var $form = $(this).find('#ordersLocationForm'); 
		  var $inputs = $form.find("#chosenLocationsList li"); //select and cache all the fields
		  var location_ids = '';
		  var spinnerQty = $( ".spinnerQty" ).spinner();
		  $('#chosenLocationsList li').each(function() {
			location_ids += "location_id="+$(this).val()+ " qty="+$(this).find( ".spinnerQty").spinner("value")+",";
		  });
		  $.ajax({
		  type: 'GET',
		  url: href,
		  data: { locations: location_ids },
		  success: function(result){
			console.log("Response: "+result);
			if(result == 'success'){
				//remove deleted order
				var href = ordersLocDialog.dialog("option", "href");
				var id = '';
				for(i=0; i<href.length-1; i++){
					if(href[i] == "i" && href[i+1] == "d" && href[i+2] == "="){
						id = href.substring(i+3);
					}
				}
				var c = 0;
				var allRows = $('#resultTable').find('.removableRow');
					$('#resultTable').find('tr').each(function(){
						var a = $(this).children().find('.addButton').attr('href');
						if(c !== 0){
							for(i=0; i<a.length-1; i++){
								if(a[i] == "i" && a[i+1] == "d" && a[i+2] == "="){
									a = a.substring(i+3);
								}
							}
							if(a == id){
								$(this).fadeOut();				
								$('<div class="success">Your order has been successfully processed!</div>').insertBefore('#resultTable');
								$('.success').css('background', '#B4CDCD');
								$('.success').css('color', '#FFFFFF');
								$('.success').css('text-align', 'center');
								setTimeout( function(){
									$('.success').css('color', '#000000');
									setTimeout( function(){
										$('.success').fadeOut();
									}, 7000); //after 10 seconds
								}, 3000);
							}
						}
						c++; // :)
					});
			} else if(result == 'failure'){
				//tell user query was unsuccessful
				var href = ordersLocDialog.dialog("option", "href");
				var id = '';
				for(i=0; i<href.length-1; i++){
					if(href[i] == "i" && href[i+1] == "d" && href[i+2] == "="){
						id = href.substring(i+3);
					}
				}
				var c = 0;
				var allRows = $('#resultTable').find('.removableRow');
					$('#resultTable').find('tr').each(function(){
						var a = $(this).children().find('.addButton').attr('href');
						if(c !== 0){
							for(i=0; i<a.length-1; i++){
								if(a[i] == "i" && a[i+1] == "d" && a[i+2] == "="){
									a = a.substring(i+3);
								}
							}
							if(a == id){
								$(this).effect('pulsate', 'slow');
								$('<div class="error">Sorry, There was an error when adding your order.</div>').insertBefore('#resultTable');
								$('.error').css('background', '#CD2626');
								$('.error').css('color', '#FFFFFF');
								$('.error').css('text-align', 'center');
								setTimeout( function(){
									$('.error').css('color', '#C0C0C0');
									setTimeout( function(){
										$('.error').fadeOut();
									}, 7000); //after 10 seconds
								}, 3000);
							}
						}
						c++; // :)
					});
			} else {
				//unsuccessful
				//tell user query was unsuccessful
				var href = ordersLocDialog.dialog("option", "href");
				var id = '';
				for(i=0; i<href.length-1; i++){
					if(href[i] == "i" && href[i+1] == "d" && href[i+2] == "="){
						id = href.substring(i+3);
					}
				}
				var c = 0;
				var allRows = $('#resultTable').find('.removableRow');
					$('#resultTable').find('tr').each(function(){
						var a = $(this).children().find('.addButton').attr('href');
						if(c !== 0){
							for(i=0; i<a.length-1; i++){
								if(a[i] == "i" && a[i+1] == "d" && a[i+2] == "="){
									a = a.substring(i+3);
								}
							}
							if(a == id){
								$(this).effect('pulsate', 'slow');
								$('<div class="error">Sorry, There was an error when adding your order.</div>').insertBefore('#resultTable');
								$('.error').css('background', '#CD2626');
								$('.error').css('color', '#FFFFFF');
								$('.error').css('text-align', 'center');
								setTimeout( function(){
									$('.error').css('color', '#C0C0C0');
									setTimeout( function(){
										$('.error').fadeOut();
									}, 7000); //after 10 seconds
								}, 3000);
							}
						}
						c++; // :)
					});
			}
		  }});
		 $(this).dialog("close");
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      },
    });
	$(function() {
		$('#wineId').autocomplete({			
			source: "autocomplete.php",
			minLength: 2
		});
	});
	$(function() {
		$( "#selectableLocationsList" ).selectable({
			stop: function() {
			$(".ui-selected", this).each(function() {
				numLocations += 1;
				$(this).hide();
				$("#chosenLocationsList").append("<li value="+$(this).val()+">"+$(this).html()
				+"<input class='spinnerQty' placeholder='Quantity' name='value' /><input type='button' id='deleteLoc' class='deleteImgClass' /></li>");
				var spinnerQty = $( ".spinnerQty" ).spinner();
				spinnerQty.spinner( "option", "min", 1);
				spinnerQty.spinner( "option", "max", wineQty);
			});
			//console.log(numLocations);
			/*$( "#chosenLocationsList li" ).update();
			$( "#chosenLocationsList li" ).on( "spinchange", function( event, ui ) {
				console.log('a val has changed');
			} );*/
			}
		});
	});
	$(document).on("click","#deleteLoc", function(){
		numLocations -= 1;
		console.log(numLocations);
		var id = $(this).closest('li').val();
		var text = $(this).closest('li').text().toString();
		text = text.substring( 0, text.length - 2);
		var li = $( "#selectableLocationsList li" ).size();
		$( "#selectableLocationsList li" ).each(function(){
			if(id == $(this).val()){
				$(this).css('display','list-item');
				$(this).removeClass('ui-selected')
			}
		});
		$(this).closest('li').remove();
		$( "#chosenLocationsList li" ).each(function(){
			//console.log($(this).find('.spinnerQty').spinner("value"));
		});
	});

	/** END jquery ui **/
	/** BEGIN DROPDOWN MENU **/
	
	$(function() {
		$('.dropdown-menu').dropdown_menu();
	});
	
	/** END DROPDOWN MENU **/
	/*$('.newBottleInput').keyup(function() {
		var search_term = $(this).attr('value');
		var table = $(this).attr('dbtable');
		var field = $(this).attr('field');
		var input = $(this);
		var width = $(this).css('width');
		var intWidth = parseInt(width);
		intWidth += 8;
		intWidth.toString();
		var paddingLeft = parseInt($('label.bottleLabel').attr('offsetWidth'));
		//paddingLeft = paddingLeft.substring(0, paddingLeft.length - 2);
		var intPaddingLeft = parseInt(paddingLeft);
		intPaddingLeft = intPaddingLeft + 100 + 12;
		intPaddingLeft.toString();
		$('.result').css('width', intWidth);
		$('.dropdown').css('padding-left', intPaddingLeft);
		var json = {"keywword" : search_term , "table" : table , "field" : field};
		json = $.param(json);;
		$.post('autocomplete.php', {arr:json}, function(data){
			$('.result').html(data);
			$('.result li').click(function() {
				var result_value = $(this).text();
				$(input).attr('value',result_value);
				$('.result').html('');
			});
		});
	});*/
});