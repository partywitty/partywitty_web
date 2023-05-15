@include("artist.include.head")
@include("artist.include.header")

<!-- <div class="back--btn">
    <a href="{{url('referral_code')}}">
        <img src="{{url('')}}/public/assets/img/back.png" alt="">
    </a>
</div> -->

<section class="artist_hire--section">
    <div class="main--box art--list">
        <div class="back--btn">
            <a href="javascript:void(0);">
                <img src="{{url('')}}/public/assets/img/back.png" alt="">
            </a>
        </div>
        <div class="box--c">
            <h3>Solo</h3>
            <form action="" id="artist_submit" method="post">          
                <div class="search--box">
                    <input type="search" class="form-control" id="search" placeholder="Enter the type of artist...">
                    <a href="javascript:void(0);"> <span class="times--icon"></span></a>
                </div>
                <div class="selected--box">
                    <div class="select--type">
                        <span>Musician</span>
                        <a href="javascript:void(0);" class="times--icon remove"></a>
                    </div>
                </div>
                <div class="artist--type--box">
                    <a href="javascript:void(0);" class="artist--type">
                        <span>Musician</span>
                    </a>
                    <a href="javascript:void(0);" class="artist--type">
                        <span>band</span>
                    </a>
                    <a href="javascript:void(0);" class="artist--type">
                        <span>Dj</span>
                    </a>
                </div>
                <div class="login--button--bx">
                    <button type="submit" class="lg--btn--theame">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@include("artist.include.foot")


<script>
    bodyClass('artist--list');
</script>