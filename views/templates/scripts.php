

<script src="<?php echo PUBLIC_; ?>js/jquery.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/bootstrap.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/popper.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/tether.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/owl.carousel.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/wow.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/sweetalert.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/smooth-scroll.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/jquery.backstretch.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/swiper.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/swiper.jquery.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/ekko-lightbox.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/fullpage.min.js"></script>
<script src="<?php echo PUBLIC_; ?>js/jquery.fancybox.min.js"></script>

<script>
    var myFullpage = new fullpage('#fullpage', {
        verticalCentered: true,
        anchors: ['firstPage', 'secondPage', '3rdPage'],
       // sectionsColor: ['#C63D0F', '#1BBC9B', '#7E8F7C'],
        navigationPosition: 'left',
        navigation: true,
        css3:false
    });
</script>
<script  type="text/javascript">
// new SimpleBar(document.getElementById('history'), { autoHide: false });
</script>

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
