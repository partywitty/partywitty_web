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
                <form action="{{ url('otp-verify') }}" method="post">
                    @csrf
                    <input type="hidden" name="email" value="{{ session()->get('email') }}">
                    <h3>OTP</h3>
                    @if (\Session::has('error'))
                        <div class="alert alert-danger">
                            {!! \Session::get('error') !!}
                        </div>
                    @endif
                    <div class="wrapper--box">
                        <div class="flex--100">
                            <div class="otp--box">
                                <input type="text" name="otp1" class="form-control otp--input" placeholder="0" maxlength="1"
                                    oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                <input type="text" name="otp2" class="form-control otp--input" placeholder="0" maxlength="1"
                                    oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                <input type="text" name="otp3" class="form-control otp--input" placeholder="0" maxlength="1"
                                    oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                <input type="text" name="otp4" class="form-control otp--input" placeholder="0" maxlength="1"
                                    oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                            </div>
                            <!-- <div class="inputBox">
                                <input type="text" name="email" required="required">
                                <label>Email</label>
                                <i></i>
                            </div> -->
                        </div>
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
<script>
    bodyClass('login--page');
</script>
<script>
    $(".otp--input").keyup(function(e) {
        $(this).next(".otp--input").focus();
        if ((e.which == 8 || e.which == 46) && $(this).val() == '') {
            $(this).prev('.otp--input').focus();
        }
    });
</script>
