@include('web.include.head')
@include('web.include.header')

<section class="about--banner artist_list">
    <div class="main--box">
        <!-- <div class="title--name">
            <h1>As an Artist</h1>
        </div> -->
    </div>
</section>
<section class="main--feacture blog">
    <div class="main--box">
        <div class="wrapper--box">
            <div class="category--box">
                <div class="mobile--category">
                    <h5>Menus</h5>
                    <h5><a href="#menus" class="fa--plus" id="category_menu"></a></h5>
                </div>
                <div class="tab--style">
                    <div class="aside--box">
                        <div class="head--box">
                            <h5 class="name"> Search </h5>
                            <h5 class="active"><a href="#search" class="fa--plus"></a></h5>
                        </div>
                        <div class="body--box" id="search">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="search" placeholder="Search..." class="form-control">
                                            <span class="search--icon"><img
                                                    src="{{ url('') }}/public/user/assets/img/search.png"
                                                    alt=""></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="aside--box">
                        <div class="head--box">
                            <h5 class="name"> Select Packages </h5>
                            <h5><a href="#select_pacakage" class="fa--plus"></a></h5>
                        </div>
                        <div class="body--box" id="select_pacakage" style="display: none;">
                            <form action="">
                                <select name="" id="" class="form-control">
                                    <option value="">Wedding Packages</option>
                                    <option value="">Private Event Packages</option>
                                    <option value="">venue/Club GIg Packages</option>
                                </select>
                            </form>
                            <div class="ul--wrapper">
                                <div class="pacakage--box">Language</div>
                                <div class="pacakage--box">Western Pop Rock Bands</div>
                                <div class="pacakage--box">Western Jazz & Blues Bands</div>
                                <div class="pacakage--box">Hindi/English Mix Bands</div>
                                <div class="pacakage--box">Punjabi Bollywood Bands</div>
                                <div class="pacakage--box">Bollywood Sufi Bands</div>
                                <div class="pacakage--box">DJ Based Bands</div>
                            </div>
                        </div>
                    </div>
                    <div class="aside--box">
                        <div class="head--box">
                            <h5 class="name"> Sort By </h5>
                            <h5><a href="#sortby" class="fa--plus"></a></h5>
                        </div>
                        <div class="body--box" id="sortby" style="display: none;">
                            <div class="wrapper--box">
                                <div class="">
                                    <label for="">Min</label>
                                    <input type="number" id="min_value" name="" min="0"
                                        class="price_range">
                                </div>
                                <div class="">
                                    <label for="">Max</label>
                                    <input type="number" id="max_value" name="" max="1000000"
                                        class="price_range">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="aside--box">
                        <div class="head--box">
                            <h5 class="name"> Price </h5>
                            <h5><a href="#price" class="fa--plus"></a></h5>
                        </div>
                        <div class="body--box" id="price" style="display: none;">

                        </div>
                    </div>
                    <div class="aside--box">
                        <div class="head--box">
                            <h5 class="name"> Music Type </h5>
                            <h5><a href="#musictype" class="fa--plus"></a></h5>
                        </div>
                        <div class="body--box" id="musictype" style="display: none;">
                            <div class="ul--wrapper">
                                <div class="pacakage--box">Popular music</div>
                                <div class="pacakage--box">Blues Music.</div>
                                <div class="pacakage--box">Rock Music</div>
                                <div class="pacakage--box">Soul Music</div>
                            </div>
                        </div>
                    </div>
                    <div class="aside--box">
                        <div class="head--box">
                            <h5 class="name">Stage Formation </h5>
                            <h5><a href="#stage_information" class="fa--plus"></a></h5>
                        </div>
                        <div class="body--box" id="stage_information" style="display: none;">
                            <div class="ul--wrapper">
                                <div class="pacakage--box">Trio</div>
                                <div class="pacakage--box">Duio</div>
                                <div class="pacakage--box">Rock Music</div>
                                <div class="pacakage--box">Solo</div>
                            </div>
                        </div>
                    </div>
                    <div class="aside--box">
                        <div class="head--box">
                            <h5 class="name"> Venue</h5>
                            <h5><a href="#venue" class="fa--plus"></a></h5>
                        </div>
                        <div class="body--box" id="venue" style="display: none;">
                            <div class="ul--wrapper">
                                <div class="pacakage--box">Marriage</div>
                                <div class="pacakage--box">Birthday</div>
                                <div class="pacakage--box">Anniversary</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog--box artist">
                <div class="grid--box">
                    @foreach ($artists as $artist)
                        <div class="artist--box">
                            <img src="{{ url('') }}/{{ $artist['profile'] }}" alt="">
                            <a href="javascript:void(0);" class="heart--blank"><i class="fa fa-heart-o"></i></a>
                            <div class="content">
                                <h5>{{ $artist['type_of_artist_name'] }}{{ !empty($artist['subcategory_name']) ? $artist['subcategory_name'] : '' }}</h5>
                                <h5>{{$artist['username']}}</h5>
                                <div class="wrapper--box">
                                    <div class="list--type">
                                        <span>Bollywood</span>
                                        <span>Pop/Rock</span>
                                    </div>
                                    <a href="tel:05384637335" class="book--btn">Book Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>



@include('web.include.footer')
@include('web.include.foot')
<script>
    $(function() {
        $(".heart--blank").click(function() {
            $(this).addClass("active");
        });
    });
</script>
