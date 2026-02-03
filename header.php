<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>MIHO YAMAMOTO Portfolio</title> <!-- ブラウザのタブなどに表示するタイトル -->
    <meta name="description" content="山本美穂のポートフォリオ"> <!-- サイトの説明文 -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0"> <!-- viewportの設定 -->
    <meta name="format-detection" content="telephone=no,email=no,address=no"> <!-- 自動リンクを無効にする  iOS（iPhone や iPad の Safari） に対して指示を出すための meta タグ-->
    <link rel="canonical" href="<?php echo esc_url( home_url( add_query_arg( null, null ) ) ); ?>"> <!-- URLの正規表現 -->
    <link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>favicon.ico"> <!-- ファビコンの設定 -->
    <link rel="apple-touch-icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/img/icon.png"> <!-- スマホのホームに追加したときのアイコン -->
	<?php wp_head(); ?>
	</head>

  <body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
  <!-- START Header Area -->
    <header class="header">
      <div class="innerWidth flex">
        <a href="http://miho-yamamoto-portfolio.local/" class="header__logoLink">
            <div class="header__logoImage">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/cafe.png" alt="">
            </div>
            <h1 class="header__logoTittle">
                <span class="header__name">MIHO YAMAMOTO</span>
                PORTFOLIO
                <span class="header__disc">Web Designer & Front-end Developer</span>
            </h1>
        </a>
        <div class="header__nav">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'global-menu',
							'container' => false,
						) );
					?>
				</div>
        <!-- ハンバーガーボタン -->
        <div class="header__hamburger js-headerHamburger">
          <span class="header__hamburgerLine"></span>
          <span class="header__hamburgerLine"></span>
          <span class="header__hamburgerLine"></span>
        </div>

        <!-- SPナビゲーション -->
        <nav class="header__spNav js-headerSpNav">
          <?php
            wp_nav_menu( array(
              'theme_location' => 'sp-menu',
              'container'      => false,
            ) );
          ?>
        </nav>
      </div>
    </header>
    <!-- END Header Area -->