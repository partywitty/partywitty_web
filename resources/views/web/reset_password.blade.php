@include('artist.include.head')

<section class="login--section">
    <div class="main--box">
        <div class="wrapper--box">
            <div class="flex--50">
                <div class="login--pg--logo">
                    <a href="javascript:void(0);"><img src="{{ url('') }}/public/assets/img/logo.png"
                            alt=""></a>
                    <p>It is a long established fact that a reader be distracted by the readable content of a when
                        looking at its layout.</p>
                </div>
            </div>
            <div class="flex--50">
                <form action="{{ url('submit-reset-pasword') }}" id="submit-reset-pasword" method="post">
                    @csrf
                    <input type="hidden" name="email" value="{{ session()->get('email') }}">
                    <h3>Reset Password</h3>
                    <div class="wrapper--box">
                        <div class="flex--100">
                            <div class="inputBox">
                                <input type="password" name="password" id="password" required="required">
                                <label>Password</label>
                                <i></i>
                                <span class="fa fa-fw field-icon tpassword fa-eye" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="flex--100">
                            <div class="inputBox">
                                <input type="password" name="password_confirm" id="password_confirm"
                                    required="required">
                                <label>Confirm Password</label>
                                <i></i>
                                <span class="fa fa-fw field-icon tpassword fa-eye" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="login--button--bx">
                            <button type="submit" class="lg--btn--theame">Reset Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@include('artist.include.foot')
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

    $("#submit-reset-pasword").validate({
        rules: {
            password: {
                required: true,
                minlength: 8,
            },
            password_confirm: {
                required: true,
                minlength: 8,
                equalTo: "#password"
            }
        },
        messages: {
            password: {
                required: "Please fill Password",
                minlength: "Please fill strong password",
            },
            password_confirm: {
                required: "Please fill Confirm Password",
                minlength: "Please fill strong password",
                equalTo: "Password and confirm password not match!"
            }
        },
    });
</script>
