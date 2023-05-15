<?php include("../include/head.php")?>
<?php //include("include/header.php")?>


<div class="back--btn">
    <a href="select_date_time.php">
        <img src="../assets/img/back.png" alt="">
    </a>
</div>
<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="box--c intro">
            <h3>Wallet</h3>
            <div class="wallet--box">
                <div class="style--box">
                    <div class="wrapper--box">
                        <h5>Balance</h5>
                        <h5>₹ 5000/-</h5>
                    </div>
                </div>
                <div class="style--box">
                    <div class="wrapper--box">
                        <h5>History</h5>
                        <a href="javascript:void(0);" class="btn--style">Request For Booking</a>
                    </div>
                    <div class="wrapper--box">
                        <div>
                            <p>For event in Hotel </p>
                            <span class="date">30-02-2022</span><span  class="time">05:30 PM</span>
                        </div>
                        <div>
                          <h4 class="plus--amt">+ ₹ 5000/-</h4>
                        </div>
                    </div>
                    <div class="hr--line"></div>
                    <div class="wrapper--box">
                        <div>
                            <p>Withdrawal</p>
                            <span class="date">30-02-2022</span><span  class="time">05:30 PM</span>
                        </div>
                        <div>
                          <h4 class="minus--amt">- ₹ 500/-</h4>
                        </div>
                    </div>
                </div>
                <div class="login--button--bx  mt-8">
                    <a href="amount.php" class="lg--btn--theame">Submit</a>
                </div>              
            </div>    
        </div>
    </div>
</section>


<?php include("../include/foot.php")?>
<script>
bodyClass('artist--list');
</script>