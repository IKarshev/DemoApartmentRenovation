$(function(){
    $('.stock__box').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        responsive: [
            {
            breakpoint: 1000,
            settings: {
                slidesToShow: 1,
                dots: false,
            }
            }
        ]
    });
})