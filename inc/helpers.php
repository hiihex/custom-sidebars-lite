<?php

class Custom_Sidebars_Lite_Helpers {
	public static function return_all_sidebars(): array{
		$sidebars = array();
		for ($i = 1; $i <= get_option( 'number_of_sidebars' ); $i++){
			$sidebars['custom_sidebar_' . $i] = get_option( 'custom_sidebar_' . $i);
		}

		return $sidebars;
	}
}
