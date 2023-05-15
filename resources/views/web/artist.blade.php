@include('web.include.head')
@include('web.include.header')

<section class="about--banner artist">
    <div class="main--box">
        <div class="title--name">
            <h1>As an Artist</h1>
        </div>
    </div>
</section>

<section class="main--feacture artist">
    <div class="main--box row">
        <div class="description--box col-md-6">
            <h1>Our Mission</h1>
            <p>To increase the reach of an artist's profile and optimising their earnings with respect.</p>
            <div class="border--line"></div>
        </div>
        <div class="description--box col-md-6">
            <h1>Our Vission</h1>
            <p>To bring the best value proposition for an artist by channelizing the idea of newtworking.</p>
            <div class="border--line"></div>
        </div>
        <div class="description--box">
            <h1>Benefits for an Artist</h1>
            <p>We at <a href="www.partywitty.com">Party Witty</a> are Primary focused and driven towards an objective to
                enhance the experience for an Artist.
                <br>
                <br>
                Problem solving motive towards the points that comes across as challenges for the artist on regular
                basis, we have come here as a solution to all those highlighted problems.
            </p>

        </div>

        <div class="grid--box">
            <div class="benefit--box">
                <img src="{{ url('') }}/public/user/assets/img/icon_1.png" alt="">
                <h5>DIRECT BOOKING</h5>
                <p>All the shows and gigs will be booked real time along with the features of calendarization to have a
                    organised work flow for an Artist at <a href="www.partywitty.com">Party witty</a></p>
            </div>
            <div class="benefit--box">
                <img src="{{ url('') }}/public/user/assets/img/icon_2.png" alt="">
                <h5>UNLIMITED GIGS</h5>
                <p>Artist is not limited to countable gigs a months, it can be optimised by the number of days he has
                    his calendar available with <a href="www.partywitty.com">Party witty</a></p>
            </div>
            <div class="benefit--box">
                <img src="{{ url('') }}/public/user/assets/img/icon_3.png" alt="">
                <h5>REFERRAL EARNING</h5>
                <p>Growth is not just limited to the number of shows done by the artist booked through <a
                        href="www.partywitty.com">Party witty</a>
                    An additional benefit for the fellow artist can be capitalized.
                </p>
            </div>
            <div class="benefit--box">
                <img src="{{ url('') }}/public/user/assets/img/icon_4.png" alt="">
                <h5>PROFILE SHOWCASE</h5>
                <p>Achievement and awards will be highlighted and showcase at the elevated platform through <a
                        href="www.partywitty.com">Party witty</a> application </p>
            </div>
            <div class="benefit--box">
                <img src="{{ url('') }}/public/user/assets/img/icon_5.png" alt="">
                <h5>TIMELY PAYOUT</h5>
                <p>Challenge of payout being delayed and risk of not getting the payment at all will be 100%
                    eliminated.. at <a href="www.partywitty.com">Party witty</a>
                    All the payment will be made digitally and with seamless flow.
                </p>
            </div>
            <div class="benefit--box">
                <img src="{{ url('') }}/public/user/assets/img/icon_6.png" alt="">
                <h5>AUTOMATIC RATES ENHANCEMENT</h5>
                <p>Growth of an artist is directly proportional to the performance and its review. We shall promote the
                    artist with the precise algorithm designed at the back to end to digitally enhance the price for the
                    artist at the dynamic platform -<a href="www.partywitty.com">Party witty</a> </p>
            </div>
        </div>
        <div class="description--box">
            <h1>Join with us today</h1>
            <!-- <p>Our primary goal is developing a secure and customizable theme framework that meets the needs of the end web. Therefore, our customers are able to create websites using our templates as easy as 1-2-3! This process requires minimum knowledge of WordPress and coding, and extended documentation and our Support Team is always at your service. However, we ask you to keep in mind that sometimes issues occur not because of templates malfunction. There might be situations when it doesn’t depend on us and the framework.</p> -->
            <div class="row">
                <div class="col-md-12 text-center sticky--btn--center">
                    <!-- <button type="button" class="btn--theame--2">Join Now</button> -->
                    <a href="{{ url('signup') }}" class="btn--theame--2 sticky">Join Now</a>
                </div>
            </div>
        </div>
    </div>
</section>



@include('web.include.footer')
@include('web.include.foot')
