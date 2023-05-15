@include('web.include.head')
<section class="guest_login--section">
    <div class="main--box">
        <div class="row">
            `
            <!-- <div class="col-md-12">
                <a href="javascript:void(0);" class="logo--img">
                    <img src="{{ url('') }}/public/user/assets/img/logo.png" alt="">
                </a>
            </div>  `          -->
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
            <div class="col-md-12">
                <h3>Guest Sign Up</h3>
            </div>
            <form action="{{ url('guest_signup') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Full name</label>
                            <input type="text" placeholder="Enter Name" name="name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" placeholder="Enter Email" name="email" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Contact Number</label>
                            <input type="text" placeholder="Enter Contact Number" maxlength="10"
                                onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                name="contact_no" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" placeholder="Enter Password" name="password" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Gender</label>
                            <div class="inline--radio">
                                <div class="radio--box">
                                    <input type="radio" id="male" name="gender" value="male" required>
                                    <label for="male">Male</label>
                                </div>
                                <div class="radio--box">
                                    <input type="radio" id="female" name="gender" value="female">
                                    <label for="female">Female</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn--theame--login">Sign Up</button>
                    </div>
                    <div class="col-md-12 text-center mt-3">
                        <p class="acc--para">if You have an account <a href="{{ url('guest-login') }}">Sign in</a></p>
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
