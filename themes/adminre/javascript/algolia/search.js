$(document).ready(function() {
	var algolia		=	new AlgoliaSearch("L8YWR0XFJ6", "4bba2c1bb6dc58cdac2c3a02780bc9e0");
	var countries	=	algolia.initIndex('countries');
	var city		=	algolia.initIndex('city');
	var baseDir		=	'';
	
	$('.algolia-search').typeahead({ hint: true, autoselect: true }, [
		{
			source: countries.ttAdapter({ "hitsPerPage": 5 }),
			displayKey: 'name',
			name:'countries',
			templates: {
				header: '<div class="category">Countries</div>',
				suggestion: function(hit){return '<div class="countries">'+'<div class="name">'+ hit._highlightResult.name.value +'</div>'+'</div>';}
			}
		},
		{
			source: city.ttAdapter({ "hitsPerPage": 5 }),
			displayKey: 'name',
			name:'city',
			templates: {
				header: '<div class="category">Cities</div>',
				suggestion: function(hit) {
					return '<div class="city">'+'<div class="name">'+ hit._highlightResult.name.value +'</div>'+'</div>';
				}
			}
		}
	]).on('typeahead:selected', function($e, datum , name){
		if(name=='countries')
			$("#location-search").val('Country_'+datum.id);
		else
			$("#location-search").val('City_'+datum.id);
		if(flag == 0)
		{
			$('.loc-span').addClass('hide');
			$('#zone-tags').append('<div class="location-tag font_newregular z-ind9 algo-loc" id="zone-tag"><span id="algo-value">'+datum.name+'</span><a href="javascript:void(0);" id="algo-loc" class="gry">x</a></div>');
			flag	=	1;
		}
		else
		{
			$('#algo-value').html(datum.name);
		}
		if($('#signup').length){
			$('#signup').modal({
				  backdrop: 'static',
				  keyboard: false
			});
		}
		$.fn.filterClick();
	});

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
});