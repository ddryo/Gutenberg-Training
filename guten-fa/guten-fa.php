<?php
/**
 * Plugin Name: Guten-fa
 */

if( !defined( 'ABSPATH' ) ) exit;

/**
 * 定数宣言
 */
if ( ! defined( 'MY_PLUGIN_VERSION' ) ) {
    // define( 'MY_PLUGIN_VERSION', '1.0' );
    define( 'MY_PLUGIN_VERSION', date('YmdGis') ); //キャッシュされないように日時を返す（開発用）
}
if ( ! defined( 'MY_PLUGIN_PATH' ) ) {
    define( 'MY_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'MY_PLUGIN_BASENAME' ) ) {
    define( 'MY_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
}
if ( ! defined( 'MY_PLUGIN_URL' ) ) {
    define( 'MY_PLUGIN_URL', plugins_url( '', __FILE__ ) );
}


/**
 * カスタムブロック用のスクリプトを追加
 */
add_action( 'init', function() {

    $asset_file = include( MY_PLUGIN_PATH . '/build/index.asset.php');
    
    wp_register_script(
        'myguten-fa-block',
        MY_PLUGIN_URL. '/build/index.js',
        $asset_file['dependencies'],
        $asset_file['version']
    );

    // wp_enqueue_script('myguten-fa-block');

    register_block_type(
        'myguten/fa-block', [
            'editor_script' => 'myguten-fa-block',
        ]
    );

} );


/**
 * ブロックエディターで読み込むファイル
 */
add_action( 'enqueue_block_editor_assets', function() {

    // FontAwesome（JSの方を使わないと FontAwesomeIcon がうまく動かない）
    wp_enqueue_script(
        'font-awesome',
        MY_PLUGIN_URL.'/library/fontawesome/js/all.min.js',
        ['wp-block-library'],
        '',
        true
    );


    // FontIconPicker用
    wp_enqueue_style(
        'fip-base-theme',
        'https://unpkg.com/@fonticonpicker/react-fonticonpicker/dist/fonticonpicker.base-theme.react.css',
        [],
        ''
    );
    wp_enqueue_style(
        'fip-material-theme',
        'https://unpkg.com/@fonticonpicker/react-fonticonpicker/dist/fonticonpicker.material-theme.react.css',
        [],
        ''
    );

    // Googleマテリアルアイコン
    // wp_enqueue_style(
    //     'google-material',
    //     'https://fonts.googleapis.com/icon?family=Material+Icons',
    //     [],
    //     ''
    // );
    

});


/**
 * フロントでのスクリプト スタイルシートの読み込み
 */
add_action('wp_enqueue_scripts', function() {

    // FontAwesome（JSで使う時）
    wp_enqueue_script(
        'font-awesome',
        MY_PLUGIN_URL.'/library/fontawesome/js/all.min.js',
        [],
        '',
        true
    );

    // FontAwesome（CSSで使う時）
    // wp_enqueue_style(
    //     'font-awesome',
    //     MY_PLUGIN_URL.'/library/fontawesome/css/all.min.css',
    //     [],
    //     ''
    // );

    // フロント用スタイル
    wp_enqueue_style(
        'my-style',
        MY_PLUGIN_URL.'/assets/css/style.css',
        ['wp-block-library'],
        MY_PLUGIN_VERSION
    );


});