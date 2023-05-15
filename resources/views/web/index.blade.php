@include('web.include.head')
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N9W6B93" height="0" width="0"
        style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

@include('web.include.header')



<section class='c-slider'>
    <div class='c-slider-init'>
        <div class='c-slide' style='background-image:url({{ url('') }}/public/user/assets/img/slider/slider_1.png)'>
            <div class='c-slide-content'>
                <div class='c-wrap c-wrap--small first'>
                    <div class='c-slide__info'>
                        <h5 class='c-slide__secondtitle'>Top-notch event management Co. OR Your Party.Your People.Your
                            Style</h5>
                        <h3 class='c-slide__subtitle'>THE GOOD GANG</h3>
                        <p class='c-slide__body'>In a party setup, when everything seems less at the last moment, we are
                            a gang who make everything look and sound SO GREAT!</p>
                        <button class="btn--theame" type="button">PLAN MY PARTY</button>
                    </div>
                </div>
            </div>
        </div>

        <div class='c-slide'
            style='background-image:url({{ url('') }}/public/user/assets/img/slider/slider_2.png)'>
            <div class='c-slide-content second'>
                <div class='c-wrap c-wrap--small'>
                    <div class='c-slide__info'>
                        <h5 class='c-slide__secondtitle'>Essentially for posers</h5>
                        <h3 class='c-slide__subtitle'>CLICK-O-MANIA </h3>
                        <p class='c-slide__body'>Is it not just the right time to get yourself a portfolio made? We are
                            centered at making stars of the moment with professional photography & videography.</p>
                        <button class="btn--theame" type="button">PHOTO GALLERY !</button>
                    </div>
                </div>
            </div>
        </div>

        <div class='c-slide'
            style='background-image:url({{ url('') }}/public/user/assets/img/slider/slider_3.png)'>
            <div class='c-slide-content third'>
                <div class='c-wrap c-wrap--small'>
                    <div class='c-slide__info'>
                        <h3 class='c-slide__subtitle'>Binge on to Live deals on restaurants </h3>
                        <p class='c-slide__body'>What’s better than Party Witty App which brings you closer to your
                            sense of FUN. Customized deals, power packed parties, corporate gathering and more on your
                            fingertips </p>
                        <button class="btn--theame" type="button">GET THE APP !</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="slider--advertisment">
    <div class="main--box">
        <div class="slick-slider">
            <?php for($i=1; $i<=18; $i++) {?>
            <div class="element element-5">
                <img src="{{ url('') }}/public/user/assets/img/client/logo_<?= $i ?>.png" alt=""
                    class="add--slider">
            </div>
            <?php }?>

        </div>
    </div>
</section>


<div class="sticky--button">
    <button class="btn--style" id="joinus">join as</button>
</div>
<div class="url--box">
    <a href="javascript:void(0);" class="fa fa-times" id="close--btn"></a>
    <a href="{{ url('artist') }}" class="url--style">as an artist</a>
    <a href="{{ url('book-artist') }}" class="url--style">Book an Artist</a>
    <a href="{{ url('partner_with_us') }}" class="url--style">Partner with us</a>
</div>
@include('web.include.footer')
@include('web.include.foot')
<script>
    $(document).ready(function() {
        $(".url--box").hide();
        $("#joinus").click(function() {
            $(".url--box").show();
            $("#joinus").hide();
        });
        $("#close--btn").click(function() {
            $(".url--box").hide();
            $("#joinus").show();
        });
    });
</script>
