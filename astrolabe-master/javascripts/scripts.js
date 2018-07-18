jQuery(function() {
	jQuery('#navbar').affix({
		offset: {
			top: 200
		}
	});

	jQuery("pre.html").snippet("html", {style:'matlab'});
	jQuery("pre.css").snippet("css", {style:'matlab'});
	jQuery("pre.javascript").snippet("javascript", {style:'matlab'});

	jQuery('#easyPaginate').easyPaginate({
		paginateElement: 'div',
		elementsPerPage: 2,
		effect: 'climb'
	});
    
    jQuery('#easyPaginateMaps').easyPaginate({
		paginateElement: 'div',
		elementsPerPage: 4,
		effect: 'climb'
	});
});