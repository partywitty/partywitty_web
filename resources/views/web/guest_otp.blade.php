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
                <h3>Guest OTP</h3>
            </div>           
            <form action="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <!-- <label for="">Enter OTP</label> -->
                            <div class="input--flex">
                                <input type="number" placeholder="0" maxlength="1" class="otp-input">
                                <input type="number" placeholder="0" maxlength="1" class="otp-input">
                                <input type="number" placeholder="0" maxlength="1" class="otp-input">
                                <input type="number" placeholder="0" maxlength="1" class="otp-input">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="button" class="btn--theame--login">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@include('artist.include.foot')
<script>
    bodyClass('guest--page');
</script>