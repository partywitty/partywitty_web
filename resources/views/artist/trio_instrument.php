<?php include("../include/head.php")?>
<?php //include("include/header.php")?>


<div class="back--btn">
    <a href="duo_instrument.php">
        <img src="../assets/img/back.png" alt="">
    </a>
</div>

<section class="artist_hire--section">
    <div class="main--box art--list">
        <div class="box--c">
            <h3>Trio With What Instrument </h3>
            <form action="">
                <div class="search--box">
                    <input type="search" class="form-control" placeholder="Enter a music type...">
                    <a href="javascript:void(0);"> <span class="times--icon"></span></a>
                </div>
                <div class="selected--box">
                   <?php //for($i=1; $i<10; $i++){?>
                    <div class="select--type">
                        <span>Instrument 1</span>
                        <span class="times--icon"></span>
                    </div>
                    <div class="select--type">
                        <span>Instrument 2</span>
                        <span class="times--icon"></span>
                    </div>
                    <?php //}?>
                </div>
                <div class="artist--type--box">
                    <div class="artist--type selected">
                        <span>Instrument 1</span>                       
                    </div>                                  
                    <div class="artist--type selected">
                        <span>Instrument 2</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Instrument 3</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Instrument 4</span>                       
                    </div>
                    <div class="artist--type">
                        <span>Instrument 5</span>                       
                    </div>
                </div>
                <div class="login--button--bx">
                    <a href="full_band.php" class="lg--btn--theame">Submit</a>
                </div> 
            </form>
        </div>
    </div>
</section>



<?php include("../include/foot.php")?>
<script>
        bodyClass('artist--list');
      
</script>