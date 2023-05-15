<?php include("../include/head.php")?>
<?php //include("include/header.php")?>


<div class="back--btn">
    <a href="artist_type.php">
        <img src="../assets/img/back.png" alt="">
    </a>
</div>

<section class="artist_hire--section">
    <div class="main--box art--list">
        <div class="box--c">
            <h3>Music Type/Genre of Music </h3>
            <form action="">
                <div class="search--box">
                    <input type="search" class="form-control" placeholder="Enter a music type...">
                    <a href="javascript:void(0);"> <span class="times--icon"></span></a>
                </div>
                <div class="selected--box">
                   <?php //for($i=1; $i<10; $i++){?>
                    <div class="select--type">
                        <span>Bollywood</span>
                        <span class="times--icon"></span>
                    </div>
                    <div class="select--type">
                        <span>Sufi</span>
                        <span class="times--icon"></span>
                    </div>
                    <?php //}?>
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
                    <div class="artist--type">
                        <span>Production</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Heavy Metal</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Punk Rock</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Indian rock </span>                       
                    </div>
                    <div class="artist--type">
                        <span>Funk</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Pop rock</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Jazz</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Latin</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Hard rock</span>                       
                    </div>
                </div>
                <div class="login--button--bx">
                    <a href="select_venue.php" class="lg--btn--theame">Submit</a>
                </div> 
            </form>
        </div>
    </div>
</section>



<?php include("../include/foot.php")?>
<script>
bodyClass('artist--list');
</script>