$(function(){
    if (window.innerWidth < 1000) {
        $('.reviews__box').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
        });
    };
})