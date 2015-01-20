<h1>WPMin Settings</h1>
<div id="wpmin_settings">
	<form method="post" action="options.php">
		<?php

			// Initialize
			echo settings_fields( 'wpmin-general-settings' );
			do_settings_sections( 'wpmin-general-settings' );

			// Views
			include plugin_dir_path( __FILE__ ) . 'views/components.php';
			include plugin_dir_path( __FILE__ ) . 'views/actions.php';
			include plugin_dir_path( __FILE__ ) . 'views/documentation.php';

			// WP submit
			submit_button();

		?>
	</form>
</div>