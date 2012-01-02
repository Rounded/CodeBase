/* admin_scripts.js */
/* Package: wp-photo-album-plus
/*
/* Version 3.0.1
/* Various js routines used in admin pages		
*/

jQuery(document).ready(function() {
/* alert( 'You are running jQuery version: ' + jQuery.fn.jquery ); */

	jQuery(".fade").fadeTo(10000, 0.1)
	});

/* Check if jQuery library revision is high enough, othewise give a message and uncheck checkbox elm */
function checkjQueryRev(msg, elm, rev){
	var version = parseFloat(jQuery.fn.jquery);
	if (elm.checked) {
		if (version < rev) {
			alert (msg+'\nThe version of your jQuery library: '+version+' is too low for this feature. It requires version '+rev);
			elm.checked = '';
		}
	}
}
	
/* This functions does the init after loading settings page. do not put this code in the document.ready function!!! */
function wppaInitSettings() {
	wppaCheckFullHalign();
	wppaCheckUseThumbOpacity();
	wppaCheckUseCoverOpacity();
	wppaCheckThumbType();
	wppaCheckThumbLink();
	wppaCheckMphotoLink();
}
	
/* Adjust visibility of selection radiobutton if fixed photo is chosen or not */				
function wppaCheckWidgetMethod() {
	var ph;
	var i;
	if (document.getElementById("wppa-wm").value=="4") {
		document.getElementById("wppa-wp").style.visibility="visible";
	}
	else {
		document.getElementById("wppa-wp").style.visibility="hidden";
	}
	if (document.getElementById("wppa-wm").value=="1") {
		ph=document.getElementsByName("wppa-widget-photo");
		i=0;
		while (i<ph.length) {
			ph[i].style.visibility="visible";
			i++;	
		}
	}
	else {
		ph=document.getElementsByName("wppa-widget-photo");
		i=0;
		while (i<ph.length) {
			ph[i].style.visibility="hidden";
			i++;
		}
	}
}

/* Displays or hides names and.or description dependant of subtitle chosen */
function wppaCheckWidgetSubtitle() {
	var subtitle = document.getElementById('wppa-st').value;
	var stn, std;
	var i;
	stn = document.getElementsByTagName('h4');
	std = document.getElementsByTagName('h6');
	i = 0;
	switch (subtitle)
	{
	case 'none':
		while (i < stn.length) {
			stn[i].style.visibility = "hidden";
			std[i].style.visibility = "hidden";
			i++;
		}
		break;
	case 'name':
		while (i < stn.length) {
			stn[i].style.visibility = "visible";
			std[i].style.visibility = "hidden";
			i++;
		}
		break;
	case 'desc':
		while (i < stn.length) {
			stn[i].style.visibility = "hidden";
			std[i].style.visibility = "visible";
			i++;
		}
		break;
	}
}

/* Enables or disables the setting of full size horizontal alignment. Only when fullsize is unequal to column width */
/* also no hor align if vertical align is ---default-- */
function wppaCheckFullHalign() {
	var fs = document.getElementById('wppa-fullsize').value;
	var cs = document.getElementById('wppa-colwidth').value;
	var va = document.getElementById('wppa-fullvalign').value;
	if ((fs != cs) && (va != 'default')) {
		jQuery('.wppa-ha').css('visibility', 'visible');
	}
	else {
		jQuery('.wppa-ha').css('visibility', 'collapse');
	}
}

/* Enables or disables popup thumbnail settings according to availability */
function wppaCheckThumbType() {
	var ttype = document.getElementById('wppa-thumbtype').value;
	if (ttype == 'default') {
		jQuery('.tt-normal').css('visibility', 'visible');
		jQuery('.tt-ascovers').css('visibility', 'collapse');
		jQuery('.tt-always').css('visibility', 'visible');
		wppaCheckUseThumbOpacity();
	}
	if (ttype == 'ascovers') {
		jQuery('.tt-normal').css('visibility', 'collapse');
		jQuery('.tt-ascovers').css('visibility', 'visible');
		jQuery('.tt-always').css('visibility', 'visible');
	}
	if (ttype == 'none') {
		jQuery('.tt-normal').css('visibility', 'collapse');
		jQuery('.tt-ascovers').css('visibility', 'collapse');
		jQuery('.tt-always').css('visibility', 'collapse');
	}
}

/* Enables or disables thumb opacity dependant on whether feature is selected */
function wppaCheckUseThumbOpacity() {
	var topac = document.getElementById('wppa-use-thumb-opacity').checked;
	if (topac) {
		jQuery('.thumb-opacity').css('visibility', 'visible');
	}
	else {
		jQuery('.thumb-opacity').css('visibility', 'collapse');
	}
}

/* Enables or disables coverphoto opacity dependant on whether feature is selected */
function wppaCheckUseCoverOpacity() {
	var copac = document.getElementById('wppa-use-cover-opacity').checked;
	if (copac) {
		jQuery('.cover-opacity').css('visibility', 'visible');
	}
	else {
		jQuery('.cover-opacity').css('visibility', 'collapse');
	}
}

/* if the slideshow is disabled its useless to ask if it should initially run */
function wppaCheckHs() {
	var Hs = document.getElementById('wppa-hide-slideshow').checked;
	if (Hs) jQuery(".wppa-ss").css('visibility', 'visible');
	else jQuery(".wppa-ss").css('visibility', 'collapse');
}

/* Enables or disables secundairy breadcrumb settings */
function wppaCheckBreadcrumb() {
	var Bc = document.getElementById('wppa-show-bread').checked;
	if (Bc) {
		jQuery('.wppa-bc').css('visibility', 'visible');
	}
	else {
		jQuery('.wppa-bc').css('visibility', 'collapse');
	}
}

/* Enables or disables rating system settings */
function wppaCheckRating() {
	var Rt = document.getElementById('wppa-rating-on').checked;
	if (Rt) {
		jQuery('.wppa-rating').css('visibility', 'visible');
	}
	else {
		jQuery('.wppa-rating').css('visibility', 'collapse');
	}
}

function wppaCheckWidgetLink() { 
	if (document.getElementById('wppa-wlp').value == '-1') {
		jQuery('.wppa-wlu').css('visibility', 'visible'); 
		jQuery('.wppa-wlt').css('visibility', 'hidden');
	}
	else {
		jQuery('.wppa-wlu').css('visibility', 'collapse'); 
		jQuery('.wppa-wlt').css('visibility', 'visible');
	}
}

function wppaCheckThumbLink() { 
	if (document.getElementById('wppa-tlt').value == 'none') {
		jQuery('.wppa-tlp').css('visibility', 'hidden');
	}
	else {
		jQuery('.wppa-tlp').css('visibility', 'visible');
	}
}

function wppaCheckMphotoLink() { 
	if (document.getElementById('wppa-mlt').value == 'none') {
		jQuery('.wppa-mlp').css('visibility', 'hidden');
	}
	else {
		jQuery('.wppa-mlp').css('visibility', 'visible');
	}
}
