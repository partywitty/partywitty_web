@include('club.include.head')
@include('artist.include.header')

<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="back--btn">
            <a href="{{url('guest-application')}}">
                <img src="{{url('/public/assets/img/back.png')}}" alt="">
            </a>
        </div>
        <div class="box--c intro">
            <!-- <h3>Intro Message in words </h3> -->
            <form action="{{url('submit-season')}}" method="post">
                @csrf
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="" class="club--lable">Do you have projector</label>
                        <div class="inline--radio">
                            <label for="">
                                yes
                                <input type="radio" class="radio--btn" name="projector_screen" value="yes" required>
                            </label>
                            <label for="">
                                no
                                <input type="radio" class="radio--btn" name="projector_screen" value="no">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="" class="club--lable">show live matches during the season</label>
                        <div class="inline--radio">
                            <label for="">
                                yes
                                <input type="radio" class="radio--btn" name="live_match_season" value="yes" required>
                            </label>
                            <label for="">
                                no
                                <input type="radio" class="radio--btn" name="live_match_season" value="no">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="login--button--bx mt-8">
                    <button type="submit" class="lg--btn--theame">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@include('club.include.foot')
<script>
    bodyClass('club--page');
</script>