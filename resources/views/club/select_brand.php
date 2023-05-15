<?php include("../include/head.php")?>
<?php //include("include/header.php")?>


<div class="back--btn">
    <a href="select_live_music.php">
        <img src="../assets/img/back.png" alt="">
    </a>
</div>
<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="box--a">
            <!-- <h3>Intro Message in words </h3> -->
            <form action="">
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="" class="club--lable">Would u be interested in sponsorship from various brands</label>
                        <div class="inline--radio">
                            <label for="">
                                yes
                                <input type="radio" class="radio--btn" name="live_mt">
                            </label>
                            <label for="">
                                no
                                <input type="radio" class="radio--btn" name="live_mt">
                            </label>
                        </div>
                    </div> 
                </div>   
                <div class="login--button--bx mt-8">
                    <a href="fb_artist.php" class="lg--btn--theame">Submit</a>
                </div> 
                <p class="para--style" >thanks for showing interest in sponsorship , our backend will call you to <a href="javascript:void(0);">share the details</a></p>                 
            </form>
           
        </div>
    </div>
</section>


<?php include("../include/foot.php")?>
<script>
bodyClass('club--page');
</script>