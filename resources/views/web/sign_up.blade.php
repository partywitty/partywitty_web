@include('artist.include.head')

<section class="login--section">
    <div class="main--box">
        <div class="wrapper--box">
            <div class="flex--50">
                <div class="login--pg--logo">
                    <a href="javascript:void(0);"><img src="{{url('')}}/public/assets/img/logo.png" alt=""></a>
                    <p>It is a long established fact that a reader be distracted by the readable content of a when
                        looking at its layout.</p>
                </div>
            </div>
            <div class="flex--50">
                <form action="{{url('user_submit')}}" id="user_submit" method="post">
                    @csrf
                    <!-- <h3>Account Login</h3> -->
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    <a href="javascript:void(0);" class="mobile--logo"><img src="{{url('')}}/public/assets/img/logo.png" alt=""></a>
                    <div class="wrapper--box">
                        <div class="flex--100">
                            <div class="form--group">
                                <label for="">Full Name</label>
                                <input type="text" name="username" placeholder="Adwerd Shwn" class="form-control">
                            </div>
                        </div>
                        <div class="flex--100">
                            <div class="form--group mb-0">
                                <label for="">Phone Number</label>
                                <input type="text" name="contact_no" maxlength="10" onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" placeholder="Phone Number" class="form-control num">
                                <span class="num--style"><img src="{{url('')}}/public/assets/img/flag.png" alt=""> &nbsp;
                                    &#43 91 </span>
                            </div>
                        </div>
                        <div class="flex--100">
                            <div class="form--group">
                                <label for="">Gender</label>
                                <div class="wrapper--box">
                                    <div class="box--i">
                                        <img src="{{url('')}}/public/assets/img/female.png" alt="" />
                                        <input type="radio" name="gender" value="female" />
                                    </div>
                                    <div class="box--i">
                                        <img src="{{url('')}}/public/assets/img/male.png" alt="" />
                                        <input type="radio" name="gender" value="male" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex--100">
                            <div class="form--group">
                                <label for="">Email</label>
                                <input type="email" name="email" placeholder="Email" class="form-control">
                            </div>
                        </div>
                        <div class="flex--100">
                            <div class="form--group">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                                <!-- <span class="fa fa-eye"></span>                                 -->
                                <span class="fa fa-fw field-icon tpassword fa-eye-slash" aria-hidden="true"></span>
                            </div>
                        </div>

                        <div class="flex--100">
                            <div class="form--group">
                                <!-- <label for="">Password</label> -->
                                <!-- <input type="password" name="password" id="password" placeholder="Password" class="form-control"> -->
                                <!-- <span class="fa fa-eye"></span>                                 -->
                                <!-- <span class="fa fa-fw field-icon tpassword fa-eye-slash" aria-hidden="true"></span> -->
                                <p class="url--style">Already On Party Witty ? <a href="{{url('signin')}}">Login</a></p>
                            </div>
                        </div>

                        <input type="hidden" name="role" value="Artist">
                        <div class="login--button--bx">
                            <button type="submit" class="lg--btn--theame">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@include('artist.include.foot')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<script>
    $("#user_submit").validate({
        rules: {
            // simple rule, converted to {required:true}
            username: "required",
            contact_no: {
                required: true,
                minlength: 10,
                number: true
            },
            gender: "required",
            password: {
                required: true,
                minlength: 8,
            },
            email: {
                required: true,
                email: true,
            }
        }
    });
</script>

<script>
    bodyClass('register--page');
    $(".tpassword").click(function() {
        $(this).toggleClass("fa-eye-slash fa-eye");
        if ($('#password').attr("type") == "password") {
            $('#password').attr("type", "text");
        } else {
            $('#password').attr("type", "password");
        }
    });
</script>