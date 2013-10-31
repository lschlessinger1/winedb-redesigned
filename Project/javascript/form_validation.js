function is_int(value){ 
	if ((parseFloat(value) == parseInt(value)) && !isNaN(value)) {
		return true;
	} else { 
		return false;
	} 
}
function checkForm(formNum){
	var f = formNum;
	console.log("Form number is: " + formNum)
	if(f == 1){ //new wine form
		var vintage = document.forms["new_wine_form"]["new_vintage"].value;
		var country = document.forms["new_wine_form"]["new_country"].value;
		if (checkVintage(vintage) == false /* || checkCountry(country) == false */){
			if(event.preventDefault){
				event.preventDefault();
			} else {
			   event.returnValue = false; // for IE 
			}
		}
		var v = document.getElementById("vintageInput");
		var c = document.getElementById("countryInput");
		if(checkVintage(vintage) == false){
			if(v.style.backgroundColor = "white"){
				v.style.backgroundColor = "red";
			} 
		} else {
			v.style.backgroundColor = "white";
		} 
		if(checkCountry(country) == false){
			if(c.style.backgroundColor = "white"){
				c.style.backgroundColor = "red";
			} 
		} else {
			c.style.backgroundColor = "white";
		}
	} else if(f == 2){ // new wine and bottle form
		var vintage = document.forms["new_bottle_form"]["new_vintage"].value;
		var country = document.forms["new_bottle_form"]["new_country"].value;
		if (checkVintage(vintage) == false /* || checkCountry(country) == false */){
			if(event.preventDefault){
				event.preventDefault();
			} else {
			   event.returnValue = false; // for IE 
			}
		}
		var v = document.getElementById("vintageInput");
		var c = document.getElementById("countryInput");
		//also check qty on this one too
		if(checkVintage(vintage) == false){
			if(v.style.backgroundColor = "white"){
				v.style.backgroundColor = "red";
			} 
		} else {
			v.style.backgroundColor = "white";
		} 
		if(checkCountry(country) == false){
			if(c.style.backgroundColor = "white"){
				c.style.backgroundColor = "red";
			} 
		} else {
			c.style.backgroundColor = "white";
		}
	} else if(f == 3) { // update quantity of wine
		var qty = document.forms["new_quantity_form"]["new_quantity"].value;
		var q = document.getElementById("quantityInput");
		qty.toString();
		parseInt(qty);
		if (isNaN(qty)){ // or wine name does not match up with, also check for ambiguiety (same grape varietal, region, maker)
			if(event.preventDefault){
				event.preventDefault();
			} else {
			   event.returnValue = false; // for IE 
			}
		} else {
			q.style.backgroundColor = "white";
		}
		if(isNaN(qty) && q.style.backgroundColor != "red"){ 
			q.style.backgroundColor = "red";
		} 
	} else if(f == 4) { // new location form
		var c = document.forms["new_location_form"]["new_country"].value;
		var ctn = document.forms["new_location_form"]["new_container_number"].value;
		var con = document.getElementById("containerNumber");
		ctn.toString();
		parseInt(ctn);
		if (isNaN(ctn)){ // or 
			if(event.preventDefault){
				event.preventDefault();
			} else {
			   event.returnValue = false; // for IE 
			}
		} else {
			con.style.backgroundColor = "white";
		}
		if(isNaN(ctn) && con.style.backgroundColor != "red"){ 
			con.style.backgroundColor = "red";
		} 
		if(checkCountry(country) == false){
			if(c.style.backgroundColor = "white"){
				c.style.backgroundColor = "red";
			} 
		} else {
			c.style.backgroundColor = "white";
		}
	} else if(f == 5) { //new order form
		var qty = document.forms["new_order_form"]["new_quantity"].value;
		var q = document.getElementById("orderQuantity");
		qty.toString();
		parseInt(qty);
		if (isNaN(qty)){ // or wine name does not match up with, also check for ambiguiety (same grape varietal, region, maker)
			if(event.preventDefault){
				event.preventDefault();
			} else {
			   event.returnValue = false; // for IE 
			}
		} else {
			q.style.backgroundColor = "white";
		}
		if(isNaN(qty) && q.style.backgroundColor != "red"){ 
			q.style.backgroundColor = "red";
		} 
	} else {
		console.log("Bad Form Number: " + formNum);
	}
}
// things to do: validate life expectancy on wines and bottles (just like vintage and country), validate color select wines and bottles
function checkVintage(vintage){
	if(vintage == "default")
		return false;
}
function checkCountry(country){
	if (country === "default" || country === '')
		return false;
}
function isInt(n) {
   return typeof n === 'number' && n % 1 == 0;
}
/**BEGIN FORM **/