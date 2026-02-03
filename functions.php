<?php
// CSSファイルとGoogle Fontsの読み込み
function add_link_files() {
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Tinos:ital,wght@0,400;0,700;1,400;1,700&family=Merriweather:ital,opsz,wght@0,18..144,300..900;1,18..144,300..900&family=Klee+One&family=Sawarabi+Gothic&display=swap',
        [],
        null,
        'all'
    );

    wp_enqueue_style(
        'my-style',
        get_template_directory_uri() . '/css/style.css',
        ['google-fonts'],
        '1.0',
        'all'
    );
}
add_action('wp_enqueue_scripts', 'add_link_files');

// Google Fonts向けにpreconnectを追加（オプション）
function add_resource_hints($hints, $relation_type) {
    if ('preconnect' === $relation_type) {
        $hints[] = 'https://fonts.googleapis.com';
        $hints[] = 'https://fonts.gstatic.com';
    }
    return $hints;
}
add_filter('wp_resource_hints', 'add_resource_hints', 10, 2);

// Import swiper Library
function add_slider_files() {
    // スタイルシートの読み込み
    wp_enqueue_style('swiper-style', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), null);
    // JavaScript の読み込み
    wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'add_slider_files');

// Import JS
function custom_enqueue_scripts() {
    $js_path = get_template_directory() . '/js/main.js';
    $js_url  = get_template_directory_uri() . '/js/main.js';
    
    if ( file_exists( $js_path ) ) {
        wp_enqueue_script(
            'main-js',
            $js_url,
            array(),
            filemtime( $js_path ),
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'custom_enqueue_scripts');

// Import fontawesome
function add_fontawesome() {
    wp_enqueue_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', [], '6.5.1');
}
add_action('wp_enqueue_scripts', 'add_fontawesome');

// WordPressが用意している機能を有効化する
function theme_setup(){
    // titleタグを挿入する
    add_theme_support('title-tag');

    // アイキャッチ画像
    add_theme_support('post-thumbnails');

    // トップページ 画像のサイズ設定
    add_image_size( 'top_image', 150, 200, true ); //trueトリミングあり　falseトリミングなし

    // メニュー （wpの外観→メニューで設置する項目を設定）
    register_nav_menus(
        array(
            'global-menu' => 'グローバルメニュー',
            'sp-menu' => 'spメニュー',
        )
    );
}
add_action('after_setup_theme', 'theme_setup');

// 管理画面の「投稿」を「メインコンテンツ」表記に変更
function ChangeAdminLabel() {
	global $menu;
	global $submenu;
	$name = 'WORKS';
	$menu[5][0] = $name;
	$submenu['edit.php'][5][0] = $name.'一覧';
	$submenu['edit.php'][10][0] = '新規追加';
}
function ChangeAdminObject() {
	global $wp_post_types;
	$name = 'WORKS';
	$labels = &$wp_post_types['post']->labels;
	$labels->name = $name;
	$labels->singular_name = $name;
	$labels->add_new = _x('追加', $name);
	$labels->add_new_item = $name.'の新規追加';
	$labels->edit_item = $name.'の編集';
	$labels->new_item = '新規'.$name;
	$labels->view_item = $name.'を表示';
	$labels->search_items = $name.'を検索';
	$labels->not_found = $name.'が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
}
add_action( 'init', 'ChangeAdminObject' );
add_action( 'admin_menu', 'ChangeAdminLabel' );

// 「上で変更したメインコンテンツ」投稿のアイコン変更 （ダッシュアイコンから）
function ChangeAdminIcons() {
    ?>
    <style>
    .dashicons-admin-post:before { content: '\f322';}
    </style>
    <?php
}
add_action( 'admin_head', 'ChangeAdminIcons' );