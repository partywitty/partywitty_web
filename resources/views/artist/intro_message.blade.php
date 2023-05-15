@include('artist.include.head')
@include('artist.include.header')

<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="back--btn">
            <a href="{{ url('venue') }}">
                <img src="{{ url('') }}/public/assets/img/back.png" alt="">
            </a>
        </div>
        <div class="box--c intro">
            <h3>Intro Message in words </h3>
            <form action="{{ url('intro_submit') }}" method="post">
                @csrf
                <div class="grid--box">
                    <div class="flex--100">
                        <!-- <label for="">Bio-Intro</label> -->
                        <textarea name="introduction" required class="form-control" placeholder="Write a Intro...">{{(!empty($UserProfiles->introduction))? $UserProfiles->introduction:"" }}</textarea>
                    </div>
                </div>
                <!-- <div class="grid--box">
                    <div class="flex--50">
                        <label for="">Address</label>
                        <textarea name="" id="" class="form-control" placeholder="Write a Address..."></textarea>
                    </div>
                    <div class="flex--50">
                        <label for="">Landmark</label>
                        <textarea name="" id="" class="form-control" placeholder="Write a Landmark..."></textarea>
                    </div>
                </div> -->
                <!-- <div class="grid--box">
                    <div class="flex--40">
                        <label for="">Town/City</label>
                        <input type="text" class="form-control" placeholder="Write a City... ">
                    </div>
                    <div class="flex--40">
                        <label for="">State</label>
                        <input type="text" class="form-control" placeholder="Write a State...">
                    </div>
                    <div class="flex--40">
                        <label for="">PinCode</label>
                        <input type="text" class="form-control" placeholder="Write a Pincode...">
                    </div>
                </div> -->

                <div class="login--button--bx">
                    <button type="submit" class="lg--btn--theame">Submit</button>
                </div>
                <div class="login--button--bx mt-8">
                    <a href="{{ url('photograph') }}" class="lg--btn--theame">skip</a>
                </div>
            </form>

        </div>
    </div>
</section>
@include('artist.include.foot')
<script>
    bodyClass('artist--list');
</script>
