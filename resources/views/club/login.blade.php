@include('user.include.head')

<section class="login--section">
    <div class="main--box">
        <div class="wrapper--box">
            <div class="flex--50">
                <div class="login--pg--logo">
                    <a href="javascript:void(0);"><img src="{{url('public/')}}/assets/img/logo.png" alt=""></a>
                    <p>It is a long established fact that a reader be distracted by the readable content of a when
                        looking at its layout.</p>
                </div>
            </div>
            <div class="flex--50">
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <form action="{{url('login_submit')}}" method="post">
                    @csrf
                    <h3>Account Login</h3>
                    <div class="wrapper--box">
                        <div class="flex--100">
                            <div class="inputBox">
                                <input type="text" name="username" required="required">
                                <label>Email</label>
                                <i></i>
                            </div>
                        </div>
                        <div class="flex--100">
                            <div class="inputBox">
                                <input type="password" name="password" id="password" required="required">
                                <label>Password</label>
                                <i></i>
                                <span class="fa fa-fw field-icon tpassword fa-eye" aria-hidden="true"></span>
                                <!-- <span class="show-password-toggle fa fa-eye icon-align-confirm"> </span> -->
                                <!-- <i class="fa fa-eye-slash" aria-hidden="true"></i> -->
                            </div>
                        </div>
                        <div class="flex--100">
                            <div class="inline--checkbox">
                                <div class="check--box">
                                    <input type="checkbox" id="remmember_me">
                                    <label for="remmember_me">Remmember me</label>
                                </div>
                                <a href="javascript:void(0);" class="forget--url">Forget password ?</a>
                            </div>
                        </div>
                        <div class="login--button--bx">
                            <button type="submit" class="lg--btn--theame">Login</button>
                        </div>

                    </div>
                    <div class="bf--af--box">
                        <span class="bf--line"></span>
                        <span>or continue with</span>
                        <span class="af--line"></span>
                    </div>
                    <div class="social--box">
                        <a href="javascript:void(0);" class="s--img">
                            <img src="{{url('public/')}}/assets/img/google.png" alt="">
                        </a>
                        <a href="javascript:void(0);" class="s--img">
                            <img src="{{url('public/')}}/assets/img/fb.png" alt="">
                        </a>
                    </div>
                    <p class="url--style">Don’t have an account ? <a href="sign_up.php">Sign up</a></p>

                </form>
            </div>

        </div>
    </div>
</section>


@include('user.include.foot')
<script>
    bodyClass('login--page');


    $(".tpassword").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        if ($('#password').attr("type") == "password") {
            $('#password').attr("type", "text");
        } else {
            $('#password').attr("type", "password");
        }
    });
</script>