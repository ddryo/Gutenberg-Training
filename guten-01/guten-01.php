<?php
/**
 * Plugin Name: Guten-01
 */

if( !defined( 'ABSPATH' ) ) exit;

// カスタムブロック用のスクリプトを追加
add_action( 'enqueue_block_editor_assets', function() {

    $asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');
    
    wp_register_script(
        'myguten-test-block',
        plugins_url( 'build/index.js', __FILE__ ),
        $asset_file['dependencies'],
        $asset_file['version']
    );

    // wp_enqueue_script('myguten-test-block'); //register_block_typeの方が公式で紹介されているのでそっち使う。
    register_block_type(
    'myguten/test-block', [
        'editor_script' => 'myguten-test-block',
    ]
  );

} );
