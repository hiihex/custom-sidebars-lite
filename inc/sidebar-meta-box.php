<?php

/**
 * @User kacperslenzak
 * @Package custom-sidebars-lite
 * @File Custom_Sidebars_Lite_Metabox
 * @Date 16/02/2023
 */
class Custom_Sidebars_Lite_Metabox {
	function __construct() {
		add_action('add_meta_boxes', array($this, 'csl_add_custom_box'));
		add_action('save_post', array($this, 'csl_save_postdata'));
	}

	function csl_add_custom_box(): void {
		add_meta_box(
		'csl_sidebar_panel',                 // Unique ID
		'Custom Sidebar',      // Box title
		array($this, 'csl_metabox_html'),  // Content callback, must be of type callable
		'page',                            // Post type
		'side',
		'core'
		);
	}

	function csl_metabox_html(): void {
        $sidebars = Custom_Sidebars_Lite_Helpers::return_all_sidebars();
		?>
		<label for="csl_sidebar_select">Select A Sidebar</label>
		<select name="csl_sidebar_select" id="csl_sidebar_select" class="postbox">
            <option value=""></option>
            <?php foreach($sidebars as $sidebar){
                echo '<option value="'. $sidebar . '">'. $sidebar .'</option>';
            }?>
		</select>
		<?php
	}

	function csl_save_postdata( $post_id ): void {
		if ( array_key_exists( 'csl_sidebar_select', $_POST ) ) {
			update_post_meta(
				$post_id,
				'csl_sidebar_settings',
				$_POST['csl_sidebar_select']
			);
		}
	}
}
