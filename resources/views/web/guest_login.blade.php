@include('web.include.head')

<section class="guest_login--section">
    <div class="main--box">
        <div class="row">
            <div class="col-md-12">
                <a href="javascript:void(0);" class="logo--img">
                    <img src="{{url('')}}/public/user/assets/img/logo2.png" alt="">
                </a>
            </div>           
            <div class="col-md-12">
                <h3>Guest Login</h3>
            </div>           
            <form action="{{url('submit-guast-login')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        @if (\Session::has('error'))
                        <div class="alert alert-danger">
                            {!! \Session::get('error') !!}
                        </div>
                    @endif
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            {!! \Session::get('success') !!}
                        </div>
                    @endif
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{(isset($_COOKIE['email']))? $_COOKIE['email']: ''}}" placeholder="Enter Email" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" value="{{(isset($_COOKIE['password']))? $_COOKIE['password'] : ""}}" placeholder="Enter Password" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="inline--checkbox">
                            <div class="check--box">
                                <input type="checkbox" name="remmember_me" id="remmember_me">
                                <label for="remmember_me">Remmember me</label>
                            </div>
                            <a href="javascript:void(0);" class="forget--url">Forget password ?</a>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn--theame--login">Login</button>
                    </div>
                    <div class="col-md-12 text-center mt-3">
                        <p class="acc--para">Don't have an account <a href="{{url('guest-register')}}">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@include('artist.include.foot')
<script>
    bodyClass('guest--page');
    // $(".tpassword").click(function() {
    //     $(this).toggleClass("fa-eye fa-eye-slash");
    //     if ($('#password').attr("type") == "password") {
    //         $('#password').attr("type", "text");
    //     } else {
    //         $('#password').attr("type", "password");
    //     }
    // });
</script>