$(function(){
    $("#tariffs-slider").slick({
        infinite: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        
        arrows: true,
        prevArrow: $('.tariffs .slider-navigation .arrow.prev'),
        nextArrow: $('.tariffs .slider-navigation .arrow.next'),

        dots: true,
        appendDots: $('.tariffs .slider-navigation .dots-container'),
        responsive: [
            {
                breakpoint: 1100,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    autoplay: true,
                    autoplaySpeed: 3000,
                    slidesToShow: 1,
                }
            }
        ]
    })

    $('body').on('click', '.work-stages .stage-btn', function(event){
        event.preventDefault()

        $('.work-stages .stage-btn').removeClass('active');
        $(this).addClass('active');

        let stage_count = $(this).data('stage_count');
        $('.stages-container .stage').each(function(){
            if( $(this).data('stage_count') == stage_count ){
                $(this).addClass('active');
            }else{
                $(this).removeClass('active');
            }
        });
    })

});