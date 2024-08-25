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
            <li class="nav__items__item"><a href="<?php echo esc_url( "//shikatokanpanyu.com/sfbe/sfb.html" ); ?>">SFB/湘南藤沢弁当</a></li>
        </ul>
        <div class="socials">
            <a href="<?php echo esc_url( "//www.instagram.com/shika10campagne/" ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/img/instagram.svg' ); ?>" alt="インスタグラム"></a>
            <a href="<?php echo esc_url( "//twitter.com/sfbe4108" ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/img/twitter.svg' ); ?>" alt="ツイッター"></a>
        </div>
    </nav>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <section class="single-top">
                <h2><?php the_title(); ?></h2>
                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/news-img.jpg' ); ?>" alt="背景画像">
            </section>

            <section class="news-single">
                <div class="news-single__post__container">
                    <div class="news-single__post">
                        <p class="news-single__post__date"><?php the_time(get_option('date_format')); ?></p>
                        <h3 class="news-single__post__title"><?php the_title(); ?></h3>
                        <p class="news-single__post__text">
                            <?php the_content(); ?>
                        </p>
                    </div>
                </div>
            </section>
            
        <?php endwhile; ?>
    <?php endif; ?>

    <!-- bgimg-container -->
    <?php get_template_part('includes/bgimg-container'); ?>

    <?php get_template_part('includes/footer'); ?>

    <?php get_footer(); ?>
</body>

</html>