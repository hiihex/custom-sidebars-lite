<?php
/*
	Plugin Name: Lightweight Custom Sidebars
	Plugin URI: http://www.justdigital.ie
	Description: This plugin allows users to create custom sidebars from the WordPress backend and adds a menu on pages where users can select which sidebar is shown.
	Version: 1.0
	Author: Justdigital
	Author URI: http://www.justdigital.ie/
	License: GPL v3
	Requires PHP: 5.3

	Lightweight Custom Sidebars Plugin
	Copyright (C) 2012-2022, Justdigital - www.justdigital.ie

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
defined('ABSPATH') or die("Cannot access pages directly.");

class Custom_Sidebars_Lite {
	function __construct() {
		require_once 'inc/register-settings.php';
		require_once 'inc/display-sidebars.php';
		require_once 'inc/sidebar-meta-box.php';
		require_once 'inc/helpers.php';
	}

	function build(): void {
		new Custom_Sidebars_Lite_Register_Settings();
		new Custom_Sidebars_Lite_Display_Sidebars();
		new Custom_Sidebars_Lite_Metabox();
	}
}


/**
 * @throws Exception
 */
function build_plugin(): void {
	if(!class_exists('Custom_Sidebars_Lite')){
		throw new Exception( 'The main class of custom-sidebars-lite is missing. Please check if the plugin is active and the files are not corrupt' );
	}

	$main = new Custom_Sidebars_Lite();
	$main->build();
}
add_action('plugins_loaded', 'build_plugin');