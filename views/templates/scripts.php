<script src="js/vendor/modernizr-2.8.3.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/wow.min.js"></script>

<script src="js/sweetalert.min.js"></script>
<script src="js/smooth-scroll.min.js"></script>
<script src="js/jquery.backstretch.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/swiper.jquery.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/ekko-lightbox.min.js"></script>
<script type="text/javascript">
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });

</script>

<script type="text/javascript">
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        effect: 'flip',
        grabCursor: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev'
    });

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
