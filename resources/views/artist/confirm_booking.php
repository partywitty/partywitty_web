<?php include("../include/head.php")?>
<?php //include("include/header.php")?>


<div class="back--btn">
    <a href="artist_list.php">
        <img src="../assets/img/back.png" alt="">
    </a>
</div>

<section class="artist_hire--section">
    <div class="main--box art--list">
        <div class="box--c">
            <h3>Artist List</h3>
            <div class="grid--box">
               <?php for($i=1; $i<=6; $i++){?>
                    <div class="box--artist">
                        <div class="wrapper--box">
                            <div class="img--box">
                                <img src="../assets/img/01.png" alt="">
                            </div>
                            <div class="content">
                                <h5>David Borg</h5>
                                <p>gender : Male</p>
                            </div>
                        </div>
                        <div class="btn--box">
                            <a href="artist_type.php" type="button" class="btn--accept">Accept</a>
                            <a href="artist_list.php" type="button" class="btn--denid">Denied</a>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</section>



<?php include("../include/foot.php")?>
<script>
bodyClass('artist--list');
</script>