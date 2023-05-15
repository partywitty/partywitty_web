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
                <form action="{{ url('forgot-submit') }}" method="post">
                    @csrf
                    <h3>Forget Password</h3>
                    @if (\Session::has('error'))
                        <div class="alert alert-danger">
                            {!! \Session::get('error') !!}
                        </div>
                    @endif
                    <div class="wrapper--box">
                        <div class="flex--100">
                            <div class="inputBox">
                                <input type="email" name="email" required="required">
                                <label>Email</label>
                                <i></i>
                            </div>
                        </div>
                        <div class="login--button--bx">
                            <button type="submit" class="lg--btn--theame">Forget Password</button>
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
