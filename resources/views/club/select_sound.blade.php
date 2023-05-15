@include('club.include.head')
<div class="back--btn">
    <a href="{{url('club-profile-info')}}">
        <img src="{{url('')}}/public/assets/img/back.png" alt="">
    </a>
</div>
<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="box--c intro">
            <!-- <h3>Intro Message in words </h3> -->
            <form action="">
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="" class="club--lable">Sound Availability in House</label>
                        <div class="inline--radio">
                            <label for="">
                                yes
                                <input type="radio" class="radio--btn" name="sound_ava">
                            </label>
                            <label for="">
                                no
                                <input type="radio" class="radio--btn" name="sound_ava">
                            </label>
                        </div>
                    </div> 
                </div>    
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="" class="club--lable">Sound Engineer in House</label>
                        <div class="inline--radio">
                            <label for="">
                                yes
                                <input type="radio" class="radio--btn" name="sound_engg">
                            </label>
                            <label for="">
                                no
                                <input type="radio" class="radio--btn" name="sound_engg">
                            </label>
                        </div>
                    </div> 
                </div>    
                <div class="login--button--bx mt-8">
                    <a href="manager_number.php" class="lg--btn--theame">Submit</a>
                </div>                  
            </form>
           
        </div>
    </div>
</section>
@include('club.include.foot')
<script>
bodyClass('club--list');
</script>