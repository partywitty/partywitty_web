@include("artist.include.head")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@include("artist.include.header")

<!-- <div class="back--btn">
    <a href="{{url('referral_code')}}">
        <img src="{{url('')}}/public/assets/img/back.png" alt="">
    </a>
</div> -->
<section class="artist_hire--section budget">
    <div class="main--box art--list">
        <div class="back--btn">
            <a href="javascript:void(0);">
                <img src="{{url('')}}/public/assets/img/back.png" alt="">
            </a>
        </div>
        <div class="box--c">
            <h3>Preferred City for Our Station</h3>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="form-group budget">
                        <select class="form-control js-example-templating" id="city_select">
                            <option selected disabled>Select City</option>
                            @foreach($cities as $city)
                            <option value="{{$city['id']}}">{{$city['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group budget">
                        <button id="add_city" class="form-control" type="button">Add</button>
                    </div>
                </div>
            </div>
            <form action="{{url('submit-city-budget')}}" method="post">
                @csrf
                <div class="row mt-3 justify-content-center add_more">

                </div>
                <div class="login--button--bx">
                    <button type="submit" class="lg--btn--theame budget">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@include("artist.include.foot")
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).on('click', '#add_city', function() {
        var city_id = $('#city_select').val();
        var city_name = $('#city_select option:selected').text();
        html = "";
        html += '<div class="col-md-3">' +
            '<div class="form-group budget">' +
            '<label for="">' + city_name + '</label>' +
            '<input type="number" name="price[]" class="form-control" placeholder="price">' +
            '<input type="hidden" name="city_id[]" value="' + city_id + '" >' +
            '</div>' +
            '</div>';
        $('.add_more').append(html);
        console.log(city_name);
        console.log(city_id);

    });
    $(".js-example-templating").select2({});
</script>

<script>
    bodyClass('artist--list');
</script>