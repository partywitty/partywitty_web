@include('club.include.head')
@include('artist.include.header')

<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="back--btn">
            <a href="{{url('select-live-music')}}">
                <img src="{{url('/public/assets/img/back.png')}}" alt="">
            </a>
        </div>
        <div class="box--a">
            <!-- <h3>Intro Message in words </h3> -->
            <form action="{{url('submit-want-sponsorship')}}" method="post">
                @csrf
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="" class="club--lable">Would you be interested in sponsorship from various brands</label>
                        <div class="inline--radio">
                            <label for="">
                                yes
                                <input type="radio" class="radio--btn" value="yes" name="want_sponsorship" required>
                            </label>
                            <label for="">
                                no
                                <input type="radio" class="radio--btn" value="no" name="want_sponsorship">
                            </label>
                        </div>
                    </div> 
                </div>   
                <div class="login--button--bx mt-8">
                    <button type="submit" class="lg--btn--theame">Submit</button>
                </div> 
                <p class="para--style" >thanks for showing interest in sponsorship , our backend will call you to <a href="javascript:void(0);">share the details</a></p>                 
            </form>           
        </div>
    </div>
</section>
@include('club.include.foot')
<script>
bodyClass('club--page');
</script>