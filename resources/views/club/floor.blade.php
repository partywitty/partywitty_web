@include('user.include.head')
@include('artist.include.header')



<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="back--btn">
            <a href="{{ url('select-ds') }}">
                <img src="{{ url('/public/assets/img/back.png') }}" alt="">
            </a>
        </div>
        <div class="box--c intro">
            <!-- <h3>Intro Message in words </h3> -->
            <form action="{{url('add-floors')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="hd--floor">Floor 1</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="flex--box">
                            <label for="" class="label--d">Seating</label>
                            <input type="number" class="form-control" name="seating1" placeholder="0">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="label--d">Floor Type</label>
                            <div class="inline--radio">
                                <label for="">
                                    <input type="radio" class="radio--btn" value="rooftop" name="floor_type1">
                                    Rooftop
                                </label>
                                <label for="">
                                    <input type="radio" class="radio--btn" value="indoor" name="floor_type1">
                                    Indoor
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="label--d">Music Type</label>
                            <div class="inline--radio">
                                <label for="">
                                    <input type="radio" class="radio--btn" value="live music" name="music_type1">
                                    Live Music
                                </label>
                                <label for="">
                                    <input type="radio" class="radio--btn" value="dj" name="music_type1">
                                    DJ
                                </label>
                                <label for="">
                                    <input type="radio" class="radio--btn" value="instrument" name="music_type1">
                                    Instrument
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="hr--style">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="hd--floor">Floor 2</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="flex--box">
                            <label for="" class="label--d">Seating</label>
                            <input type="number" class="form-control" name="seating2" placeholder="0">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="label--d">Floor Type</label>
                            <div class="inline--radio">
                                <label for="">
                                    <input type="radio" class="radio--btn" value="rooftop" name="floor_type2">
                                    Rooftop
                                </label>
                                <label for="">
                                    <input type="radio" class="radio--btn" value="indoor" name="floor_type2">
                                    Indoor
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="label--d">Music Type</label>
                            <div class="inline--radio">
                                <label for="">
                                    <input type="radio" class="radio--btn" value="live music" name="music_type2">
                                    Live Music
                                </label>
                                <label for="">
                                    <input type="radio" class="radio--btn" value="dj" name="music_type2">
                                    DJ
                                </label>
                                <label for="">
                                    <input type="radio" class="radio--btn" value="instrument" name="music_type2">
                                    Instrument
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="hr--style">
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="hd--floor">Floor 3</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="flex--box">
                            <label for="" class="label--d">Seating</label>
                            <input type="number" class="form-control" name="seating3" placeholder="0">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="label--d">Floor Type</label>
                            <div class="inline--radio">
                                <label for="">
                                    <input type="radio" class="radio--btn" value="rooftop" name="floor_type3">
                                    Rooftop
                                </label>
                                <label for="">
                                    <input type="radio" class="radio--btn" value="indoor" name="floor_type3">
                                    Indoor
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="label--d">Music Type</label>
                            <div class="inline--radio">
                                <label for="">
                                    <input type="radio" class="radio--btn" value="live music" name="music_type3">
                                    Live Music
                                </label>
                                <label for="">
                                    <input type="radio" class="radio--btn" value="dj" name="music_type3">
                                    DJ
                                </label>
                                <label for="">
                                    <input type="radio" class="radio--btn" value="instrument" name="music_type3">
                                    Instrument
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="login--button--bx mt-8">
                    <button type="submit" class="lg--btn--theame">Submit</button>
                </div>
            </form>

        </div>
    </div>
</section>


@include('user.include.foot')

<script>
    bodyClass('artist--list');
</script>
