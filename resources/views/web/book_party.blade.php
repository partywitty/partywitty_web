@include('web.include.head')
@include('web.include.header')
<section class="book-artist-section">
    <div class="main--box">
        <div class="wrapper--box">
            <div class="left--box">
                <div class="img--box">
                    <img src="{{ url('') }}/public/user/assets/img/club_img.png" alt="">
                </div>
            </div>
            <div class="right--box">
                <h2>CLUB </h2>
                <p>We know how dearly you love your restaurant or a club. We also know you are missing the sight of your
                    guests with all their hands up in the air. We are here to set your club’s celebration mode on and
                    give you a chance to connect with town’s best artists, bands and musicians.
                    <!-- <a href="javascript:void(0);">Read more</a> -->
                </p>
                <div class="button--box">
                    <a href="{{ url('book-club') }}" class="btn--theame--2">Book An Artist</a>
                </div>
            </div>
        </div>
        <div class="wrapper--box">
            <div class="right--box">
                <h2>PRIVATE PARTY</h2>
                <p>Be it a home gathering with limited guests or a huge gathering at the banquet, Party Witty handholds
                    you during special moments of your life. We provide a complete entertainment solution right from
                    giving you artist options till making your celebration special with the chosen artists’ performance.
                </p>
                <div class="button--box">
                    <a href="{{ url('book-private') }}" class="btn--theame--2">Book An Artist</a>
                </div>
            </div>
            <div class="left--box">
                <div class="img--box">
                    <img src="{{ url('') }}/public/user/assets/img/private_party.png" alt="">
                </div>
            </div>
        </div>
        <div class="wrapper--box">
            <div class="left--box">
                <div class="img--box">
                    <img src="{{ url('') }}/public/user/assets/img/c_img.png" alt="">
                </div>
            </div>
            <div class="right--box">
                <h2>CORPORATE PARTY</h2>
                <p>It’s time to break the monotonous working schedules and organize a party that resets the mood of
                    corporate guests. We assist companies in finding the right artist as per the type of celebration
                    being planned. We also ensure that corporate ethics and brand image are kept intact during these
                    celebrations. </p>
                <div class="button--box">
                    <a href="{{ url('book-corporate') }}" class="btn--theame--2">Book An Artist</a>
                </div>
            </div>
        </div>
    </div>
</section>
@include('web.include.footer')
@include('web.include.foot')
