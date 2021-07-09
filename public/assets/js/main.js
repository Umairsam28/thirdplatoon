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

    function ajaxifyN(d,m,u){
        if(typeof d !='string'){
          d = $.param(d);
        }
        return new Promise(function(resolve, reject) {
          var xhhtp = new XMLHttpRequest();
          xhhtp.onreadystatechange = function() {
            if (this.status == 200&&this.readyState==4){
              if(!isJSON(xhhtp.responseText)){
                throw 'Result is not in JSON format';
              } else {
                resolve(JSON.parse(xhhtp.responseText));
              }
            } else if(this.status==404){
              reject(Error('Error occured'));
            }
          };
          xhhtp.onload = function () {
              
          };
          xhhtp.open(m, u, true);
          xhhtp.setRequestHeader('X-CSRF-Token', $("meta[name='csrf-token']").attr('content'));
          xhhtp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          try {
            xhhtp.send(d)
          }catch(ex){
            reject(Error('Error occured'));
          }
        });
      }
      function isJSON(json) {
        try {
          var obj = JSON.parse(json)
          if (obj && typeof obj === 'object' && obj !== null) {
            return true
          }
        } catch (err) {}
        return false
      }