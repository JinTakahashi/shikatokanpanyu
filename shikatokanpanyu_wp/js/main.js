$(document).ready(function() {

    var ham = $('.hamburger');
    var nav = $('.nav');

    // ハンバーガーメニューのクリックに対する挙動
    ham.click(function() {
        var span = $(this).find('span');

        if(span.hasClass('active')) {
            nav.removeClass('active');
        } else {
            nav.addClass('active');
        }

        span.toggleClass('active');
    });

    
    // ページ内リンク
    $('a[href^="#"]').click(function(){
        var speed = 500;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var headerHeight = $('header').height();
        var position = target.offset().top - headerHeight;

        $('.hamburger span').removeClass('active');
        nav.removeClass('active');
        $("html, body").animate({scrollTop:position}, speed, "swing");
        return false;
    });


        // レスポンシブ
        $(document).ready(function() {
            var winW = $(window).width();
            var nowW = 900;
            if (winW <= nowW) {
                // windowが900px未満の時
                // top
                $('.top__item01').attr('src', templateDirectoryUri + '/img/top01.jpg');
                $('.top__item02').attr('src', templateDirectoryUri + '/img/top02.jpg');
                $('.top__item03').attr('src', templateDirectoryUri + '/img/top03.jpg');
                $('.top__item04').attr('src', templateDirectoryUri + '/img/top04.jpg');
    
                // concept
                $('.slide__img01').attr('src', templateDirectoryUri + '/img/concept06.jpg');
                $('.slide__img02').attr('src', templateDirectoryUri + '/img/concept02.jpg');
                $('.slide__img03').attr('src', templateDirectoryUri + '/img/concept03.jpg');
                $('.slide__img04').attr('src', templateDirectoryUri + '/img/concept04.jpg');
                $('.slide__img05').attr('src', templateDirectoryUri + '/img/concept05.jpg');
            } else {
                // windowが900px以上の時
                // top
                $('.top__item01').attr('src', templateDirectoryUri + '/img/concept-pc05.jpg');
                $('.top__item02').attr('src', templateDirectoryUri + '/img/concept-pc01.jpg');
                $('.top__item03').attr('src', templateDirectoryUri + '/img/concept-pc02.jpg');
                $('.top__item04').attr('src', templateDirectoryUri + '/img/concept-pc04.jpg');
    
                // concept
                $('.slide__img01').attr('src', templateDirectoryUri + '/img/concept-pc01.jpg');
                $('.slide__img02').attr('src', templateDirectoryUri + '/img/concept-pc02.jpg');
                $('.slide__img03').attr('src', templateDirectoryUri + '/img/concept-pc03.jpg');
                $('.slide__img04').attr('src', templateDirectoryUri + '/img/concept-pc04.jpg');
                $('.slide__img05').attr('src', templateDirectoryUri + '/img/concept-pc05.jpg');
            }
        });


    // topのカルーセル
    setInterval(function() {
        var $active = $('.top__carousel__inner img.active');
        // '?'の前が真ならば':'の前の値を返し、偽なら':'の後の値を返す
        var $next = $active.next('img').length ? $active.next('img') : $('.top__carousel__inner img:first');

        $active.fadeOut(750, function(){
            $active.removeClass('active');
        });

        $next.fadeIn(750, function() {
            $next.addClass('active');
        });
        
    }, 4000);  // 4秒毎に画像を切り替える


    // slick (conceptのカルーセル)

    $(document).ready(function() {
        setTimeout(function() {
            $(".slide__items").slick({
                // ... 設定 ...
                autoplay:true,
                slidesToShow:1,
                infinite:true,
                slidesToScroll:1,
                centerMode: true,// 前後スライドを部分表示
                centerPadding: '15%',// 両端の見切れるスライド幅
                arrows: true, // 矢印
                dots: true, // インジケーター
            });
        }, 500);  // 500ミリ秒後に実行
    });


    // seatsのカルーセル
    var interval;
    
    // 時限式の画像切り替え
    function startCarousel() {
        interval = setInterval(function() {
            var $active = $('.seats__carousel__inner img.active');
            var $next = $active.next('img').length ? $active.next('img') : $('.seats__carousel__inner img:first');

            $active.fadeOut(1000, function(){
                $active.removeClass('active');
            });

            $next.fadeIn(1000, function() {
                $next.addClass('active');
            });
        }, 5000);  // 5秒毎に画像を切り替える
    }
    
    startCarousel();
    
    
    // 矢印をクリックしたら画像が切り替わる
    function switchImage($imageToShow) {
        clearInterval(interval);  // インターバルをクリア

        $('.seats__carousel__inner img').fadeOut(1000, function() {
            $(this).removeClass('active');
        });
    
        $imageToShow.fadeIn(1000, function() {
            $(this).addClass('active');
        });

        startCarousel();  // カルーセルを再開
    }
    
    $('.arrow__prev').click(function() {
        var $active = $('.seats__carousel__inner img.active');
        var $prev = $active.prev('img').length ? $active.prev('img') : $('.seats__carousel__inner img:last');

        switchImage($prev);
    });
    
    $('.arrow__next').click(function() {
        var $active = $('.seats__carousel__inner img.active');
        var $next = $active.next('img').length ? $active.next('img') : $('.seats__carousel__inner img:first');

        switchImage($next);
    });

    // buttonをhoverしたら変化
    $('.more__button').hover(
        function() {
            $(this).css({'background-color':'#A07815'});
            $(this).find('span').css({'color':'#fff'});
        },
        function() {
            $(this).css({'background-color':'#fff'});
            $(this).find('span').css({'color':'#A07815'});
        }
    );
});