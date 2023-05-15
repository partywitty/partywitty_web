@include('club.include.head')
@include('artist.include.header')

<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="back--btn">
            <a href="{{url('photography-availability')}}">
                <img src="{{url('/public/assets/img/back.png')}}" alt="">
            </a>
        </div>
        <div class="box--c intro">
            <!-- <h3>Intro Message in words </h3> -->
            <form action="{{url('submit-sponsors')}}" method="post">
                @csrf
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="" class="club--lable">Do you have any sponsors for the live music</label>
                        <div class="inline--radio">
                            <label for="">
                                yes
                                <input type="radio" class="radio--btn" value="yes" name="sponsorship" required>
                            </label>
                            <label for="">
                                no
                                <input type="radio" class="radio--btn" value="no" name="sponsorship">
                            </label>
                        </div>
                    </div> 
                </div>  
                <div class="grid--box" id="sponsorname" style="display: none;">
                    <div class="flex--100">
                        <label for="" class="club--lable">Sponsor Name</label>
                        <input type="text" class="form-control" name="sponsor_name" placeholder="Write Sponsore name...">
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

<script>
    $(document).on('click', '.radio--btn', function(){
        var sponsorship = $(this).val();
        if(sponsorship == 'yes'){
            $('#sponsorname').css('display','block');
        }else{
            $('#sponsorname').css('display','none');
        }
    });
</script>