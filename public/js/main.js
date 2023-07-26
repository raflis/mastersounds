var base = location.protocol+'//'+location.host;
var route = document.getElementsByName('routeName')[0].getAttribute('content');
var csrf_token = document.getElementsByName('csrf-token')[0].getAttribute('content');

$(function(){

  $('[data-bs-toggle="tooltip"]').tooltip(); 
  

  $(window).on("scroll", function() {
    if($(window).scrollTop())
    {
        $('#header').css('background', 'rgba(0, 0, 0, .8)');
        $('#header').addClass('shadow');
    }else
    {
        $('#header').css('background', 'rgba(0, 0, 0, .0)');
        $('#header').removeClass('shadow');
    }
  })

  $("input[name=telephone]").bind("change keyup input", function() {
    var position = this.selectionStart - 1;
    var fixed = this.value.replace(/[^0-9]/g, "");

    if (this.value !== fixed) {
      this.value = fixed;
      this.selectionStart = position;
      this.selectionEnd = position;
    }
  });

  $('#btn-infografia').on('click', function(e){
    e.preventDefault();
    $('input[name=name]').focus();
  });


  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        } else{ // for me
          form.classList.add('submitted'); // for me
          $('input[type=submit]').attr('value', 'Enviando ...');
          $('input[type=submit]').attr('disabled', true);
          $(this).find(':submit').html('<i class="fa fa-spinner fa-spin"></i> Enviando ...');
          $(this).find(':submit').attr('disabled', true);
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);


  $(window).on("scroll", function() {
    if($(window).scrollTop())
    {
        $('.header_top').addClass('d-none');
        $('.header2').addClass('header2_down');
        $('.header').addClass('shadow');
        $('.sec1').addClass('padding-sec1-9');
        $('.sec9').addClass('padding-sec1-9');
    }else
    {
        console.log('top');
        $('.header_top').removeClass('d-none');
        $('.header2').removeClass('header2_down');
        $('.header').removeClass('shadow');
        $('.sec1').removeClass('padding-sec1-9');
        $('.sec9').removeClass('padding-sec1-9');
    }
  })

  $('.burgergg').on('click',function(){
      if($('.content-list').hasClass('nav-mobile-active'))
      {
          $('.content-list').removeClass('nav-mobile-active');
      }else
      {
          $('.content-list').addClass('nav-mobile-active');
      }
      if($('.linea1').hasClass('toggle1')){$('.linea1').removeClass('toggle1');}else{$('.linea1').addClass('toggle1');}
      if($('.linea2').hasClass('toggle2')){$('.linea2').removeClass('toggle2');}else{$('.linea2').addClass('toggle2');}
      if($('.linea3').hasClass('toggle3')){$('.linea3').removeClass('toggle3');}else{$('.linea3').addClass('toggle3');}
  });

  

})