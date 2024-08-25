    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name=”description” content=”神奈川県湘南藤沢の仲間と手作りした一軒家レストランです。北海道の大自然の中で育った蝦夷鹿肉と、無農薬、無肥料で育てられた有機野菜を使った料理を提供しています。” />
    <title>
        <?php wp_title(' '); ?>
        <?php if(wp_title(' ', false)) { echo ' | '; } ?>
        <?php bloginfo('name'); ?>
    </title>
    

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/css/style.css' ); ?>">

    <!-- slick CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">

    
    <?php wp_head(); ?>