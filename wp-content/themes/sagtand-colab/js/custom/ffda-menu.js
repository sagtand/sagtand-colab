$('.has-dropdown').on('click', function(event){
	event.preventDefault();
	if ($(this).hasClass('hover') ) {
		$(this).removeClass('hover')
	}
	else {
		$('.has-dropdown.hover').removeClass('hover');
		$(this).addClass('hover');
	}
});

$('#ffda-menus_toggle').on('click', function(){
	$(this).toggleClass('ffda-menus_open');
	
	if ($(this).hasClass('ffda-menus_open')) {
		$(this).removeClass('ffda-menus_closed');
	}
	else {
		$(this).addClass('ffda-menus_closed');
	}	
	$('#ffda-menus_container').slideToggle();
});