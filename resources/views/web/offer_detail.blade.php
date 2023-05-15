@include('web.include.head')
@include('web.include.header')
<style>
    .detail--box .description p {
        color: #fff !important;
    }
</style>

<section class="main--feacture offer">
    <div class="main--box">
        <div class="detail--box">
            <div class="offer--img">
                <img src="{{ url('') }}/{{ $offer['cover_photo'] }}" alt="">
            </div>
            <div class="content">
                <div class="wrapper--box">
                    <h5>{{ $offer['offer_name'] }} | {!! $offer['type'] !!}</h5>
                </div>
                <div class="wrapper--box">
                    <p class="offer--info">Valid on :{{ date('F j', strtotime($offer['start_date'])) }} |
                        {{ date('g A', strtotime($offer['start_time'])) }} -
                        {{ date('F j', strtotime($offer['end_date'])) }} |
                        {{ date('g A', strtotime($offer['end_time'])) }}
                        <br>
                        <span class="coupan--code js-copy" data-copy="PRTYWT-500">Get 50%* OFF. Use CODE:
                            PRTYWT-500</span>
                    </p>
                    <table class="price_table">
                        <thead>
                            <tr>
                                @if ($offer['couple_sell'] != '')
                                    <th>Couple</th>
                                @endif
                                @if ($offer['stage_sell'] != '')
                                    <th>Stag</th>
                                @endif
                                @if ($offer['kids_sell'] != '')
                                    <th>Kids</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @if ($offer['couple_sell'] != '')
                                    <td>
                                        <p class="price"> <span>&#8377; {{ $offer['couple_sell'] }}/- </span>
                                            {{-- &#8377;  {{ $offer['couple_sell'] }} /- --}}
                                            <br><span class="include">Inc. of all taxes</span>
                                        </p>
                                    </td>
                                @endif
                                @if ($offer['stage_sell'] != '')
                                    <td>
                                        <p class="price"> <span>&#8377; {{ $offer['stage_sell'] }}/- </span>
                                            {{-- &#8377; {{ $offer['stage_sell'] }}  /- --}}
                                            <br><span class="include">Inc. of all taxes</span>
                                        </p>
                                    </td>
                                @endif
                                @if ($offer['kids_sell'] != '')
                                    <td>
                                        <p class="price"> <span>&#8377; {{ $offer['kids_sell'] }}/- </span>
                                            {{-- &#8377; {{ $offer['kids_sell'] }} /-  --}}
                                            <br><span class="include">Inc. of all taxes</span>
                                        </p>
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="wrapper--box">
                    <p class="address" style="font-size: 12px"> &nbsp; <i class="fa fa-map-marker"
                            aria-hidden="true"></i> &nbsp; {{ $offer['address'] }}</p>
                    <p>
                        <a href="javascript:void(0);" class="btn--style" data-toggle="modal"
                            data-target="#detailmodal">Term's & Conditions</a>
                        <a href="{{ url('booking-form') }}/{{ $offer['id'] }}" type="submit"
                            class="btn--theame--2">Book Now</a>
                    </p>
                </div>
            </div>
            @if (!empty($offer['small_description']))
                <div class="description">
                    <h5 class="offer--title">About</h5>
                    <p>{!! $offer['small_description'] !!}</p>
                </div>
            @endif
            @if (!empty($offer['inclusion']))
                <div class="description">
                    <h5 class="offer--title">Inclusion:</h5>
                    {!! $offer['inclusion'] !!}
                </div>
            @endif
            @if (!empty($offer['term_condition']))
                <div class="description">
                    <h5 class="offer--title">Terms & Conditions</h5>
                    {!! $offer['term_condition'] !!}
                </div>
            @endif
        </div>

    </div>
</section>

<section class="main--feacture offer">
    <div class="main--box">
        <div class="wrapper--box offer--title">
            <h5>MAY LOVE THESE TOO 👇 </h5>
            <a href="{{ url('offer') }}" class="btn--theame"> view More</a>
        </div>
        <div class="grid--box">
            @foreach ($other_offers as $other_offer)
                <?php
                $sub_category_array = [];
                foreach ($other_offer['sub_category_name'] as $sub_category) {
                    $sub_category_array[] = $sub_category['name'];
                }
                $sub_category_name = implode(',', $sub_category_array); ?>
                <div class="offer--box">
                    <div class="img">
                        <a href="{{ url('offer-detail') }}/{{ $offer['id'] }}"><img
                                src="{{ url('') }}/{{ $offer['thamnail_photo'] }}" alt=""></a>
                    </div>
                    <div class="content">
                        <div class="wrapper--box">
                            <h5 class="offer--hd">{{ $offer['offer_name'] }} | {!! $offer['type'] !!}</h5>
                        </div>
                        <div class="wrapper--box">
                            <p class="price"><span>
                                    {{-- &#8377; --}}
                                    {{-- {{$offer['stage_mrp']}}/- --}}
                                </span> &#8377; {{ $offer['couple_sell'] }}/- <br> <span class="include">Inc. of all
                                    taxes</span></p>
                        </div>
                        {{-- <a href="javascript:void(0);" class="cancel--url">Free Cancellation</a> --}}
                        <p>{!! $offer['small_description'] !!}</p>
                        <p style="font-size: 12px"><i class="fa fa-map-marker" aria-hidden="true"></i>
                            {{ $offer['address'] }} </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('web.include.footer')
@include('web.include.foot')

<!-- Modal -->
<div class="modal" id="menumodal">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Menus</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5><b>Buffet Inclusion:</b></h5>
                    </div>
                    <div class="col-md-12 mb-3 mt-2">
                        <p class="intsruction"><b>*Menu changes on a daily basis. All items listed are subject to
                                availability and changes.</b></p>
                    </div>
                    <div class="col-md-12">
                        <h5 class="hd--menu">Menu Inclusions :</h5>
                        <ul class="modal--ul">
                            <li>8 Types of Morning Bakery</li>
                            <li>4 Types of Fresh Cut Fruits</li>
                            <li>10 Types of Healthy Salad</li>
                            <li>1 Type of Dhokla</li>
                            <li>3 Type of Cereals</li>
                            <li>7 Types of North Indian</li>
                            <li>4 Types of Continental</li>
                            <li>2 Type of Oriental</li>
                            <li>2 Types of Sambhar</li>
                            <li>1 Type of Idli</li>
                        </ul>
                    </div>

                    <div class="col-md-12">
                        <h5 class="hd--menu">Live Counters :</h5>
                        <ul class="modal--ul">
                            <li>Dossa</li>
                            <li>Uttapam</li>
                            <li>Toast</li>
                            <li>4 Types of Live Parantha</li>
                            <li>Pancakes</li>
                            <li>Waffle</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <h5 class="hd--menu">Desserts :</h5>
                        <ul class="modal--ul">
                            <li>2 Types of Desserts</li>
                        </ul>
                    </div>

                    <div class="col-md-12">
                        <h5 class="hd--menu">Beverages :</h5>
                        <ul class="modal--ul">
                            <li>Tea / Coffee</li>
                            <li>Juices</li>
                            <li>Soft Drinks</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="detailmodal">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Term's & Conditions</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>-Please carry a valid ID proof along with you.</p>
                <p><br></p>
                <p>-No refunds on purchased ticket are possible, even in case of any rescheduling.</p>
                <p><br></p>
                <p>-Security procedures, including frisking remain the right of the management.</p>
                <p><br></p>
                <p>-No dangerous or potentially hazardous objects including but not limited to weapons, knives, guns,
                    fireworks, helmets, lazer devices, bottles, musical instruments will not be allowed in the venue and
                    may be rejected with or without the owner from the venue.</p>
                <p><br></p>
                <p>-The sponsors/performers/organizers are not responsible for any injury or damage occurring due to the
                    event. Any claims regarding the same would be settled in courts in Mumbai.</p>
                <p><br></p>
                <p>-People in an inebriated state may not be allowed entry.</p>
                <p><br></p>
                <p>-Organizers hold the right to deny late entry to the event.</p>
                <p><br></p>
                <p>-Venue rules apply</p>
                {{-- {!! $offer['term_condition'] !!} --}}
            </div>
        </div>
    </div>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $(".canceltoggle").click(function() {
            $(".cancel--rule").toggleClass();
        });
    });

    $(document).ready(function() {
        $('.js-copy').click(function() {
            var text = $(this).attr('data-copy');
            var el = $(this);
            console.log(text);
            copyToClipboard(text, el);
        });
    });

    function copyToClipboard(text, el) {
        var copyTest = document.queryCommandSupported('copy');
        var elOriginalText = el.attr('data-original-title');

        if (copyTest === true) {
            var copyTextArea = document.createElement("textarea");
            copyTextArea.value = text;
            document.body.appendChild(copyTextArea);
            copyTextArea.select();
            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'Copied!' : 'Whoops, not copied!';
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: msg
                }).then((result) => {
                    // window.location.href = '{{ url('referral_code') }}';
                });
                el.attr('data-original-title', msg).tooltip('show');
            } catch (err) {
                console.log('Oops, unable to copy');
            }
            document.body.removeChild(copyTextArea);
            el.attr('data-original-title', elOriginalText);
        } else {
            // Fallback if browser doesn't support .execCommand('copy')
            window.prompt("Copy to clipboard: Ctrl+C or Command+C, Enter", text);
        }
    }
</script>
