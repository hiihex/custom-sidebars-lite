<?php

class Custom_Sidebars_Lite_Display_Sidebars {
	function __construct() {
		add_action('widgets_init', array($this, 'register_custom_sidebars'));
	}

	function register_custom_sidebars(): void {
		$sidebars = get_option('number_of_sidebars', 0);

		$args = array(
			'name'          => 'Custom Sidebar ',
			'id'            => 'custom-sidebar-',
			'class'         => 'custom-sidebar',
			'description'   => 'This is a custom sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>'
		);

		for ($i = 1; $i <= $sidebars; $i++){
			$args['name'] = 'Custom Sidebar '; // reset default for iterations in case name is empty

			$args['id'] = $args['id'] . $i;
			$sidebar_name = get_option('custom_sidebar_' . $i);
			if(!empty($sidebar_name)){
				$args['name'] = sanitize_text_field($sidebar_name);
			} else {
				$args['name'] = $args['name'] . $i;
			}
			register_sidebar($args);
		}
	}
}

new Custom_Sidebars_Lite_Display_Sidebars();
