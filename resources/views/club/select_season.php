<?php include("../include/head.php")?>
<?php //include("include/header.php")?>


<div class="back--btn">
    <a href="projector_screen.php">
        <img src="../assets/img/back.png" alt="">
    </a>
</div>
<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="box--c intro">
            <!-- <h3>Intro Message in words </h3> -->
            <form action="">
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="" class="club--lable">Do u show live matches during the season</label>
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
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="" class="club--lable">Dj availability </label>
                        <div class="inline--radio">
                            <label for="">
                                yes
                                <input type="radio" class="radio--btn" name="df_ava">
                            </label>
                            <label for="">
                                no
                                <input type="radio" class="radio--btn" name="df_ava">
                            </label>
                        </div>
                    </div> 
                </div>    
                <div class="login--button--bx mt-8">
                    <a href="select_ds.php" class="lg--btn--theame">Submit</a>
                </div>                  
            </form>
           
        </div>
    </div>
</section>


<?php include("../include/foot.php")?>
<script>
bodyClass('club--page');
</script>