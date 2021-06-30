$(document).ready(function(){
    
    $('[data-toggle="tooltip"]').tooltip();

});

$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,

    asNavFor: '.slider-nav'
   });
   $('.slider-nav').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    vertical: true,
    dots: false,
    arrows: false,
    focusOnSelect: true
   });

   $('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
    if(type == 'minus') {
    
    if(currentVal > input.attr('min')) {
    input.val(currentVal - 1).change();
    }
    } else if(type == 'plus') {
    if(currentVal < input.attr('max')) {
    input.val(currentVal + 1).change();
    }
    }
    } else {
    input.val(1);
    }
    });