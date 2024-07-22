$(function(){
    new WOW().init();

    $('.header__navbar .item, .banner__list').click(function(){
        var target = $(this).attr('href');
        $('html, body').animate({scrollTop: $(target).offset().top - $('.header.fixed').height() - 20}, 800);
        return false; 
    });

    $(".header__burgir").click(function() {
        $(".header__wrap").toggleClass("open");
        $(".header__navbar .item").click(function() {
            $(".header__wrap").removeClass("open");
            $(".header__burgir").removeClass("rotate");
            setTimeout(function() {
                $(".header__burgir").removeClass("active");
            }, 300);
        });
        if($(".header__burgir").hasClass("active")) {
            $(".header__wrap").removeClass("open");
            $(".header__burgir").removeClass("rotate");
            setTimeout(function() {
                $(".header__burgir").removeClass("active");
            }, 300);
        } else {
            $(".header__wrap").addClass("open");
            $(".header__burgir").addClass("active");
            setTimeout(function() {
                $(".header__burgir").addClass("rotate");
            }, 300);
        }
    });

    $(window).scroll(function(){
        if ( $(this).scrollTop() > 100) {
            $('.besamogas').css({bottom : '20px'});
            $('.header').addClass("fixed");
        } else {
            $('.besamogas').css({bottom : '-100%'});
            $('.header').removeClass("fixed");
        }
    });
    $('.besamogas').on('click', function(){
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });

    // modal
    $(".open_modal").click(function() {
        $(".modal").addClass("active");
        setTimeout(function() {
            $(".modal").addClass("opacity");
        }, 1);
    });
    $(".modal .close").click(function() {
        $(".modal").removeClass("opacity");
        setTimeout(function() {
            $(".modal").removeClass("active");
        }, 500);
    });
});