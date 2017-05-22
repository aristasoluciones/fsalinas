jQuery(window).load(function(){

	var $container = $('.portfolio');
	$container.isotope({
		filter: '*',
		//sortBy : 'random',
		animationOptions: {
			duration: 750,
			easing: 'linear',
			queue: false,
		}
	});

	$('nav.primary .portfolioFilters a').click(function(){
		var selector = $(this).attr('data-filter');
		$container.isotope({
			filter: selector,
			animationOptions: {
				duration: 750,
				easing: 'linear',
				queue: false,
			}
		});
	  return false;
	});

	var $optionSets = $('nav.primary .portfolioFilters'),
	       $optionLinks = $optionSets.find('a');
	 
	       $optionLinks.click(function(){
	          var $this = $(this);
		  // don't proceed if already selected
		  if ( $this.hasClass('selected') ) {
		      return false;
		  }
	   var $optionSet = $this.parents('nav.primary .portfolioFilters');
	   $optionSet.find('.selected').removeClass('selected');
	   $this.addClass('selected'); 
	});

});