$(function(){
    $('.our_work__slider').slick({
        infinite: true,
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

    $('.our_work__grid').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
    });
});