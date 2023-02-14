<?php

class Custom_Sidebars_Lite_Register_Settings {
	function __construct() {
		add_action('admin_menu', array($this, 'register_options_page'));
		add_action('admin_init', array($this, 'csl_register_settings'));
	}

	function register_options_page(): void {
		add_options_page( 'Custom Sidebars Page', 'Custom Sidebars Menu', 'manage_options', 'csl-sidebars-lite', array($this, 'csl_render_plugin_settings_page'));
	}

	function csl_register_settings(): void {
		register_setting('csl_plugin_options', 'number_of_sidebars');
		for($i = 1; $i <= get_option('number_of_sidebars'); $i++){
			register_setting('csl_plugin_options', 'custom_sidebar_' . $i);
		}
	}

	function csl_render_plugin_settings_page(): void {
		?>
		<h2>Example Plugin Settings</h2>
		<form action="options.php" method="post">
			<?php
			settings_fields( 'csl_plugin_options' );
			do_settings_sections( 'csl-sidebars-lite' ); ?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Number of custom sidebars</th>
					<td><input type="number" name="number_of_sidebars" value="<?php echo get_option( 'number_of_sidebars' ); ?>" /></td>
				</tr>
			</table>
			<?php for ($i = 1; $i <= get_option( 'number_of_sidebars' ); $i++) : ?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">Custom Sidebar <?php echo $i; ?> Name</th>
						<td><input type="text" name="custom_sidebar_<?php echo $i; ?>" value="<?php echo get_option( 'custom_sidebar_' . $i); ?>" /></td>
					</tr>
				</table>
			<?php endfor; ?>
			<?php submit_button(); ?>
		</form>
		<?php
	}
}

new Custom_Sidebars_Lite_Register_Settings();
