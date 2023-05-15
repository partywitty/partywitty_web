<?php include("../include/head.php")?>
<?php //include("include/header.php")?>


<div class="back--btn">
    <a href="manager_number.php">
        <img src="../assets/img/back.png" alt="">
    </a>
</div>
<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="box--c">
            <h3>Live Music Type</h3>
            <form action="">
                <div class="search--box">
                    <input type="search" class="form-control" placeholder="Enter a music type...">
                    <a href="javascript:void(0);"> <span class="times--icon"></span></a>
                </div>
                <div class="days--box">
                    <div class="grid--box">
                        <div class="day selected">m</div>
                        <div class="day">t</div>
                        <div class="day">w</div>
                        <div class="day">t</div>
                        <div class="day">f</div>
                        <div class="day">s</div>
                        <div class="day">s</div>
                    </div>
                </div>
                <div class="selected--box">                 
                    <div class="select--type">
                        <span>Bollywood</span>
                        <span class="times--icon"></span>
                    </div>                   
                    <div class="select--type">
                        <span>Sufi</span>
                        <span class="times--icon"></span>
                    </div>                   
                </div>
                <div class="artist--type--box">
                    <div class="artist--type selected">
                        <span>Sufi</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Western</span>                       
                    </div>
                    <div class="artist--type selected">
                        <span>Bollywood</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Rock</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Retro pop</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Folk</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Rhythm & Blues</span>                       
                    </div>
                </div>
                <div class="login--button--bx">
                    <a href="guest_application.php" class="lg--btn--theame">Submit</a>
                </div> 
            </form>
           
        </div>
    </div>
</section>


<?php include("../include/foot.php")?>
<script>
    bodyClass('club--list');
</script>