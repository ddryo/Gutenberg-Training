<?php
/*
Plugin Name: My Gutenberg
Plugin URI: https://developer.wordpress.org/block-editor/tutorials/javascript/js-build-setup/
Description: hogehoge
Version: 1.0.0
Author: hogehoge
Author URI: https://developer.wordpress.org/block-editor/tutorials/javascript/js-build-setup/
License: GPL2

/*  Copyright 2018 hogehoge (email : info@example.com)
 
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
     published by the Free Software Foundation.
 
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.
 
    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


add_action( 'enqueue_block_editor_assets', function() {

    $asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');
    
    wp_register_script(
        'myguten-block',
        plugins_url( 'build/index.js', __FILE__ ),
        $asset_file['dependencies'],
        $asset_file['version']
    );

    wp_enqueue_script('myguten-block');

} );
