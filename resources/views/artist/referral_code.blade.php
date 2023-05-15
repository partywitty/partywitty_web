@include('club.include.head')
@include('artist.include.header')


<section class="artist_hire--section">
    <div class="main--box">
        {{-- <div class="back--btn">
            <a href="{{url('artist_hire')}}">
                <img src="{{url('')}}/public/assets/img/back.png" alt="">
            </a>
        </div> --}}
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
                    <a href="{{url('artist_list')}}" class="lg--btn--theame add--on">Seeking for the referral code ?</a>
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