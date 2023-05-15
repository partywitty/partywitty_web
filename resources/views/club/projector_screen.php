<?php include("../include/head.php")?>
<?php //include("include/header.php")?>


<div class="back--btn">
    <a href="seating_capacity.php">
        <img src="../assets/img/back.png" alt="">
    </a>
</div>
<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="box--c intro">
            <!-- <h3>Seating capacity</h3> -->
            <form action="">
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="" class="club--lable">Projector screen</label>
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
                <div class="login--button--bx mt-8">
                    <a href="select_season.php" class="lg--btn--theame">Submit</a>
                </div>                  
            </form>
           
        </div>
    </div>
</section>


<?php include("../include/foot.php")?>
<script>
bodyClass('club--page');
</script>