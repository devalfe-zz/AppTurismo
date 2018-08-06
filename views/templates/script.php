<script src="<?php echo PUBLIC_; ?>js/app.js"></script>
<script src="<?php echo PUBLIC_; ?>js/vendor/modernizr-2.8.3.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/jquery.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/bootstrap.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/popper.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/owl.carousel.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();
    $('#products .items').addClass('list-group-item col-lg-12');});
    $('#grid').click(function(event){event.preventDefault();
    $('#products .items').removeClass('list-group-item col-lg-12');
    $('#products .items').addClass('grid-group-item');});
});
</script>

<<script>
    $('.fly').owlCarousel({
    loop: true,
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        items:1,
        margin:10,
        nav: true,
        stagePadding:30,
        smartSpeed:450,
        autoplay:true,
        //autoplayTimeout:1000,
        autoplayHoverPause:true,
        autoHeight:true
    });
</script>

<script type="text/javascript">
    $('.owl-card').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        autoWidth: false,
        navText: ['<i class="fa fa-arrow-circle-left" title="Anterior"></i>', '<i class="fa  fa-arrow-circle-right" title="Siguiente"></i>'],
        responsive: {
            0: {
                items: 1
            },
            500: {
                items: 2,
                margin: 20
            },
            800: {
                items: 3,
                margin: 20
            },
            1000: {
                items: 4,
                margin: 20
            }
        }
    })

</script>

<script type="text/javascript">
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        autoWidth: false,
        navText: ['<i class="fa fa-arrow-circle-left" title="Anterior"></i>', '<i class="fa  fa-arrow-circle-right" title="Siguiente"></i>'],
        responsive: {
            0: {
                items: 1
            },
            500: {
                items: 2,
                margin: 20
            },
            800: {
                items: 3,
                margin: 20
            },
            1000: {
                items: 4,
                margin: 20
            }
        }
    })

</script>

<script type="text/javascript">
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

</script>

<script type="text/javascript">
     $(window).load(function(){
   $('#myModal').modal('show');
    });
</script>

<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-23030813-2', 'auto');
    ga('send', 'pageview');

</script>
<script>
    $(document).ready(function(){
        $('.panel').click(function(){
            if ($(this).hasClass('open')) {
                $(this).removeClass('open');
            } else {
                $('.panels').children().removeClass('open');
                $(this).addClass('open');
            }
        });
    });
</script>
<script src="<?php echo PUBLIC_; ?>js/wow.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/smooth-scroll.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/jquery.backstretch.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/swiper.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/swiper.jquery.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/ekko-lightbox.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/sitio.js"></script>
