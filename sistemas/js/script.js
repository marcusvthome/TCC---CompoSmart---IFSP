(function ($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function (e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function () {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };

    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function () {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function (e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 2000, 'easeInOutExpo');
    e.preventDefault();
  });

  

  //Exibir ocultar senha
  $('.btnTogglePassword').click(function () {
    if ($(this).parent().find('input').attr('type') == 'text') {
      $(this).parent().find('.btnTogglePassword i').addClass('fa-eye-slash');
      $(this).parent().find('.btnTogglePassword i').removeClass('fa-eye');
      $(this).parent().find('input').attr('type', 'password');
    } else {
      $(this).parent().find('.btnTogglePassword i').addClass('fa-eye');
      $(this).parent().find('.btnTogglePassword i').removeClass('fa-eye-slash');
      $(this).parent().find('input').attr('type', 'text');
    }
  });

  //Exibir campo de senha no form de atualização
  $('#btnNovaSenha').click(function () {
    $('#txtSenha').val("");
    $(this).addClass('d-none');
    $(this).parent().find('input').addClass('obrigatorio');
    $('div.confirm-senha').find('input').addClass('obrigatorio');
    $(this).parent().find('input').removeClass('d-none');
    $('div.confirm-senha').removeClass('d-none');
    $('.btnTogglePassword').removeClass('d-none');
  });


  function verificaCamposVazios(campos) {
    var contagem = 0;
    for (var i = 0; i < campos.length; i++) {
      var campo = campos[i];
      $(campo).removeClass('is-invalid');
      $(campo).parent().removeClass('validacao');
      if (campo.value == '') {
        $(campo).addClass('is-invalid');
        $(campo).parent().addClass('validacao');
        contagem++;
      }
    }
    if (contagem > 0)
      return false;
    else
      return true;
  }

  //Chama a validação antes de enviar o form
  $('#btnVeriEnviar').click(function () {
    $("#txtConfirmSenha").removeClass('is-valid');

    var camposPreenchidos = false;
    camposPreenchidos = verificaCamposVazios($('form .obrigatorio'));
    if (camposPreenchidos == true) {
      $(this).parents('form').submit();
    }
    else {
      $('a.scroll-to-top').click();
    }
  });

  //Confirmação de senha
  function confirmSenha() {
    var campo = $("#txtConfirmSenha");

    if (campo.val() == "") {
      campo.parent().removeClass('validacao');
      campo.removeClass('is-valid');
      campo.removeClass('is-invalid');
      campo.parent().parent().find('.invalid-feedback').removeClass('d-block');
      campo.parents('.form-row').parent().find('#btnVeriEnviar').attr('disabled', 'true');
      return;
    }

    campo.parent().addClass('validacao');
    if (campo.val() != $("#txtSenha").val()) {
      campo.removeClass('is-valid');
      campo.addClass('is-invalid');
      campo.parent().parent().find('.invalid-feedback').addClass('d-block');
      campo.parents('.form-row').parent().find('#btnVeriEnviar').attr('disabled', 'true');
    }
    else {
      campo.removeClass('is-invalid');
      campo.addClass('is-valid');
      campo.parent().parent().find('.invalid-feedback').removeClass('d-block');
      campo.parents('.form-row').parent().find('#btnVeriEnviar').removeAttr('disabled');
    }
  }

  $("#txtSenha").keyup(function () {
    $(this).parents('.form-row').parent().find('#btnVeriEnviar').attr('disabled', 'true');
    confirmSenha();
  });
  $("#txtConfirmSenha").keyup(function () {
    confirmSenha();
  });
  
})(jQuery); // End of use strict


