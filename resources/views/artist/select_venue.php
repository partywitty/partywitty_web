<?php include("../include/head.php")?>
<?php //include("include/header.php")?>


<div class="back--btn">
    <a href="music_type.php">
        <img src="../assets/img/back.png" alt="">
    </a>
</div>

<section class="artist_hire--section">
    <div class="main--box art--list">
        <div class="box--c">
            <h3>Venue you Wish To Perform At? </h3>
            <form action="">
                <div class="search--box">
                    <input type="search" class="form-control" placeholder="Enter a music type...">
                    <a href="javascript:void(0);"> <span class="times--icon"></span></a>
                </div>
                <div class="selected--box">
                   <?php //for($i=1; $i<10; $i++){?>
                    <div class="select--type">
                        <span>Birthday</span>
                        <span class="times--icon"></span>
                    </div>
                    <div class="select--type">
                        <span>Marriage</span>
                        <span class="times--icon"></span>
                    </div>
                    <?php //}?>
                </div>
                <div class="artist--type--box">
                    <div class="artist--type selected">
                        <span>Birthday</span>                       
                    </div>                                  
                    <div class="artist--type selected">
                        <span>Marriage</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Perform 1</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Perform 2</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Perform 3</span>                       
                    </div>
                </div>
                <div class="login--button--bx">
                    <a href="intro_message.php" class="lg--btn--theame">Submit</a>
                </div> 
            </form>
        </div>
    </div>
</section>



<?php include("../include/foot.php")?>
<script>
bodyClass('artist--list');
</script>