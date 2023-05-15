<?php include("../include/head.php")?>
<?php //include("include/header.php")?>


<div class="back--btn">
    <a href="filter.php">
        <img src="../assets/img/back.png" alt="">
    </a>
</div>
<div class="sort--btn">
    <a href="javascript:void(0);" class="btn--img">
        <img src="../assets/img/sort.png" alt="">
    </a>
    <a href="javascript:void(0);" class="btn--img">
        <img src="../assets/img/cancel.png" alt="">
    </a>
</div>
<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="box--c intro">
            <h3>Sort</h3>
            <form action="">
                <div class="check--box">
                    <input class="form-check-input" type="checkbox" value="" id="ch_6">
                    <label class="form-check-label" for="ch_6">Review from the clubs </label>
                </div>
                <div class="check--box">
                    <input class="form-check-input" type="checkbox" value="" id="ch_5">
                    <label class="form-check-label" for="ch_5">Review from the guest </label>
                </div>
                <div class="check--box">
                    <input class="form-check-input" type="checkbox" value="" id="ch_4">
                    <label class="form-check-label" for="ch_4">New Artist</label>
                </div>
                <div class="check--box">
                    <input class="form-check-input" type="checkbox" value="" id="ch_3">
                    <label class="form-check-label" for="ch_3">Low to high</label>
                </div>
                <div class="check--box">
                    <input class="form-check-input" type="checkbox" value="" id="ch_2">
                    <label class="form-check-label" for="ch_2">High to low</label>
                </div>
                <div class="check--box">
                    <input class="form-check-input" type="checkbox" value="" id="ch_1">
                    <label class="form-check-label" for="ch_1">At Higher threshold</label>
                </div>
               
                <div class="login--button--bx mt-8">
                    <a href="select_date_time.php" class="lg--btn--theame">Submit</a>
                </div> 
            </form>
        </div>
    </div>
</section>


<?php include("../include/foot.php")?>
<script>
bodyClass('artist--list');
</script>