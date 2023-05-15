<?php include("../include/head.php")?>
<?php //include("include/header.php")?>


<div class="back--btn">
    <a href="sort.php">
        <img src="../assets/img/back.png" alt="">
    </a>
</div>
<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="box--c intro">
            <h3>Select Date & Time</h3>
            <form action="">
                <div class="grid--box">           
                    <div class="flex--50">
                        <label for="">Location</label>
                        <input type="text" class="form-control rd" placeholder="Enter Here... ">
                    </div>
                    <div class="flex--50">
                        <label for="">Gender</label>
                        <input type="text" class="form-control rd" placeholder="Enter Here...">
                    </div>  
                </div> 
                <div class="grid--box">           
                    <div class="flex--50">
                        <label for="">Start Date</label>
                        <input type="text" class="form-control rd date" placeholder="Enter Here... ">
                    </div>
                    <div class="flex--50">
                        <label for="">End Date</label>
                        <input type="text" class="form-control rd date" placeholder="Enter Here...">
                    </div>  
                </div> 
                <div class="grid--box">   
                    <div class="flex--100">
                        <label for="">About Event</label>
                        <a href="javascript:void(0);"><span class="fa fa-edit"></span></a>
                        <textarea name="" id="" class="form-control" placeholder="Write a message..."></textarea>
                    </div>                  
                </div>      
                         
                <div class="login--button--bx  mt-8" >
                    <a href="wallet.php" class="lg--btn--theame">Submit</a>
                </div>  
            </form>
           
        </div>
    </div>
</section>


<?php include("../include/foot.php")?>
<script>
bodyClass('artist--list');
</script>