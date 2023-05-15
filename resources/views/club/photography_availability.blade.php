@include('club.include.head')
@include('artist.include.header')

<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="back--btn">
            <a href="{{url('floor')}}">
                <img src="{{url('public/assets/img/back.png')}}" alt="">
            </a>
        </div>
        <div class="box--c intro">
            <!-- <h3>Intro Message in words </h3> -->
            <form action="{{url('submit-photography')}}" method="post">
                @csrf
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="" class="club--lable">Photographer Availability</label>
                        <div class="inline--radio">
                            <label for="">
                                yes
                                <input type="radio" class="radio--btn" value="yes" name="photographer" required>
                            </label>
                            <label for="">
                                no
                                <input type="radio" class="radio--btn" value="no" name="photographer">
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