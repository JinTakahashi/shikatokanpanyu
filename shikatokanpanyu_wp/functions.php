<?php

add_action('init', function() {
    // 各ページや投稿のタイトルをブラウザのタイトルバーに表示
    add_theme_support('title-tag');
    // アイキャッチ画像
    add_theme_support('post-thumbnails');
});


// 投稿タイプカスタマイズ
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true;
        $args["label"] = 'ニュース'; /*「投稿」のラベル名 */
        $args['has_archive'] = 'news'; /* アーカイブにつけるスラッグ名 */
    }
    return $args;
}

add_filter('register_post_type_args', 'post_has_archive', 10, 2);


// カスタム投稿タイプ
add_action('init', function() {
    register_post_type('menu', [
        'label' => 'メニュー',
        'public' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-food',
        'supports' => ['thumbnail', 'title', 'editor'],
        'has_archive' => true,
        'show_in_rest' => true,
    ]);
    register_taxonomy('genre', 'menu', [
        'label' => 'メニューの種類',
        'hierarchical' => true,
        'show_in_rest' => true,
    ]);
});


// 表示件数調整
function change_posts_per_page($query)
{
    if (is_admin() || !$query->is_main_query()) /* メインクエリ以外では何もしない */
        return;
    if ($query->is_archive()) { /* アーカイブページの場合 */
        $query->set('posts_per_page', '10'); /* 表示件数を10に指定する */
    } else { /* それ以外のメインクエリの場合（例：ホームページ） */
        $query->set('posts_per_page', '2'); /* 表示件数を2に指定する */
    }
}
add_action('pre_get_posts', 'change_posts_per_page');


// 記事の抜粋の長さの変更
function twpp_change_excerpt_length( $length ) {
    return 55; 
}
add_filter( 'excerpt_length', 'twpp_change_excerpt_length', 999 );


// 省略記号[…]の変更
function wpdocs_excerpt_more($more) {
    return '';
}
add_filter('excerpt_more', 'wpdocs_excerpt_more');
