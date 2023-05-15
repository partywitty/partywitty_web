@include('artist.include.head')
@include('artist.include.header')


<section class="artist_hire--section">
    <div class="main--box">
        <div class="back--btn">
            <a href="{{url('signin')}}">
                <img src="{{url('')}}/public/assets/img/back.png" alt="">
            </a>
        </div>
        <div class="box--a">
            <!-- <h3>What you want</h3> -->
            <form action="{{url('artist_hire_submit')}}" method="post">
                @csrf
                <div class="box--b">
                    <div class="check--box radio--check">
                        <label class="form-check-label" for="ch_1">I am an Artist</label>
                        <input class="form-check-input" name="role" type="radio" value="Artist" id="ch_1" required>
                    </div>
                </div>
                <div class="box--b">
                    <div class="check--box radio--check">
                        <label class="form-check-label" for="ch_2">I want to hire an Artist</label>
                        <input class="form-check-input" name="role" type="radio" value="Club" id="ch_2">
                    </div>
                    
                </div>
                <div class="login--button--bx">
                    <button class="lg--btn--theame" type="submit">Submit</button>
                </div>    
            </form>
        </div>
    </div>
</section>
@include('artist.include.foot')
<script>
bodyClass('artist--page');
</script>