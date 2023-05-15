@include('web.include.head')
@include('web.include.header')

<?php
$session = session('guastdata');
$book_passes = session('book_passes');
?>

<section class="chekout--section">
    <div class="main--box">
        <div class="title">
            <h5>Confirm your cart details and pay</h5>
        </div>
        <div class="process--box">
            <div class="step">
                <div class="wrapper--box">
                    <h5><a href="javascript:void(0)" class="fa--plus" id="step_one"></a> STEP 1: LOGGED IN AS:</h5>
                    <p><a href="javascript:void(0);" id="edit_form">{{ $session['email'] }}</a></p>
                </div>
                <div class="content--box" id="sign_out">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="hd--name">{{ $session['email'] }} <a href="javascript:void(0)" onclick="signout()">(sign out)</a></h5>
                            <p class="note">Please note you won't lose the items in your cart if you sign out.</p>
                        </div>

                        <div class="com-md-12 text-center">
                            <button class="btn--theame add--on" type="button">Continue</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="step">
                <div class="wrapper--box">
                    <h5> <a href="javascript:void(0)" class="fa--plus active" id="step_two"></a> STEP 2: ORDER SUMMARY</h5>
                    <p id="order-summary-data">• Total: ₹ <span id="total_amount"></span></p>
                </div>
                <div class="content--box" id="order-summary">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="order--detail--box">
                                <div class="table--head">
                                    <h5>Item</h5>
                                    <h5>Oty</h5>
                                    <h5>Subtotal</h5>
                                </div>
                                <div class="table--body">
                                    @if ($book_passes['couple_count'] > 0)
                                        <div class="body-content">
                                            <div class="content">
                                                <p><span class="mobile--td">item</span> Platinum Pass Couple Entry</p>
                                                <a href="javascript:void(0);">{{ $offer['offer_name'] }}</a>
                                                <p>{{ date('F d ', strtotime($offer['start_date'])) }} |
                                                {{ date('h A ', strtotime($offer['start_time'])) }} -
                                                {{ date('F d ', strtotime($offer['end_date'])) }} |
                                                {{ date('h A ', strtotime($offer['end_time'])) }}</p>
                                            </div>
                                            <p><span class="mobile--td">QTY</span> {{ $book_passes['couple_count'] }}</p>
                                            <p><span class="mobile--td">Subtotal</span> ₹ {{ $book_passes['couple_count'] * $offer['couple_sell'] }}</p>
                                        </div>
                                        <input type="hidden" id="couple_count" value="{{ $book_passes['couple_count'] }}">
                                    @endif
                                    @if ($book_passes['stage_count'] > 0)
                                        <div class="body-content">
                                            <div class="content">
                                                <p><span class="mobile--td">item</span> Platinum Pass Stag Entry</p>
                                                <a href="javascript:void(0);">{{ $offer['offer_name'] }}</a>
                                                <p> {{ date('F d ', strtotime($offer['start_date'])) }} |
                                                    {{ date('h A ', strtotime($offer['start_time'])) }} -
                                                    {{ date('F d ', strtotime($offer['end_date'])) }} |
                                                    {{ date('h A ', strtotime($offer['end_time'])) }}</p>
                                            </div>
                                            <p><span class="mobile--td">QTY</span> {{ $book_passes['stage_count'] }}</p>
                                            <p><span class="mobile--td">Subtotal</span> ₹ {{ $book_passes['stage_count'] * $offer['stage_sell'] }}</p>
                                        </div>
                                    @endif
                                    @if ($book_passes['kids_count'] > 0)
                                        <div class="body-content">
                                            <div class="content">
                                                <p><span class="mobile--td">item</span> Platinum Pass Kids Entry</p>
                                                <a href="javascript:void(0);">{{ $offer['offer_name'] }}</a>
                                                <p> {{ date('F d ', strtotime($offer['start_date'])) }} |
                                                {{ date('h A ', strtotime($offer['start_time'])) }} -
                                                {{ date('F d ', strtotime($offer['end_date'])) }} |
                                                {{ date('h A ', strtotime($offer['end_time'])) }}</p>
                                            </div>
                                            <p><span class="mobile--td">QTY</span>  {{ $book_passes['kids_count'] }}</p>
                                            <p><span class="mobile--td">Subtotal</span>  ₹ {{ $book_passes['kids_count'] * $offer['kids_sell'] }}</p>
                                        </div>
                                    @endif
                                    <div class="table--footer">
                                    <?php $total = $book_passes['stage_count'] + $book_passes['couple_count'] + $book_passes['kids_count']; ?>
                                        <div class="total--box">
                                            <p><a href="javascript:void(0);" class="toggle_convenience"><i class="fa fa-plus"></i></a> 
                                            Convenience Fee</p>
                                           <p>₹ {{ $total * 118 }}</p>
                                        </div>
                                        <div class="fee--box" id="fee--detail">
                                            <div class="wrapper--box">
                                                <p> Base Fee</p>
                                                <p>₹ 1500</p>
                                            </div>
                                            <div class="wrapper--box">
                                                <p> CGST</p>
                                                <p>₹ 1500</p>
                                            </div>
                                            <div class="wrapper--box">
                                                <p> SGST</p>
                                                <p>₹ 1500</p>
                                            </div>
                                        </div>
                                        <?php
                                            $stage_price = $book_passes['stage_count'] * $offer['stage_sell'];
                                            $couple_price = $book_passes['couple_count'] * $offer['couple_sell'];
                                            $kids_price = $book_passes['kids_count'] * $offer['kids_sell'];
                                            $subtotal = $total * 118 + ($stage_price + $couple_price + $kids_price);
                                        ?>
                                        <div class="total--box">
                                            <p>Total</p>
                                           <p>₹ <span id="total">{{ $subtotal }}</span></p>
                                        </div>
                                        <div class="total--box coupan-codes">
                                        </div>
                                        <div class="total--box sub-total">
                                        </div>
                                        <div class="coupan--box">
                                            <h5>Have a discount code?</h5>
                                            <div class="wrapper--box">
                                                <input type="text" class="form-control coupan--code"
                                                    placeholder="Enter Code">
                                                <button class="apply--button">Apply</button>
                                            </div>
                                        </div>
                                        <div class="com-md-12 text-center">
                                            <button class="btn--theame add--on" type="button" id="continue-detail">Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <table>
                                <thead>
                                    <tr>
                                        <th>ITEM</th>
                                        <th style="text-align: right;">QTY</th>
                                        <th style="text-align: right;">SUBTOTAL</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($book_passes['couple_count'] > 0)
                                        <tr>
                                            <td>Platinum Pass Couple Entry
                                                <br>
                                                <a href="javascript:void(0)">{{ $offer['offer_name'] }}</a>
                                                <br>
                                                {{ date('F d ', strtotime($offer['start_date'])) }} |
                                                {{ date('h A ', strtotime($offer['start_time'])) }} -
                                                {{ date('F d ', strtotime($offer['end_date'])) }} |
                                                {{ date('h A ', strtotime($offer['end_time'])) }}
                                            </td>
                                            <td style="text-align: right;">{{ $book_passes['couple_count'] }}</td>
                                            <td style="text-align: right;"> ₹
                                                {{ $book_passes['couple_count'] * $offer['couple_sell'] }}</td>
                                        </tr>
                                        <input type="hidden" id="couple_count" value="{{ $book_passes['couple_count'] }}">
                                    @endif
                                    @if ($book_passes['stage_count'] > 0)
                                        <tr>
                                            <td>Platinum Pass Stag Entry
                                                <br>
                                                <a href="javascript:void(0)">{{ $offer['offer_name'] }}</a>
                                                <br>
                                                {{ date('F d ', strtotime($offer['start_date'])) }} |
                                                {{ date('h A ', strtotime($offer['start_time'])) }} -
                                                {{ date('F d ', strtotime($offer['end_date'])) }} |
                                                {{ date('h A ', strtotime($offer['end_time'])) }}
                                            </td>
                                            <td style="text-align: right;">{{ $book_passes['stage_count'] }}</td>
                                            <td style="text-align: right;"> ₹
                                                {{ $book_passes['stage_count'] * $offer['stage_sell'] }}</td>
                                        </tr>
                                    @endif

                                    @if ($book_passes['kids_count'] > 0)
                                        <tr>
                                            <td>Platinum Pass Kids Entry
                                                <br>
                                                <a href="javascript:void(0)">{{ $offer['offer_name'] }}</a>
                                                <br>
                                                {{ date('F d ', strtotime($offer['start_date'])) }} |
                                                {{ date('h A ', strtotime($offer['start_time'])) }} -
                                                {{ date('F d ', strtotime($offer['end_date'])) }} |
                                                {{ date('h A ', strtotime($offer['end_time'])) }}
                                            </td>
                                            <td style="text-align: right;">{{ $book_passes['kids_count'] }}</td>
                                            <td style="text-align: right;"> ₹
                                                {{ $book_passes['kids_count'] * $offer['kids_sell'] }}</td>
                                        </tr>
                                    @endif
                                    <?php $total = $book_passes['stage_count'] + $book_passes['couple_count'] + $book_passes['kids_count']; ?>
                                    <tr style="border-bottom: none;">
                                        <td colspan="2" style="text-align: right;padding: 5px 12px;">
                                            <a href="javascript:void(0);" class="toggle_convenience"><i class="fa fa-plus"></i></a> 
                                            Convenience Fee
                                        </td>
                                        <td style="text-align: right;padding: 5px 12px;">₹ {{ $total * 118 }}</td>
                                    </tr>
                                    <tr style="border: none;">
                                        <td colspan="2" style="text-align: right;padding: 5px 12px;">Base Fee </td>
                                        <td style="text-align: right;padding: 5px 12px;">₹ 2525</td>
                                    </tr>
                                    <tr style="border: none;">
                                        <td colspan="2" style="text-align: right;padding: 5px 12px;">CGST </td>
                                        <td style="text-align: right;padding: 5px 12px;">₹ 1500</td>
                                    </tr>
                                    <tr style="border: none;">
                                        <td colspan="2" style="text-align: right;padding: 5px 12px;">SGST</td>
                                        <td style="text-align: right;padding: 5px 12px;">₹ 1500</td>
                                    </tr>
                                    <?php
                                    $stage_price = $book_passes['stage_count'] * $offer['stage_sell'];
                                    $couple_price = $book_passes['couple_count'] * $offer['couple_sell'];
                                    $kids_price = $book_passes['kids_count'] * $offer['kids_sell'];
                                    $subtotal = $total * 118 + ($stage_price + $couple_price + $kids_price);
                                    ?>
                                    <tr>
                                        <td colspan="2" style="text-align: right;">Total</td>
                                        <td style="text-align: right;">₹ <span
                                                id="total">{{ $subtotal }}</span></td>
                                    </tr>
                                    <tr class="coupan-codes">

                                    </tr>
                                    <tr class="sub-total">

                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: right;">Have a discount code?</td>
                                        <td>
                                            <div class="wrapper--box">
                                                <input type="text" class="form-control coupan--code"
                                                    placeholder="Enter Code">
                                                <button class="apply--button">Apply</button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table> -->
                        </div>
                        <!-- <div class="col-md-12 text-center">
                            <button class="btn--theame add--on" type="button" id="continue-detail">Continue</button>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="step">
                <div class="wrapper--box">
                    <h5> <a href="javascript:void(0)" class="fa--plus" id="step_three"></a> STEP 3: TICKET DETAILS</h5>
                    <!-- <p><a href="javascript:void(0);">amrita.vedanshtechnovision@gmail.com</a></p> -->
                </div>
                <div class="content--box" id="ticket-detail">
                    <form id="booking_form_submit">
                        @csrf
                        <input type="hidden" name="offer_id" value="{{ $offer['id'] }}">
                        <input type="hidden" name="total_amount" class="total_amount">
                        {{-- <input type="hidden" name="contact_name" class="contact_name" value="{{ $session['name'] }}"> --}}
                        <input type="hidden" name="email" class="email" value="{{ $session['email'] }}">
                        {{-- <input type="hidden" name="contact_number" class="contact_number" --}}
                        {{-- value="{{ $session['contact_no'] }}"> --}}
                        <input type="hidden" name="guast_id" value="{{ $session['id'] }}">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Booked By *</h5>
                                <div class="add-stage">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" placeholder="Enter Name..." name="contact_name"
                                                    class="form-control contact_name" value="{{ $session['name'] }}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="contact_number"
                                                    class="form-control contact_number"
                                                    value="{{ $session['contact_no'] }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="number" placeholder="Enter Age..." name="stage_age[]"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @for ($i = 1; $i <= $book_passes['couple_count']; $i++)
                                <div class="col-md-12">
                                    <h5>Couple {{ $i }}</h5>
                                    <div class="add-stage">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5>Male</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Enter Name..."
                                                        class="form-control" name="couple_male_name[]" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" placeholder="Enter Contact..."
                                                        name="couple_male_contact[]" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" placeholder="Enter Age..."
                                                        name="couple_male_age[]" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5>Female</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Enter Name..."
                                                        class="form-control" name="couple_female_name[]" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" placeholder="Enter Contact..."
                                                        name="couple_female_contact[]" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" placeholder="Enter Age..."
                                                        class="form-control" name="couple_female_age[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            @for ($i = 1; $i <= $book_passes['stage_count']; $i++)
                                <div class="col-md-12">
                                    <h5>Stag {{ $i }}</h5>
                                    <div class="add-stage">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Enter Name..."
                                                        name="stage_name[]" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" placeholder="Enter Contact..."
                                                        name="stage_contact[]" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" placeholder="Enter Age..."
                                                        name="stage_age[]" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor


                            @for ($i = 1; $i <= $book_passes['kids_count']; $i++)
                                <div class="col-md-12">
                                    <h5>Kids {{ $i }}</h5>
                                    <div class="add-kids">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Enter Name..."
                                                        name="kids_name[]" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" placeholder="Enter Contact..."
                                                        name="kids_contact[]" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="number" placeholder="Enter Age..."
                                                        name="kids_age[]" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="row">
                            <div class="com-md-12 text-center">
                                <button type="submit" class="btn--theame add--on">Continue</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    // $(document).on('submit', '#booking_form_submit', function(e) {
    //     e.preventDefault();
    //     var total_amount = $('.total_amount').val();
    //     var contact_number = $('.contact_number').val();
    //     var email = $('.email').val();
    //     var contact_name = $('.contact_name').val();
    //     var form = $(this);
    //     var options = {
    //         "key": "{{ env('RAZORPAY_KEY') }}", // secret key id
    //         "amount": total_amount * 100, // 2000 paise = INR 20
    //         "name": "Party Witty",
    //         "description": "Payment",
    //         "currency": 'INR',
    //         "prefill": {
    //             "name": contact_name,
    //             "email": email,
    //             "contact": '+91' + contact_number,
    //         },
    //         "image": "{{url('')}}/public/user/assets/img/fav_ico.png",
    //         "handler": function(response) {
    //             // response.razorpay_payment_id
    //             $.ajax({
    //                 url: "{{ url('booking_form_submit') }}",
    //                 type: "POST",
    //                 data: form.serialize() + "&razorpay_payment_id=" + response
    //                     .razorpay_payment_id,
    //                 success: function(data) {
    //                     if (response.error) {

    //                     } else {
    //                         window.location.href = data.data;
    //                     }
    //                 }
    //             });
    //         },
    //         "theme": {
    //             "color": "#ec1b23"
    //         }
    //     };
    //     var rzp1 = new Razorpay(options);
    //     rzp1.open();
    // });

    $(document).on('submit', '#booking_form_submit', function(e) {
        e.preventDefault();
        var total_amount = $('.total_amount').val();
        var contact_number = $('.contact_number').val();
        var email = $('.email').val();
        var contact_name = $('.contact_name').val();
        var form = $(this);
        // var options = {
        //     "key": "{{ env('RAZORPAY_KEY') }}", // secret key id
        //     "amount": total_amount * 100, // 2000 paise = INR 20
        //     "name": "Party Witty",
        //     "description": "Payment",
        //     "currency": 'INR',
        //     "prefill": {
        //         "name": contact_name,
        //         "email": email,
        //         "contact": '+91' + contact_number,
        //     },
        //     "image": "{{url('')}}/public/user/assets/img/fav_ico.png",
        //     "handler": function(response) {
                // response.razorpay_payment_id
                $.ajax({
                    url: "{{ url('booking_form_submit') }}",
                    type: "POST",
                    data: form.serialize() + "&razorpay_payment_id=9876687687687",
                    success: function(data) {
                        if (data.error) {

                        } else {
                            // $('<a href="'+ data.data +'" target="_blank">External Link</a>')[0].click();
                            window.location.href = data.data;
                        }
                    }
                });
        //     },
        //     "theme": {
        //         "color": "#ec1b23"
        //     }
        // };
        // var rzp1 = new Razorpay(options);
        // rzp1.open();
    });
</script>


@include('web.include.footer')
@include('web.include.foot')
<script>
    $(document).ready(function() {
        $("#fee--detail").hide();
        $(".toggle_convenience").click(function() {
            $("#fee--detail").toggle();
            $(".toggle_convenience").toggleClass("active");
        });
        $("#sign_out").hide();
        $("#order-summary-data").hide();
        $("#ticket-detail").hide();
        $("#step_one").click(function() {
            $("#sign_out").toggle();
            $("#step_one").toggleClass("active");
            $("#order-summary").hide();
            $("#ticket-detail").hide();
            $("#step_two").removeClass("active");
            $("#step_three").removeClass("active");

        });
        $("#edit_form").click(function() {
            $("#sign_out").toggle();
            $("#step_one").toggleClass("active");
        });
       
        $("#step_two").click(function() {
            $("#order-summary").toggle();
            $("#step_two").toggleClass("active");
            $("#ticket-detail").hide();
            $("#step_one").removeClass("active");
            $("#step_three").removeClass("active");
            $("#sign_out").hide();
        });
        $("#step_three").click(function() {
            $("#ticket-detail").toggle();
            $("#step_three").toggleClass("active");
            $("#sign_out").hide();
            $("#order-summary").hide();
            $("#step_one").removeClass("active");
            $("#step_two").removeClass("active");
        });
        $("#continue-detail").click(function() {
            $("#step_two").removeClass("active");
            $("#step_three").addClass("active");
            $("#order-summary-data").show();
            $("#order-summary").hide();
            $("#ticket-detail").show();
            var total = $('#total').text();
            var subtotal = $('#subtotal').text();
            if (subtotal != "") {
                $('#total_amount').text(subtotal);
                $('.total_amount').val(subtotal);
            } else {
                $('#total_amount').text(total);
                $('.total_amount').val(total);
            }
        });
    });

    $(document).on('click', '.apply--button', function() {
        var coupan = $('.coupan--code').val();
        var couple_count = $('#couple_count').val();
        $.ajax({
            url: "{{ url('apply-coupan-code') }}",
            type: "post",
            data: {
                "_token": "{{ csrf_token() }}",
                coupan: coupan
            },
            success: function($responce) {
                if ($responce == 1) {
                    html = '<p style="text-align: right;">discount</p>' +
                        '<p style="text-align: right;">₹ '+couple_count * 500+'</p>';
                    subtotal = '<p style="text-align: right;">Sub Total</p>' +
                        '<p style="text-align: right;" >₹ <span id="subtotal">' + (
                            "{{ $subtotal }}" - (couple_count * 500)) + '</span></p>';
                    $(".coupan-codes").html(html);
                    $('.sub-total').html(subtotal);
                }
            }
        });
    });
</script>
