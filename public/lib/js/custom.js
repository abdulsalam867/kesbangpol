$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
    autoplay: true,
    items: 1,
    loop: true,
    margin: 25,
    nav: false,
    dots: false,
    slideSpeed: 500,
    singleItem:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});
  var owl = $('.owl-carousel');
  owl.owlCarousel();
// Go to the next item
$('.owl-next').click(function() {
    owl.trigger('next.owl.carousel');
})
// Go to the previous item
$('.owl-prev').click(function() {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl.trigger('prev.owl.carousel', [300]);
});

});