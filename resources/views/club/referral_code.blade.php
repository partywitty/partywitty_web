@include('club.include.head')

<div class="back--btn">
    <a href="artist_hire.php">
        <img src="{{url('')}}/public/assets/img/back.png" alt="">
    </a>
</div>
<section class="artist_hire--section">
    <div class="main--box">
        <div class="box--a">
            <h3>Enter Referral Code</h3>
            <form action="{{url('referral_code_submit')}}" method="post">
                @csrf
                @if (session('error'))
                <div class="alert alert-danger">
                    {!! session('error') !!}
                </div>
                @endif
                <div class="wrapper--box">
                    <div class="flex--80">
                        <input type="text" name="referral_code" class="form-control" placeholder="Enter ">
                    </div>
                </div>
                <div class="login--button--bx">
                    <button class="lg--btn--theame" type="submit">Submit</button>
                </div>
                <div class="login--button--bx">
                    <a href="{{url('artist_list')}}" class="lg--btn--theame">Skip</a>
                </div>
            </form>
            <!-- <p class="p--style">Seeking for the referral code ?</p>   -->
        </div>
    </div>
</section>

@include('club.include.foot')
<script>
    bodyClass('club--page');
</script>