/*
	@since 1.0

	Create accordions from this = parent;

*/

jQuery.fn.wpmin_accordion = function( tab_selector ) {

	// Make life easier
	var tab_container = this;

	// Add a class
	tab_container.addClass('wpmin_tabs');

	// Add handle container
	tab_container.prepend('<div class="wpmin_tabs-handles" />');

	// Assign handle container to a var
	var handles = tab_container.find('.wpmin_tabs-handles');

	// Handle the tabs
	tab_container.find( tab_selector ).each(function(){

		// Make life easier
		var tab = jQuery(this);

		// Name the tab
		var tab_name = tab.attr('data-name');

		// Add Class
		tab.addClass('wpmin_tab');

		// Create tab_id
		var tab_id = 'tab-' + tab.index();

		tab.attr('data-tab-id', tab_id)

		// Add a handle
		handles.append('<a href="#" target="' + tab_id + '" >' + tab_name + '</a>');

	});


	// Tab Handles
	handles.on('click', ' > a ', function(e){

		// Prevent Hyperlink
		e.preventDefault();

		// Remove all active classes on handles
		handles.find('> a').removeClass('active');

		// Get target
		var target = jQuery(this).attr('target');

		// Hide all tabs
		tab_container.find( tab_selector ).hide();

		// Show selected tab
		tab_container.find('[data-tab-id="' + target + '"]').show();

		// Add active class to this handle
		jQuery(this).addClass('active');

	})

	// Activate first tab
	handles.find(' > a:first-child ').click();

};