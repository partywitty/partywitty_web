@include('artist.include.head');

<div class="back--btn">
    <a href="{{url('bank_details')}}">
        <img src="{{url('')}}/public/assets/img/back.png" alt="">
    </a>
</div>
<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="box--c intro">
            <h3>Service Agreement</h3>
            <form action="{{url('agree')}}" method="post">
                @csrf
                <p style="color: #fff;">{{$ServiceAgreement->contant}}</p>
                <br>
                <input type="checkbox" name="agree" id="" required> <span style="color: #fff;"> I Agree</span>
                <div class="login--button--bx">
                    <button type="submit" class="lg--btn--theame">Submit</button>
                </div>
            </form>

        </div>
    </div>
</section>
@include('artist.include.foot');
<script>
    bodyClass('artist--list');
</script>