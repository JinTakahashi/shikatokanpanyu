<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php get_header(); ?>
</head>

<body <?php body_class('index-page'); ?>>
    <!-- header -->
    <?php get_template_part('includes/header'); ?>

    <!-- modal -->
    <nav class="nav">
        <ul class="nav__items">
            <li class="nav__items__item"><a href="#concept">CONCEPT</a></li>
            <li class="nav__items__item"><a href="#news">NEWS</a></li>
            <li class="nav__items__item"><a href="#menu">MENU</a></li>
            <li class="nav__items__item"><a href="#seats">SEATS</a></li>
            <li class="nav__items__item"><a href="<?php echo esc_url( "//www.instagram.com/shika10campagne/" ); ?>">RESERVATION</a></li>
            <li class="nav__items__item"><a href="#contact">CONTACT</a></li>
            <li class="nav__items__item"><a href="#access">ACCESS</a></li>
            <li class="nav__items__item"><a href="<?php echo esc_url( "//shikatokanpanyu.com/sfbe/sfb.html" ); ?>">SFB/湘南藤沢弁当</a></li>
        </ul>
        <div class="socials">
            <a href="<?php echo esc_url( "//www.instagram.com/shika10campagne/" ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/img/instagram.svg' ); ?>" alt="インスタグラム"></a>
            <a href="<?php echo esc_url( "//twitter.com/sfbe4108" ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() . '/img/twitter.svg'); ?>" alt="ツイッター"></a>
        </div>
    </nav>

    <!-- top -->
    <section class="top" id="top">
        <div class="top__carousel__inner">
            <img class="item top__item01 active" src="" alt="鹿とカンパーニュの店内写真">
            <img class="item top__item02" src="" alt="鹿とカンパーニュの店内写真">
            <img class="item top__item03" src="" alt="鹿とカンパーニュの店内写真">
            <img class="item top__item04" src="" alt="鹿とカンパーニュの店内写真">
        </div>
        <div class="top__text__container">
            <p>
                蝦夷鹿肉と<br>
                有機野菜。
            </p>
            <h1>一軒家レストラン「鹿とカンパーニュ」</h1>
        </div>
    </section>

    <!-- concept -->
    <section class="concept" id="concept">
        <h2>CONCEPT</h2>
        <span>一軒家レストラン</span>

        <!-- slider -->
        <ul class="slide__items">
            <li><img class="slide__img01" src="" alt="鹿とカンパーニュの店内写真"></li>
            <li><img class="slide__img02" src="" alt="鹿とカンパーニュの店内写真"></li>
            <li><img class="slide__img03" src="" alt="鹿とカンパーニュの店内写真"></li>
            <li><img class="slide__img04" src="" alt="鹿とカンパーニュの店内写真"></li>
            <li><img class="slide__img05" src="" alt="鹿とカンパーニュの店内写真"></li>
        </ul>

        <div class="concept__text__container">
            <p>
                「鹿とカンパーニュ」は湘南藤沢にある、仲間と手作りした一軒家レストランです。<br>
                私たちは食材にこだわり、食材の生産者さまに感謝して、顔の見えるつながりを大切にしています。<br>
                「鹿とカンパーニュ」は、北海道のジビエ、蝦夷鹿肉と有機野菜を使った料理を提供しています。
                北海道の大自然の中で育った蝦夷鹿肉と、無農薬、無化学肥料で丹精を込めて、大切に育てられた野菜の素材本来の味を味わっていただきたいと思っています。
                心地よい空間の中で、お客様が食事を楽しみながら、自然、命、人とつながる時間を過ごしていただく、それが私たちのレストランです。<br>
                当店は予約制です。6人掛けのテープル席とカウンター席2席の小さなお店です。<br>
                是非、ご来店ください。
            </p>
        </div>
    </section>

    <!-- news -->
    <section class="news" id="news">
        <h2>NEWS</h2>
        <?php if (have_posts()) :  ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="news__post__container">
                    <a href="<?php the_permalink(); ?>" class="news__post">
                        <p class="news__post__date"><?php the_time(get_option('date_format')); ?></p>
                        <h3 class="news__post__title"><?php the_title(); ?></h3>
                        <p class="news__post__text">
                            <?php the_excerpt(); ?>
                        </p>
                    </a>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>記事が見つかりませんでした。</p>
        <?php endif; ?>
        <div class="news__bottom__container">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/news-img.jpg' ); ?>" alt="コーヒーの画像">
            <div class="news__more__button">
                <div class="more__button">
                    <a href="<?php echo esc_url( home_url() ); ?>/news">
                        <div class="more__button__contents">
                            <span>MORE</span>
                            <span>→</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- menu -->
    <section class="menu" id="menu">
        <h2>MENU</h2>
        <div class="menu__container">
            <?php
                $args = array(
                    'post_type' => 'menu',
                    'posts_per_page' => 100,
                    'orderby' => 'menu_order', // 追加
                    'order' => 'ASC' // 追加: 昇順にする
                );
                $query = new WP_Query($args);
            ?>
                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="menu__item">
                            <?php
                                if (has_post_thumbnail()) {
                                    $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium')[0];
                                    echo '<img src="' . $img_url . '" alt="">';
                                }
                            ?>
                            <div class="menu__item__right">
                                <h3 class="menu__item__right__title">
                                    <?php the_title(); ?>
                                </h3>
                                    
                                <?php $price = get_field('price'); ?>
                                <?php if ($price) : ?>
                                    <p class="menu__item__right__price">¥<?php echo esc_html($price); ?></p>
                                <?php endif; ?>
                                        
                                <?php $description = get_field('description'); ?>
                                <?php if ($description) : ?>
                                <p class="menu__item__right__text"><?php echo esc_html($description); ?></p>
                                <?php endif; ?>
                                            
                                <?php $option = get_field('option'); ?>
                                <?php if ($option) : ?>
                                    <h3 class="menu__item__right__title"><?php echo esc_html($option); ?></h3>
                                <?php endif; ?>
                                                
                                <?php $optionPrice = get_field('optionPrice'); ?>
                                <?php if ($optionPrice) : ?>
                                    <p class="menu__item__right__price">¥<?php echo esc_html($optionPrice); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <? else : ?>
                    <p>メニューが見つかりませんでした。</p>
                <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>

    <!-- seats -->
    <section class="seats" id="seats">
        <h2>SEATS</h2>
        <!-- slider -->
        <div class="seats__container">
            <div class="seats__carousel">
                <div class="seats__carousel__inner">
                    <img class="item active" src="<?php echo esc_url( get_template_directory_uri() . '/img/seats01.jpg'); ?>" alt="鹿とカンパーニュの店内写真">
                    <img class="item" src="<?php echo esc_url( get_template_directory_uri() . '/img/seats02.jpg'); ?>" alt="鹿とカンパーニュの店内写真">
                    <img class="item" src="<?php echo esc_url( get_template_directory_uri() . '/img/seats03.jpg'); ?>" alt="鹿とカンパーニュの店内写真">
                    <img class="item" src="<?php echo esc_url( get_template_directory_uri() . '/img/seats04.jpg'); ?>" alt="鹿とカンパーニュの店内写真">
                </div>
                <div class="seats__arrow">
                    <img class="arrow__prev" src="<?php echo esc_url( get_template_directory_uri() . '/img/s__arrow__left.png'); ?>" alt="">
                    <img class="arrow__next" src="<?php echo esc_url( get_template_directory_uri() . '/img/s__arrow__right.png'); ?>" alt="">
                </div>
            </div>
            <div class="seats__texts">
                <p>全8席</p>
                <p>カウンター席（2名）</p>
                <p>テーブル席（6名）</p>
            </div>
        </div>
    </section>

    <div class="bgimg__container">
        <!-- reservation -->
        <section class="reservation" id="reservation">
            <h2>RESERVATION</h2>
            <p>Instagram DM</p>
            <div class="more__button">
                <a href="<?php echo esc_url( "//www.instagram.com/shika10campagne/" ); ?>">
                    <div class="more__button__contents">
                        <span>DMで予約</span>
                        <span>→</span>
                    </div>
                </a>
            </div>
            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/reservation-img.jpg'); ?>" alt="背景画像">
        </section>

        <!-- contact -->
        <section class="contact" id="contact">
            <h2>CONTACT</h2>
            <a href="tel:070-9133-3955">TEL:070-9133-3955</a>
            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/contact-img.jpg'); ?>" alt="背景画像">
        </section>
    </div>

    <!-- access -->
    <section class="access" id="access">
        <h2>ACCESS</h2>
        <iframe src="<?php echo esc_url( "//www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3252.595792764499!2d139.44627017573524!3d35.39047994589105!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60185161ac0bb44d%3A0x10caf69ce49b255a!2z44CSMjUyLTA4MTUg56We5aWI5bed55yM6Jek5rKi5biC55-z5bed77yW5LiB55uu77yR77yV4oiS77yS77yW!5e0!3m2!1sja!2sjp!4v1689916374120!5m2!1sja!2sjp" ); ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <table>
            <tr>
                <td>所在地：</td>
                <td>
                    〒252-0815<br>
                    神奈川県藤沢市石川6丁目15-26<br>
                    イトーヨーカドー 湘南台店から徒歩3分<br>
                    最寄りバス停：南大山 &#40;慶應大学中高等部前行き・慶應大学本館前行き&#41;
                </td>
            </tr>
            <tr>
                <td>営業時間：</td>
                <td>水・木・金曜日<br>11:30~14:00</td>
            </tr>
        </table>
    </section>

    <!-- footer -->
    <?php get_template_part('includes/footer'); ?>

    <?php get_footer(); ?>
</body>

</html>