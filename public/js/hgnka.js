$(document).ready(function(){
    $('.menu-toggle').click(function(){
        $('.menu-toggle').toggleClass('active')
        $('nav').toggleClass('active')
    })
});

$(function(){
	$('.autoplay').slick({
		infinite:true,
		slidesToShow: 3,
        slidesToScroll: 1,
		arrows:false,
		autoplay: true,
		autoplaySpeed: 2800,
		dots: false,
		centerModel:true,
        centerPadding:'60px',
        responsive: [
            {
                settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
            },
            {
                breakpoint: 480,
                settings: {
                slidesToShow: 1,
                slidesToScroll: 1
                }
            }
        ],
	});
});
$('.buy').click(function(){
    $('.bottom').addClass("clicked");
  });
  
  $('.remove').click(function(){
    $('.bottom').removeClass("clicked");
  });


  