/*
	@since 1.0

	Create tabs from this = parent;

*/

jQuery.fn.wpmin_tabs = function( tab_selector, accordion ) {

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


		// If accordion
		if ( accordion ) {

			// Add identifying class
			tab_container.addClass('accordion');

			// Add a handle
			tab.before('<a href="#" class="wpmin_tabs-handle" target="' + tab_id + '" >' + tab_name + '</a>');

			// Wrap tab with an inner class to target
			tab.wrap('<div class="tab_inner" data-tab-id="' + tab_id + '" />');

		} else {

			// Add tab_id to tab container
			tab.attr('data-tab-id', tab_id);

			// Add a handle
			handles.append('<a href="#" class="wpmin_tabs-handle" target="' + tab_id + '" >' + tab_name + '</a>');

		}

	});


	// Tab Handles
	jQuery('.wpmin_tabs').each(function(){

		// Click Function
		jQuery(this).on('click', '.wpmin_tabs-handle', function(e){

			// Prevent Hyperlink
			e.preventDefault();

			// Define tab container
			var tab_container = jQuery(this).closest('.wpmin_tabs');

			// Assign handle container to a var
			var handles = tab_container.find('.wpmin_tabs-handles');

			// Get target
			var target = jQuery(this).attr('target');

			// Remove all active classes on handles -- Crap, this removes active from nested tabs too :-\ ##__BUG__##
			tab_container.find('.wpmin_tabs-handle').removeClass('active');

			// Hide all tabs
			tab_container.find( tab_selector ).hide();

			// Show selected tab
			tab_container.find('[data-tab-id="' + target + '"]').show();

			// Add active class to this handle
			jQuery(this).addClass('active');

		})

		// Activate first tab
		jQuery(this).find(' .wpmin_tabs-handle:first-of-type ').click();

	})

};