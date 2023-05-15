<?php include("../include/head.php")?>
<?php include("./include/header.php")?>



<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="back--btn">
            <a href="referral_code.php">
                <img src="../assets/img/back.png" alt="">
            </a>
        </div>
        <div class="box--c intro">
            <h3>Intro Message in words </h3>
            <form action="">
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">Bio-Intro</label>
                        <a href="javascript:void(0);"><span class="fa fa-edit"></span></a>
                        <textarea name="" id="" class="form-control" placeholder="Write a Bio-Intro..."></textarea>
                    </div> 
                </div> 
                <div class="grid--box">   
                    <div class="flex--50">
                        <label for="">Address</label>
                        <textarea name="" id="" class="form-control" placeholder="Write a Address..."></textarea>
                    </div>
                    <div class="flex--50">
                        <label for="">Landmark</label>
                        <textarea name="" id="" class="form-control" placeholder="Write a Landmark..."></textarea>
                    </div>
                </div>   
                <div class="grid--box">           
                    <div class="flex--40">
                        <label for="">Town/City</label>
                        <input type="text" class="form-control" placeholder="Write a City... ">
                    </div>
                    <div class="flex--40">
                        <label for="">State</label>
                        <input type="text" class="form-control" placeholder="Write a State...">
                    </div>
                    <div class="flex--40">
                        <label for="">PinCode</label>
                        <input type="text" class="form-control" placeholder="Write a Pincode...">
                    </div>  
                </div>        
                         
                <div class="login--button--bx">
                    <a href="select_sound.php" class="lg--btn--theame">Submit</a>
                </div>                  
            </form>
           
        </div>
    </div>
</section>


<?php include("../include/foot.php")?>
<script>
bodyClass('club--list');
</script>