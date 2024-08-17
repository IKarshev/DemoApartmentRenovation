$(function(){
    $('.our_work__slider').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        speed: 1000,
        responsive: [
            {
                breakpoint: 768,
                settings: "unslick",
            }
        ],
    });

    if (window.innerWidth < 768) {
        $('.our_work__grid').slick({
            infinite: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
        });
    }

});