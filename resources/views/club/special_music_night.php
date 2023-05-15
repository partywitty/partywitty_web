<?php include("../include/head.php")?>
<?php //include("include/header.php")?>

<style>
    .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default {
        border: 2px solid transparent;
        background: #fff;
        font-weight: normal;
        color: #e91e63;
        border-radius: 0%;
        padding: 5px;
        outline: 1px solid #5555551f;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>


<div class="back--btn">
    <a href="live_music.php">
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
                        <label for="" class="club--lable">Special Musical Night</label>
                        <input type="text" class="form-control rd date">
                        <img src="../assets/img/calender.png" alt="" class="date-input">
                    </div> 
                </div>   
                <div class="login--button--bx mt-8">
                    <a href="select_live_music.php" class="lg--btn--theame">Submit</a>
                </div>                  
            </form>
           
        </div>
    </div>
</section>


<?php include("../include/foot.php")?>
<script>
    bodyClass('club--page');
    $(".date" ).datepicker({
        dateFormat:'yy-mm-dd'
    });
</script>