<script src="js/bundle.js"></script>
<script src="js/vendor/modernizr-2.8.3.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();
    $('#products .items').addClass('list-group-item col-lg-12');});
    $('#grid').click(function(event){event.preventDefault();
    $('#products .items').removeClass('list-group-item col-lg-12');
    $('#products .items').addClass('grid-group-item');});
});
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

<script src="js/wow.min.js"></script>
<script src="js/smooth-scroll.min.js"></script>
<script src="js/jquery.backstretch.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/swiper.jquery.min.js"></script>
<script src="js/ekko-lightbox.min.js"></script>
<script src="js/sitio.js"></script>
