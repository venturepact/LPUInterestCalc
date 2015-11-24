//Google Map API Stuff -- start
var autocomplete;
var MARKER_PATH = 'https://maps.gstatic.com/intl/en_us/mapfiles/marker_green';
var hostnameRegexp = new RegExp('^https?://.+?/');

function initialize() {
	autocomplete = new google.maps.places.Autocomplete(
		(document.getElementById('algo-location')),
		{types: []}
	);
	google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
}
/*
function initializeCountry() {
	autocomplete = new google.maps.places.Autocomplete(
		(document.getElementById('algo-location')),
		{types: ['(cities)']}
	);
	google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
}
*/
function onPlaceChanged() {
  var place = autocomplete.getPlace();
  if (place.place_id) {
  
	console.log(place);  
		var type = place.types[0];
		if(type=="country")
		{
			$("#location-search").val('Country#'+place.place_id);
		}
		else if(type=="locality")
		{
			$("#location-search").val('City#'+place.place_id);
		}
		else
		{
			$("#location-search").val('City#'+place.place_id);
		}
		$(".tt-input").val(place.formatted_address);
		if(flag == 0)
		{
			$('.loc-span').addClass('hide');
			$('#zone-tags').append('<div class="location-tag font_newregular z-ind9 algo-loc" id="zone-tag"><span id="algo-value">'+place.formatted_address+'</span><a href="javascript:void(0);" id="algo-loc" class="gry">x</a></div>');
			flag	=	1;
		}
		else
		{
			$('#algo-value').html(place.formatted_address);
		}
		if($('#signup').length){
			$('#signup').modal({
				  backdrop: 'static',
				  keyboard: false
			});
		}
		$.fn.filterClick();
  } else {
    document.getElementById('algo-location').placeholder = 'Type City or Country';
  }
}
initialize();
 var storageLocation = localStorage.getItem('location');
if(typeof storageLocation != undefined && storageLocation != null && storageLocation != '') {
	//console.log("Location: " + storageLocation);
	var locationArray = storageLocation.split(",");
	console.log(locationArray);
	$('.tt-input').val(locationArray[0]);
	$('#location-search').val(locationArray[1]);
	$('.loc-span').addClass('hide');
	$('#zone-tags').append('<div class="location-tag font_newregular z-ind9 algo-loc" id="zone-tag"><span id="algo-value">'+locationArray[0]+'</span><a href="javascript:void(0);" id="algo-loc" class="gry">x</a></div>');
	$('.zone_outr').slideToggle(500);
	flag 	=	1;
	//localStorage.setItem('location',locationArray[0]+','+locationArray[1]);
	console.log("Selected Locations  "+locationArray[0]);
	$.fn.filterClick();
}