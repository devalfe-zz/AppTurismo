new WOW().init();

/*----------------------------------
Iniciamos smoothScroll (Scroll Suave)
--------------------------------*/
smoothScroll.init({
    speed: 1000, // Integer. How fast to complete the scroll in milliseconds
    offset: 60, // Integer. How far to offset the scrolling anchor location in pixels

});

/*---------------------------------
    OCULTAR Y MOSTRAR BOTON IR ARRIBA
 ----------------------------------*/
$(function() {
    $(window).scroll(function() {
        var scrolltop = $(this).scrollTop();
        if (scrolltop >= 50) {
            $(".ir-arriba").fadeIn();
        } else {
            $(".ir-arriba").fadeOut();
        }
    });

});

/*---------------------------------
   CABECERA ANIMADA
 ----------------------------------*/
$(window).scroll(function() {

    var nav = $('.encabezado');
    var scroll = $(window).scrollTop();

    if (scroll >= 80) {
        nav.addClass("fondo-menu");
    } else {
        nav.removeClass("fondo-menu");
    }
});


function validarMensaje() {

    nombre = $("#nombre").val();
    mensaje = $("#mensaje").val();

    if (nombre != "") {

        var caracteres = nombre.length;
        var expresion = /^[a-zA-Z\s]*$/;

        if (!expresion.test(nombre)) {

            $("#nombre").after('<div class="alert alert-danger">No se permiten números ni caracteres especiales.</div>');

            return false;
        }

    }
    if (mensaje != "") {

        var caracteres = mensaje.length;
        var expresion = /^[a-zA-Z0-9\s]*$/;

        if (!expresion.test(mensaje)) {

            $("#mensaje").after('<div class="alert alert-danger">No se permiten caracteres especiales.</div>');

            return false;

        }


    }

    return true;

}

var Expand = (function() {
    var tile = $('.strips__strip');
    var tileLink = $('.strips__strip > .strip__content');
    var tileText = tileLink.find('.strip__inner-text');
    var stripClose = $('.strip__close');

    var expanded = false;

    var open = function() {

        var tile = $(this).parent();

        if (!expanded) {
            tile.addClass('strips__strip--expanded');
            // add delay to inner text
            tileText.css('transition', 'all .5s .3s cubic-bezier(0.23, 1, 0.32, 1)');
            stripClose.addClass('strip__close--show');
            stripClose.css('transition', 'all .6s 1s cubic-bezier(0.23, 1, 0.32, 1)');
            expanded = true;
        }
    };

    var close = function() {
        if (expanded) {
            tile.removeClass('strips__strip--expanded');
            // remove delay from inner text
            tileText.css('transition', 'all 0.15s 0 cubic-bezier(0.23, 1, 0.32, 1)');
            stripClose.removeClass('strip__close--show');
            stripClose.css('transition', 'all 0.2s 0s cubic-bezier(0.23, 1, 0.32, 1)')
            expanded = false;
        }
    }

    var bindActions = function() {
        tileLink.on('click', open);
        stripClose.on('click', close);
    };

    var init = function() {
        bindActions();
    };

    return {
        init: init
    };

}());

Expand.init();