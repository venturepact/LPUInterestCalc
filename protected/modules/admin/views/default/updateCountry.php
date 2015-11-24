<h1>Update Country Data (To bind Data with Google Place IDs)</h1>
<div class="row">
	<div class="col-md-12">
		<form method="post">
			<input type="hidden" id="cityUniId" name="cityUniId" />
			<input type="hidden" id="cityOldId" name="cityOldId" />
			<input type="hidden" id="GLong" name="GLong" />
			<input type="hidden" id="S-Code" name="S-Code" />
			<div class="row" style="margin-top:20px;">
				<div class="col-xs-2">
				Country Name: 
				</div>
				<div class="col-xs-6">
					<input type="text" id="city" name="city" class="form-control"/>
				</div>
				<div class="col-xs-2">
					<input type="submit" class="btn btn-primary"/>
				</div>
			</div>
		</form>
	</div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
<script>
//Google Map API Stuff -- start
var autocomplete;
var MARKER_PATH = 'https://maps.gstatic.com/intl/en_us/mapfiles/marker_green';
var hostnameRegexp = new RegExp('^https?://.+?/');

function initialize() {
	autocomplete = new google.maps.places.Autocomplete(
		(document.getElementById('city')),
		{types: [],}
	);
	google.maps.event.addListener(autocomplete, 'place_changed', onPlaceChanged);
}
function onPlaceChanged() {
  var place = autocomplete.getPlace();
  if (place.place_id) {
	console.log(place.geometry.location.H+','+place.geometry.location.L);
	console.log(place);
  	$("#cityUniId").val(place.place_id);
  	$("#cityOldId").val(place.name);
  	$("#GLong").val(place.geometry.location.H+','+place.geometry.location.L);  	
	$("#S-Code").val(place.address_components[place.address_components.length-1].short_name);
  } else {
    document.getElementById('city').placeholder = 'eg. New York, USA';
  }

}
initialize();
//Google Map API Stuff -- end
</script>