@include('web.include.head')
@include('web.include.header')

<style>
    .intrustion {
        color: #fff !important;
    }
</style>

<section class="main--feacture">
    <div class="main--box">
        <div class="book-form">
            <div class="row">
                <h5>{{ $offer['offer_name'] }} | {!! $offer['type'] !!}</h5>
                <div class="col-md-12 bg--style">
                    <div id="select_qty">
                        <div class="row border-bottom">
                            <div class="col-md-12">
                                <p class="intruction">Please select the member that be attending the party</p>
                            </div>
                            <div class="col-md-6 col-6">
                                <h5>{!! $offer['type'] !!} Pass Couple Entry</h5>
                                <div class="inclusions">{!! $offer['couple_inclusion'] !!}</div>
                                {{-- <p class="mandotary">(Strictly with couple)</p> --}}
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="qty--buttons">
                                    <p class="couple_total_price total_price">{{(($offer['id'] == '8') or ($offer['id'] == '9'))? (4 * $offer['couple_sell']) :$offer['couple_sell']}} </p>
                                    <input type="hidden" id="couple_price" value="{{ $offer['couple_sell'] }}">

                                    <button id="couple_decrement">-</button>
                                    <input type="text" id="couple_input" value="{{ (($offer['id'] == '8') or ($offer['id'] == '9'))? '4':'0' }}">
                                    <button id="couple_increment">+</button>
                                </div>
                            </div>
                        </div>
                        @if ($offer['stage_sell'] != '')
                            <div class="row border-bottom">

                                <div class="col-md-6 col-6">
                                    <h5>{!! $offer['type'] !!} Pass Stag Entry</h5>
                                    <div class="inclusions">{!! $offer['stag_inclusion'] !!}</div>
                                    <p class="mandotary">(Strictly with couple)</p>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="qty--buttons">
                                        <p class="stage_total_price total_price"> {{ $offer['stage_sell'] }}</p>
                                        <input type="hidden" id="stage_price" value="{{ $offer['stage_sell'] }}">
                                        <button id="stage_decrement">-</button>
                                        <input type="text" id="stage_input" value="0">
                                        <button id="stage_increment">+</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($offer['kids_sell'] != '')
                            <div class="row border-bottom">
                                <div class="col-md-6 col-6">
                                    <h5>{!! $offer['type'] !!} Pass Kids Entry</h5>
                                    <div class="inclusions">{!! $offer['kids_inclusion'] !!}
                                    </div>
                                    <p class="mandotary">(Strictly with couple)</p>
                                </div>
                                <div class="col-md-6 col-6">
                                    <div class="qty--buttons">
                                        <p class="kids_total_price total_price "> {{ $offer['kids_sell'] }} </p>
                                        <input type="hidden" id="kids_price" value="{{ $offer['kids_sell'] }}">
                                        <button id="kids_decrement">-</button>
                                        <input type="text" id="kids_input" value="0">
                                        <button id="kids_increment">+</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn--theame--2" id="open_booking_form">Submit</button>
                        </div>
                    </div>
                    <form action="{{ url('booking_form_submit') }}" method="post">
                        @csrf
                        <div class="row" id="booking_form">
                            <div class="col-md-12 row" id="add-stage">
                            </div>
                            <div class="col-md-12 row" id="add-couple">
                            </div>
                            <div class="col-md-12 row" id="add-kids">
                            </div>
                            <div class="col-md-12 row" id="poin-of-contact">
                                <div class="col-md-12">
                                    <h5>Point of Contact</h5>
                                    <div class="add-stage">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Enter Name..."
                                                        class="form-control" name="contact_name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" placeholder="Enter Contact..."
                                                        class="form-control" name="contact_number" required>
                                                    <input type="hidden" name="offer_id" value="{{ $offer['id'] }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn--theame--2" style="margin-top: 0;">Book Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('web.include.footer')
@include('web.include.foot')


<script>
    $("#booking_form").hide();
    $("#open_booking_form").click(function() {
        var stage_input = $("#stage_input").val();
        var couple_input = $('#couple_input').val();
        var kids_input = $("#kids_input").val();
        if (stage_input > 0 || couple_input > 0 || kids_input > 0) {

            $.ajax({
                url: "{{ url('book-passes') }}",
                type: 'post',
                data: {
                    "_token": '{{ csrf_token() }}',
                    stage_input: stage_input,
                    couple_input: couple_input,
                    kids_input: kids_input,
                    offer_id: "{{ $offer['id'] }}"

                },
                success: function(responce) {
                    location.href = '{{url("")}}/'+responce.data;
                }
            });

            // $("#booking_form").show();
            // $("#select_qty").hide();


            // var stage_html = '';
            // for (i = 0; i < stage_input; i++) {
            //     var j = i + 1;
            //     stage_html += '<div class="col-md-12">' +
            //         '<h5>Stage ' + j + '</h5>' +
            //         '<div class="add-stage">' +
            //         '<div class="row">' +
            //         '<div class="col-md-4">' +
            //         '<div class="form-group">' +
            //         '<input type="text" placeholder="Enter Name..." name="stage_name[]" class="form-control" required>' +
            //         '</div>' +
            //         '</div>' +
            //         '<div class="col-md-4">' +
            //         '<div class="form-group">' +
            //         '<input type="number" placeholder="Enter Contact..." name="stage_contact[]" class="form-control">' +
            //         '</div>' +
            //         '</div>' +
            //         '<div class="col-md-4">' +
            //         '<div class="form-group">' +
            //         '<input type="number" placeholder="Enter Age..." name="stage_age[]" class="form-control">' +
            //         '</div>' +
            //         '</div>' +
            //         '</div></div></div>';
            // }

            // var couple_html = '';
            // for (i = 0; i < couple_input; i++) {
            //     var j = i + 1;
            //     couple_html += '<div class="col-md-12">' +
            //         '<h5>Couple ' + j + '</h5>' +
            //         '<div class="add-stage">' +
            //         '<div class="row">' +
            //         '<div class="col-md-12">' +
            //         '<h5>Male</h5>' +
            //         '</div>' +
            //         '<div class="col-md-4">' +
            //         '<div class="form-group">' +
            //         '<input type="text" placeholder="Enter Name..." class="form-control" name="couple_male_name[]" required>' +
            //         '</div>' +
            //         '</div>' +
            //         '<div class="col-md-4">' +
            //         '<div class="form-group">' +
            //         '<input type="number" placeholder="Enter Contact..." name="couple_male_contact[]" class="form-control">' +
            //         '</div>' +
            //         '</div>' +
            //         '<div class="col-md-4">' +
            //         '<div class="form-group">' +
            //         '<input type="number" placeholder="Enter Age..." name="couple_male_age[]" class="form-control">' +
            //         '</div>' +
            //         '</div>' +
            //         '</div>' +
            //         '<div class="row">' +
            //         '<div class="col-md-12">' +
            //         '<h5>Female</h5>' +
            //         '</div>' +
            //         '<div class="col-md-4">' +
            //         '<div class="form-group">' +
            //         '<input type="text" placeholder="Enter Name..." class="form-control" name="couple_female_name[]" required>' +
            //         '</div>' +
            //         '</div>' +
            //         '<div class="col-md-4">' +
            //         '<div class="form-group">' +
            //         '<input type="number" placeholder="Enter Contact..." name="couple_female_contact[]" class="form-control">' +
            //         '</div>' +
            //         '</div>' +
            //         '<div class="col-md-4">' +
            //         '<div class="form-group">' +
            //         '<input type="number" placeholder="Enter Age..." class="form-control" name="couple_female_age[]">' +
            //         '</div>' +
            //         '</div>' +
            //         '</div>' +
            //         '</div>' +
            //         '</div>';
            // }


            // var kids_html = '';
            // for (i = 0; i < kids_input; i++) {
            //     var j = i + 1;
            //     kids_html += '<div class="col-md-12">' +
            //         '<h5>Kids ' + j + '</h5>' +
            //         '<div class="add-stage">' +
            //         '<div class="row">' +
            //         '<div class="col-md-4">' +
            //         '<div class="form-group">' +
            //         '<input type="text" placeholder="Enter Name..." name="kids_name[]" class="form-control" required>' +
            //         '</div>' +
            //         '</div>' +
            //         '<div class="col-md-4">' +
            //         '<div class="form-group">' +
            //         '<input type="number" placeholder="Enter Contact..." name="kids_contact[]" class="form-control">' +
            //         '</div>' +
            //         '</div>' +
            //         '<div class="col-md-4">' +
            //         '<div class="form-group">' +
            //         '<input type="number" placeholder="Enter Age..." name="kids_age[]" class="form-control">' +
            //         '</div>' +
            //         '</div>' +
            //         '</div>' +
            //         '</div>' +
            //         '</div>';
            // }

            // $('#add-stage').html(stage_html);
            // $('#add-couple').html(couple_html);
            // $('#add-kids').html(kids_html);
        } else {
            alert("Please select the member that be attending the party");
        }
    });


    $(document).ready(function() {
        if(("{{$offer['id']}}" == '8') || ("{{$offer['id']}}" == '9')){
            var min = 4;
        }else{
            var min = 0;
        }
        var max = 100;
        var stage_input = $("#stage_input");
        var stage_decrement = $("#stage_decrement");
        var stage_increment = $("#stage_increment");
        var stage_total_price = $(".stage_total_price");
        var stage_price = $("#stage_price");

        stage_decrement.click(function() {
            var value = parseInt(stage_input.val());
            var price = parseInt(stage_price.val());
            if (value > min) {
                stage_input.val(value - 1);
                stage_total_price.html(" " + (value - 1) * price);
            }
        });

        stage_increment.click(function() {
            var value = parseInt(stage_input.val());
            var price = parseInt(stage_price.val());
            if (value < max) {
                stage_input.val(value + 1);
                stage_total_price.html(" " + (value + 1) * price);
            }
        });
    });

    $(document).ready(function() {
        if(("{{$offer['id']}}" == '8') || ("{{$offer['id']}}" == '9')){
            var min = 4;
        }else{
            var min = 0;
        }
        var max = 100;
        var couple_input = $("#couple_input");
        var couple_decrement = $("#couple_decrement");
        var couple_increment = $("#couple_increment");
        var couple_total_price = $(".couple_total_price");
        var couple_price = $("#couple_price");

        couple_decrement.click(function() {
            var value = parseInt(couple_input.val());
            var price = parseInt(couple_price.val());
            if (value > min) {
                couple_input.val(value - 1);
                couple_total_price.html(" " + (value - 1) * price);
            }
        });

        couple_increment.click(function() {
            var value = parseInt(couple_input.val());
            var price = parseInt(couple_price.val());
            if (value < max) {
                couple_input.val(value + 1);
                couple_total_price.html(" " + (value + 1) * price);
            }
        });
    });

    $(document).ready(function() {
        var min = 0;
        var max = 100;
        var kids_input = $("#kids_input");
        var kids_decrement = $("#kids_decrement");
        var kids_increment = $("#kids_increment");
        var kids_total_price = $(".kids_total_price");
        var kids_price = $("#kids_price");

        kids_decrement.click(function() {
            var value = parseInt(kids_input.val());
            var price = parseInt(kids_price.val());
            if (value > min) {
                kids_input.val(value - 1);
                kids_total_price.html(" " + (value - 1) * price);
            }
        });

        kids_increment.click(function() {
            var value = parseInt(kids_input.val());
            var price = parseInt(kids_price.val());
            if (value < max) {
                kids_input.val(value + 1);
                kids_total_price.html(" " + (value + 1) * price);
            }
        });
    });
</script>
