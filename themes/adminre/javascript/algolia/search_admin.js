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
		// if(flag == 0)
		// {
		// 	$('.loc-span').addClass('hide');
		// 	$('#zone-tags').append('<div class="location-tag font_newregular z-ind9 algo-loc" id="zone-tag"><span id="algo-value">'+datum.name+'</span><a href="javascript:void(0);" id="algo-loc" class="gry">x</a></div>');
		// 	flag	=	1;
		// }
		// else
		// {
		// 	$('#algo-value').html(datum.name);
		// }
	});
});