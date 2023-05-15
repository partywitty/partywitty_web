<?php include("../include/head.php")?>
<?php //include("include/header.php")?>


<div class="back--btn">
    <a href="sign_up.php">
        <img src="../assets/img/back.png" alt="">
    </a>
</div>
<section class="artist_hire--section">
    <div class="main--box">
        <div class="box--a">
            <h3>What you want</h3>
            <form action="">
                <div class="box--b">
                    <div class="check--box">
                        <label class="form-check-label" for="ch_1">I am a artist</label>
                        <input class="form-check-input" type="checkbox" value="" id="ch_1">
                    </div>
                    <!-- <div class="inline--check">
                        <label for="">I am a artist</label>
                        <input type="checkbox">
                    </div>                    -->
                </div>
                <div class="box--b">
                    <div class="check--box">
                        <label class="form-check-label" for="ch_2">I want to hire an artist</label>
                        <input class="form-check-input" type="checkbox" value="" id="ch_2">
                    </div>
                    
                </div>
                <div class="login--button--bx">
                    <a href="referral_code.php" class="lg--btn--theame">Submit</a>
                </div>    
            </form>
        </div>
    </div>
</section>


<?php include("../include/foot.php")?>
<script>
bodyClass('club--page');
</script>