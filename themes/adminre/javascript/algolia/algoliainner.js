$(document).ready(function() {
	$.fn.algoliaClick	=	function ($val){
		$(".skill-search").val($val);
	}
	var algolia				=	new AlgoliaSearch("L8YWR0XFJ6", "4bba2c1bb6dc58cdac2c3a02780bc9e0");
	var skills				=	algolia.initIndex('skills');
	var services			=	algolia.initIndex('services');
	var industries			=	algolia.initIndex('industries');
	var baseDir				=	'';//'/test.venturepact';
	$('.algolia-search1').typeahead({ hint: true, autoselect: true }, [
		{
			source: skills.ttAdapter({ "hitsPerPage": 5 }),
			displayKey: 'name',
			name:'skill',
			templates: {
				header: '<div class="category">Skills</div>',
				suggestion: function(hit){return '<div class="skill">'+'<div class="name" onclick=\'$.fn.algoliaClick("skill")\'>'+ hit._highlightResult.name.value +'</div>'+'</div>';}
			}
		},
		{
			source: services.ttAdapter({ "hitsPerPage": 5 }),
			displayKey: 'name',
			name:'service',
			templates: {
				header: '<div class="category">Services</div>',
				suggestion: function(hit) {
					return '<div class="service">'+'<div class="name" onclick=\'$.fn.algoliaClick("service")\'>'+ hit._highlightResult.name.value +'</div>'+'</div>';
				}
			}
		},
		{
			source: industries.ttAdapter({ "hitsPerPage": 5 }),
			displayKey: 'name',
			name:'industry',
			templates: {
				header: '<div class="category">Industries</div>',
				suggestion: function(hit) {
					return '<div class="industry">'+'<div class="name" onclick=\'$.fn.algoliaClick("industry")\'>'+ hit._highlightResult.name.value +'</div>'+'</div>';
				}
			}
		}
	]).on('typeahead:selected', function($e, datum , name){
		$(".skill-search").val(name);
	});
});