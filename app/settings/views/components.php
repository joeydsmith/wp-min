<section data-name="Components">

	<?php

		// Get Saved Components
		$active_components = get_option('wpmin_components');


		// For Testing
		//echo '<details><pre>'; print_r($active_components); echo '</pre></details>';

	?>


	<div>
		<table>
			<tr>
				<th>
					Package
				</th>
				<th>
					.js
				</th>
				<th>
					.css
				</th>
			</tr>

			<tr>
				<td>
					<strong>WPMin Tabs</strong>
					<div class="small">
						<em>documentation not available yet.</em>
					</div>
				</td>
				<td>
					<input type="checkbox" name="wpmin_components[]" value="tabs-js" <?php if ( in_array('tabs-js', $active_components ) ) { echo 'checked="checked"'; } ?> />
				</td>
				<td>
					<input type="checkbox" name="wpmin_components[]" value="tabs-css" <?php if ( in_array('tabs-css', $active_components ) ) { echo 'checked="checked"'; } ?> />
				</td>
			</tr>

			<tr>
				<td>
					<strong>FlexSlider 2.2.2</strong>
					<div class="small">
						<a href="https://github.com/woothemes/FlexSlider/wiki/FlexSlider-Properties" target="_blank">documentation</a>
					</div>
				</td>
				<td>
					<input type="checkbox" name="wpmin_components[]" value="flexslider-js" <?php if ( in_array('flexslider-js', $active_components ) ) { echo 'checked="checked"'; } ?> />
				</td>
				<td>
					<input type="checkbox" name="wpmin_components[]" value="flexslider-css" <?php if ( in_array('flexslider-css', $active_components ) ) { echo 'checked="checked"'; } ?> />
				</td>
			</tr>

			<tr>
				<td>
					<strong>FontAwesome 4.2.0</strong>
					<div class="small">
						<a href="http://fortawesome.github.io/Font-Awesome/" target="_blank">documentation</a>
					</div>
				</td>
				<td>
					N/A
				</td>
				<td>
					<input type="checkbox" name="wpmin_components[]" value="fontawesome-css" <?php if ( in_array('fontawesome-css', $active_components ) ) { echo 'checked="checked"'; } ?> />
				</td>
			</tr>

		</table>
	</div>
</section>