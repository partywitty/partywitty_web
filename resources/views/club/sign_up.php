<?php include("../include/head.php")?>
<?php //include("include/header.php")?>

<section class="login--section">
    <div class="main--box">
        <div class="wrapper--box">
            <div class="flex--50">
                <div class="login--pg--logo">
                    <a href="login.php"><img src="../assets/img/logo.png" alt=""></a>
                    <p>It is a long established fact that a reader be distracted by the readable content of a when
                        looking at its layout.</p>
                </div>
            </div>
            <div class="flex--50">
                <form action="">
                    <!-- <h3>Account Login</h3> -->
                    <div class="wrapper--box">
                        <div class="flex--100">
                           <div class="form--group">
                                <label for="">Full Name</label>
                                <input type="text" placeholder="Adwerd Shwn" class="form-control">
                           </div>
                        </div>
                        <div class="flex--100">
                           <div class="form--group mb-0">
                                <label for="">Phone Number</label>
                                <input type="number" placeholder="Phone Number" class="form-control num">
                                <span class="num--style"><img src="../assets/img/flag.png" alt=""> &nbsp; 
                                &#43 91 </span>
                           </div>
                        </div>
                        <div class="flex--100">
                           <div class="form--group">
                                <label for="">Gender</label>
                                <div class="wrapper--box">
                                    <div class="box--i">
                                        <img src="../assets/img/female.png" alt="" />
                                        <input type="radio" name="gender" />
                                    </div>
                                    <div class="box--i">
                                        <img src="../assets/img/male.png" alt="" />
                                        <input type="radio" name="gender" />
                                    </div>
                                </div>                             
                           </div>
                        </div>
                        <div class="flex--100">
                           <div class="form--group">
                                <label for="">Email</label>
                                <input type="email" placeholder="Email" class="form-control">                                
                           </div>
                        </div>
                        <div class="flex--100">
                           <div class="form--group">
                                <label for="">Password</label>
                                <input type="password" id="password" placeholder="Password" class="form-control">
                                <!-- <span class="fa fa-eye"></span>                                 -->
                                <span class="fa fa-fw field-icon tpassword fa-eye" aria-hidden="true"></span>
                           </div>
                        </div>
                        <div class="login--button--bx">
                            <a href="artist_hire.php" class="lg--btn--theame">Sign up</a>
                        </div>                      
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</section>


<?php include("../include/foot.php")?>
<script>
    bodyClass('register--page');
    $(".tpassword").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        if ($('#password').attr("type") == "password") {
            $('#password').attr("type", "text");
        } else {
            $('#password').attr("type", "password");
        }		
    });
</script>