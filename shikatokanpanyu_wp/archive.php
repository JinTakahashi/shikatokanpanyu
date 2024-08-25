<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <?php get_header(); ?>

</head>

<body <?php body_class(); ?>>
    <!-- header -->
    <?php get_template_part('includes/header'); ?>

    <!-- modal -->
    <nav class="nav">
        <ul class="nav__items">
            <li class="nav__items__item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/index.php#concept">CONCEPT</a></li>
            <li class="nav__items__item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/index.php#news">NEWS</a></li>
            <li class="nav__items__item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/index.php#menu">MENU</a></li>
            <li class="nav__items__item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/index.php#seats">SEATS</a></li>
            <li class="nav__items__item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/index.php#reservation">RESERVATION</a></li>
            <li class="nav__items__item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/index.php#contact">CONTACT</a></li>
            <li class="nav__items__item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>/index.php#access">ACCESS</a></li>
            <li class="nav__items__item"><a href="//shikatokanpanyu.com/sfbe/sfb.html">SFB/湘南藤沢弁当</a></li>
        </ul>
        <div class="socials">
            <a href="//www.instagram.com/shika10campagne/"><img src="<?php echo esc_url( get_template_directory_uri() . '/img/instagram.svg' ); ?>" alt="インスタグラム"></a>
            <a href="//twitter.com/sfbe4108"><img src="<?php echo esc_url( get_template_directory_uri() . '/img/twitter.svg' ); ?>" alt="ツイッター"></a>
        </div>
    </nav>

    <section class="single-top">
        <h2>NEWS</h2>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/news-img.jpg' ); ?>" alt="背景画像">
    </section>

    <section class="news-list">
        <?php if (have_posts()) :  ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="news-list__post__container">
                    <a href="<?php the_permalink(); ?>" class="news-list__post">
                        <p class="news-list__post__date"><?php the_time(get_option('date_format')); ?></p>
                        <h3 class="news-list__post__title"><?php the_title(); ?></h3>
                        <p class="news-list__post__text">
                            <?php the_excerpt(); ?>
                        </p>
                    </a>
                </div>
            <?php endwhile; ?>

            <!-- Pager -->
            <?php
            $args = array(
                'mid_size' => 1,
                'prev_text' => '&lt;前へ',
                'next_text' => '次へ&gt;',
                'screen_reader_text' => ' ',
            );
            the_posts_pagination($args);
            ?>
        <?php else : ?>
            <p>記事が見つかりませんでした。</p>
        <?php endif; ?>
    </section>
    
    <!-- bgimg-container -->
    <?php get_template_part('includes/bgimg-container'); ?>

    <!-- footer -->
    <?php get_template_part('includes/footer'); ?>

    <?php get_footer(); ?>
</body>

</html>