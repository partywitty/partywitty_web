<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="Party Witty" content="Party Witty Web" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="{{url('')}}/public/user/assets/img/fav_ico.png">
    <link rel="stylesheet" href="{{url('')}}/public/user/assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" -->
    integrity="sha384-..../" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('')}}/public/user/assets/css/slick.css">
    <link rel="stylesheet" href="{{url('')}}/public/user/assets/css/style.css">
    <link rel="stylesheet" href="{{url('')}}/public/user/assets/css/party_witty_web.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-N9W6B93');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-199T6ZWL4S"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-199T6ZWL4S');
    </script>


    <script>
    function bodyClass(className) {
        document.body.classList.add(className);
    }
    </script>
    <!-- Meta Pixel Code -->
    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '850389076003466');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=850389076003466&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
    <!-- Meta Pixel Code -->
    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '850389076003466');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=850389076003466&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
    <title>Party || Witty</title>



</head>


<body>
    @include("web.include.header")

    <link rel="stylesheet" href="{{ url('public/raman/css/style.css') }}" />



    <br><br><br>
    <br><br>

    <section class="bg-white" style="background-color:white;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="nvg-card-left">
                                <h4 class="fd-category">Food</h4>
                                <ul class="nav nav-tabs nv-tbs-cutm ">
                                    <li class="veg-title"><a href="#tab1" class="active" data-toggle="tab">Veg</a></li>
                                    <li class="veg-title"><a href="#tab2" data-toggle="tab">Non Veg</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="nvg-card-left">
                                <h4 class="fd-category">Cities</h4>
                                <div class="form-group">
                                    <input type="text" class="form-control frm-ctrl" id="exampleFormControlInput1"
                                        placeholder="cities">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="nvg-card-left">
                                <h4 class="fd-category">Location</h4>
                                <div class="form-group">
                                    <input type="text" class="form-control frm-ctrl" id="exampleFormControlInput1"
                                        placeholder="Area location">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <!-- <ul class="nav nav-tabs  nav-justified">
                        <li class="veg-title"><a href="#tab1" class="active" data-toggle="tab">Veg</a></li>
                        <li class="veg-title"><a href="#tab2" data-toggle="tab">Non Veg</a></li>
                    </ul> -->
                    <div class="tab-content mtop">
                        <div class="container-fluid tab-pane active" id="tab1">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="cards-bought">
                                                <div class="row">
                                                    <div class="col-xs-8  col-lg-8">
                                                        <div class="boght">
                                                            <h6>188 Bought</h6>
                                                            <h4>4IMFL(30ml)/4 BEAR
                                                                +1 Starter/Pint </h4>
                                                            <p>Free Cancellation</p>
                                                        </div>
                                                        <div class="time-bx">
                                                            <div class="valid-fl">
                                                                <span>Valid on:</span>
                                                                <span>All Days</span>
                                                            </div>
                                                            <div class="valid-fl">
                                                                <span>Timing:</span>
                                                                <span>12 PM - 12 AM</span>
                                                                <!-- tooltip start -->
                                                                <a data-placement="top" data-toggle="popover"
                                                                    data-container="body" data-placement="top"
                                                                    type="button" data-html="true" href="#"
                                                                    id="login"><span class="fa fa-caret-down"
                                                                        style="margin:3px 0 0 0"></span></a>
                                                                <div id="popover-content" class="hide">
                                                                    <!-- <h6>helloooo</h6> -->
                                                                    <div class="section">
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Sunday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium">
                                                                                        6 PM - 12 AM</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Monday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium text-danger">
                                                                                        Not Valid</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Tuesday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium text-red">
                                                                                        Not Valid</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Wednesday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium text-red">
                                                                                        Not Valid</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Thursday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium text-red">
                                                                                        Not Valid</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Friday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium">
                                                                                        6 PM - 12 AM</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p
                                                                                        class="card-main__desc txt-brand-secondary">
                                                                                        Saturday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">

                                                                                    <p
                                                                                        class="card-main__desc font-medium">
                                                                                        6 PM - 12 AM</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- tooltip end -->
                                                            </div>
                                                            <div class="valid-fl">
                                                                <span>Valid:</span>
                                                                <span>2 People</span>
                                                            </div>
                                                            <div class="incl-flex">
                                                                <button class="inclsn-btn" data-toggle="modal"
                                                                    data-target="#myModal">Inclusions</button>
                                                                <button class="inclsn-btn mleft" data-toggle="modal"
                                                                    data-target="#myModales">Details</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4 col-lg-4">
                                                        <div class="mtr-bx">
                                                            <h4>MSP- 6500/-</h4>
                                                            <h6 class="of-btn">56% OFF</h6>
                                                            <!-- price meter box -->
                                                            <div class='centered-box'>
                                                                <div class="gauge-box" data-percent='88'>
                                                                    <svg version="1.1" class="gauge-meter-chart"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        x="0px" y="0px" viewBox="0 0 100 51"
                                                                        style="enable-background:new 0 0 100 51;"
                                                                        xml:space="preserve">
                                                                        <g class="meter">
                                                                            <path class="p1" fill="#0FFF50"
                                                                                d="M4.1,31C2.6,34.6,1.6,38.5,1,42.4C0.5,45.9,3.2,49,6.7,49h0c2.8,0,5.3-2,5.7-4.8c0.4-3,1.2-6,2.3-8.7L4.1,31z" />
                                                                            <path class="p-2" fill="#0FFF50"
                                                                                d="M14.7,14.9c-4.3,4.4-7.8,9.5-10.2,15.2l10.6,4.4c1.9-4.3,4.5-8.2,7.7-11.5L14.7,14.9z" />
                                                                            <path class="p-3" fill="#0FFF50"
                                                                                d="M30.6,4c-5.7,2.4-10.9,5.9-15.2,10.2l8.1,8.1c3.3-3.2,7.2-5.9,11.5-7.7L30.6,4z" />
                                                                            <path class="p-4" fill="#3CFF2A"
                                                                                d="M49.5,0c-6.3,0.1-12.4,1.3-18,3.6l4.4,10.6c4.2-1.7,8.8-2.6,13.6-2.7V0z" />
                                                                            <path class="p-5" fill="#3CFF2A"
                                                                                d="M68.5,3.6c-5.6-2.2-11.6-3.5-18-3.6v11.5c4.8,0.1,9.4,1,13.6,2.7L68.5,3.6z" />
                                                                            <path class="p-6" fill="#00FFFF"
                                                                                d="M84.6,14.2C80.3,9.9,75.1,6.4,69.4,4L65,14.6c4.3,1.9,8.2,4.5,11.5,7.7L84.6,14.2z" />
                                                                            <path class="p-7" fill="#00FFFF"
                                                                                d="M95.5,30.1c-2.4-5.7-5.9-10.9-10.2-15.2L77.2,23c3.2,3.3,5.9,7.2,7.7,11.5L95.5,30.1z" />
                                                                            <path class="p-8" fill="#00FFFF"
                                                                                d="M99,42.4c-0.6-4-1.6-7.8-3.1-11.4l-10.6,4.4c1.1,2.8,1.9,5.7,2.3,8.7C88,47,90.5,49,93.3,49h0C96.8,49,99.5,45.9,99,42.4z" />
                                                                        </g>
                                                                        <path class="pointer"
                                                                            d="M51,47.3V18l1.7,0L50,13.1L47.3,18H49l0,29.3c-0.6,0.3-1,1-1,1.7c0,1.1,0.9,2,2,2s2-0.9,2-2C52,48.3,51.6,47.6,51,47.3z" />
                                                                    </svg>
                                                                    <h5>₹ 4500/-</h5>
                                                                    <p>Inc. of all taxes</p>
                                                                    <div class="add-ntn-div">
                                                                        <a class="add-btn" href="{{url('cart')}}"
                                                                            target="_blank"
                                                                            rel="noopener noreferrer">Add
                                                                            +</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="cards-bought">
                                                <div class="row">
                                                    <div class="col-xs-8  col-lg-8">
                                                        <div class="boght">
                                                            <h6>188 Bought</h6>
                                                            <h4>4IMFL(30ml)/4 BEAR
                                                                +1 Starter/Pint </h4>
                                                            <p>Free Cancellation</p>
                                                        </div>
                                                        <div class="time-bx">
                                                            <div class="valid-fl">
                                                                <span>Valid on:</span>
                                                                <span>All Days</span>
                                                            </div>
                                                            <div class="valid-fl">
                                                                <span>Timing:</span>
                                                                <span>12 PM - 12 AM</span>
                                                                <!-- tooltip start -->
                                                                <a data-placement="top" data-toggle="popover"
                                                                    data-container="body" data-placement="top"
                                                                    type="button" data-html="true" href="#"
                                                                    id="login"><span class="fa fa-caret-down"
                                                                        style="margin:3px 0 0 0"></span></a>
                                                                <div id="popover-content" class="hide">
                                                                    <!-- <h6>helloooo</h6> -->
                                                                    <div class="section">
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Sunday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium">
                                                                                        6 PM - 12 AM</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Monday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium text-danger">
                                                                                        Not Valid</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Tuesday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium text-red">
                                                                                        Not Valid</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Wednesday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium text-red">
                                                                                        Not Valid</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Thursday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium text-red">
                                                                                        Not Valid</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Friday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium">
                                                                                        6 PM - 12 AM</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p
                                                                                        class="card-main__desc txt-brand-secondary">
                                                                                        Saturday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">

                                                                                    <p
                                                                                        class="card-main__desc font-medium">
                                                                                        6 PM - 12 AM</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- tooltip end -->
                                                            </div>
                                                            <div class="valid-fl">
                                                                <span>Valid:</span>
                                                                <span>2 People</span>
                                                            </div>
                                                            <div class="incl-flex">
                                                                <button class="inclsn-btn" data-toggle="modal"
                                                                    data-target="#myModal">Inclusions</button>
                                                                <button class="inclsn-btn mleft" data-toggle="modal"
                                                                    data-target="#myModales">Details</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4 col-lg-4">
                                                        <div class="mtr-bx">
                                                            <h4>MSP- 6500/-</h4>
                                                            <h6 class="of-btn">56% OFF</h6>
                                                            <!-- price meter box -->
                                                            <div class='centered-box'>
                                                                <div class="gauge-box" data-percent='88'>
                                                                    <svg version="1.1" class="gauge-meter-chart"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        x="0px" y="0px" viewBox="0 0 100 51"
                                                                        style="enable-background:new 0 0 100 51;"
                                                                        xml:space="preserve">
                                                                        <g class="meter">
                                                                            <path class="p1" fill="#0FFF50"
                                                                                d="M4.1,31C2.6,34.6,1.6,38.5,1,42.4C0.5,45.9,3.2,49,6.7,49h0c2.8,0,5.3-2,5.7-4.8c0.4-3,1.2-6,2.3-8.7L4.1,31z" />
                                                                            <path class="p-2" fill="#0FFF50"
                                                                                d="M14.7,14.9c-4.3,4.4-7.8,9.5-10.2,15.2l10.6,4.4c1.9-4.3,4.5-8.2,7.7-11.5L14.7,14.9z" />
                                                                            <path class="p-3" fill="#0FFF50"
                                                                                d="M30.6,4c-5.7,2.4-10.9,5.9-15.2,10.2l8.1,8.1c3.3-3.2,7.2-5.9,11.5-7.7L30.6,4z" />
                                                                            <path class="p-4" fill="#3CFF2A"
                                                                                d="M49.5,0c-6.3,0.1-12.4,1.3-18,3.6l4.4,10.6c4.2-1.7,8.8-2.6,13.6-2.7V0z" />
                                                                            <path class="p-5" fill="#3CFF2A"
                                                                                d="M68.5,3.6c-5.6-2.2-11.6-3.5-18-3.6v11.5c4.8,0.1,9.4,1,13.6,2.7L68.5,3.6z" />
                                                                            <path class="p-6" fill="#00FFFF"
                                                                                d="M84.6,14.2C80.3,9.9,75.1,6.4,69.4,4L65,14.6c4.3,1.9,8.2,4.5,11.5,7.7L84.6,14.2z" />
                                                                            <path class="p-7" fill="#00FFFF"
                                                                                d="M95.5,30.1c-2.4-5.7-5.9-10.9-10.2-15.2L77.2,23c3.2,3.3,5.9,7.2,7.7,11.5L95.5,30.1z" />
                                                                            <path class="p-8" fill="#00FFFF"
                                                                                d="M99,42.4c-0.6-4-1.6-7.8-3.1-11.4l-10.6,4.4c1.1,2.8,1.9,5.7,2.3,8.7C88,47,90.5,49,93.3,49h0C96.8,49,99.5,45.9,99,42.4z" />
                                                                        </g>
                                                                        <path class="pointer"
                                                                            d="M51,47.3V18l1.7,0L50,13.1L47.3,18H49l0,29.3c-0.6,0.3-1,1-1,1.7c0,1.1,0.9,2,2,2s2-0.9,2-2C52,48.3,51.6,47.6,51,47.3z" />
                                                                    </svg>
                                                                    <h5>₹ 4500/-</h5>
                                                                    <p>Inc. of all taxes</p>
                                                                    <div class="add-ntn-div">
                                                                        <a class="add-btn" href="{{url('cart')}}"
                                                                            target="_blank"
                                                                            rel="noopener noreferrer">Add
                                                                            +</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="cards-bought">
                                                <div class="row">
                                                    <div class="col-xs-8  col-lg-8">
                                                        <div class="boght">
                                                            <h6>188 Bought</h6>
                                                            <h4>4IMFL(30ml)/4 BEAR
                                                                +1 Starter/Pint </h4>
                                                            <p>Free Cancellation</p>
                                                        </div>
                                                        <div class="time-bx">
                                                            <div class="valid-fl">
                                                                <span>Valid on:</span>
                                                                <span>All Days</span>
                                                            </div>
                                                            <div class="valid-fl">
                                                                <span>Timing:</span>
                                                                <span>12 PM - 12 AM</span>
                                                                <!-- tooltip start -->
                                                                <a data-placement="top" data-toggle="popover"
                                                                    data-container="body" data-placement="top"
                                                                    type="button" data-html="true" href="#"
                                                                    id="login"><span class="fa fa-caret-down"
                                                                        style="margin:3px 0 0 0"></span></a>
                                                                <div id="popover-content" class="hide">
                                                                    <!-- <h6>helloooo</h6> -->
                                                                    <div class="section">
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Sunday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium">
                                                                                        6 PM - 12 AM</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Monday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium text-danger">
                                                                                        Not Valid</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Tuesday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium text-red">
                                                                                        Not Valid</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Wednesday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium text-red">
                                                                                        Not Valid</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Thursday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium text-red">
                                                                                        Not Valid</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Friday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium">
                                                                                        6 PM - 12 AM</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p
                                                                                        class="card-main__desc txt-brand-secondary">
                                                                                        Saturday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">

                                                                                    <p
                                                                                        class="card-main__desc font-medium">
                                                                                        6 PM - 12 AM</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- tooltip end -->
                                                            </div>
                                                            <div class="valid-fl">
                                                                <span>Valid:</span>
                                                                <span>2 People</span>
                                                            </div>
                                                            <div class="incl-flex">
                                                                <button class="inclsn-btn" data-toggle="modal"
                                                                    data-target="#myModal">Inclusions</button>
                                                                <button class="inclsn-btn mleft" data-toggle="modal"
                                                                    data-target="#myModales">Details</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4 col-lg-4">
                                                        <div class="mtr-bx">
                                                            <h4>MSP- 6500/-</h4>
                                                            <h6 class="of-btn">56% OFF</h6>
                                                            <!-- price meter box -->
                                                            <div class='centered-box'>
                                                                <div class="gauge-box" data-percent='88'>
                                                                    <svg version="1.1" class="gauge-meter-chart"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        x="0px" y="0px" viewBox="0 0 100 51"
                                                                        style="enable-background:new 0 0 100 51;"
                                                                        xml:space="preserve">
                                                                        <g class="meter">
                                                                            <path class="p1" fill="#0FFF50"
                                                                                d="M4.1,31C2.6,34.6,1.6,38.5,1,42.4C0.5,45.9,3.2,49,6.7,49h0c2.8,0,5.3-2,5.7-4.8c0.4-3,1.2-6,2.3-8.7L4.1,31z" />
                                                                            <path class="p-2" fill="#0FFF50"
                                                                                d="M14.7,14.9c-4.3,4.4-7.8,9.5-10.2,15.2l10.6,4.4c1.9-4.3,4.5-8.2,7.7-11.5L14.7,14.9z" />
                                                                            <path class="p-3" fill="#0FFF50"
                                                                                d="M30.6,4c-5.7,2.4-10.9,5.9-15.2,10.2l8.1,8.1c3.3-3.2,7.2-5.9,11.5-7.7L30.6,4z" />
                                                                            <path class="p-4" fill="#3CFF2A"
                                                                                d="M49.5,0c-6.3,0.1-12.4,1.3-18,3.6l4.4,10.6c4.2-1.7,8.8-2.6,13.6-2.7V0z" />
                                                                            <path class="p-5" fill="#3CFF2A"
                                                                                d="M68.5,3.6c-5.6-2.2-11.6-3.5-18-3.6v11.5c4.8,0.1,9.4,1,13.6,2.7L68.5,3.6z" />
                                                                            <path class="p-6" fill="#00FFFF"
                                                                                d="M84.6,14.2C80.3,9.9,75.1,6.4,69.4,4L65,14.6c4.3,1.9,8.2,4.5,11.5,7.7L84.6,14.2z" />
                                                                            <path class="p-7" fill="#00FFFF"
                                                                                d="M95.5,30.1c-2.4-5.7-5.9-10.9-10.2-15.2L77.2,23c3.2,3.3,5.9,7.2,7.7,11.5L95.5,30.1z" />
                                                                            <path class="p-8" fill="#00FFFF"
                                                                                d="M99,42.4c-0.6-4-1.6-7.8-3.1-11.4l-10.6,4.4c1.1,2.8,1.9,5.7,2.3,8.7C88,47,90.5,49,93.3,49h0C96.8,49,99.5,45.9,99,42.4z" />
                                                                        </g>
                                                                        <path class="pointer"
                                                                            d="M51,47.3V18l1.7,0L50,13.1L47.3,18H49l0,29.3c-0.6,0.3-1,1-1,1.7c0,1.1,0.9,2,2,2s2-0.9,2-2C52,48.3,51.6,47.6,51,47.3z" />
                                                                    </svg>
                                                                    <h5>₹ 4500/-</h5>
                                                                    <p>Inc. of all taxes</p>
                                                                    <div class="add-ntn-div">
                                                                        <a class="add-btn" href="{{url('cart')}}"
                                                                            target="_blank"
                                                                            rel="noopener noreferrer">Add
                                                                            +</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="cards-bought">
                                                <div class="row">
                                                    <div class="col-xs-8  col-lg-8">
                                                        <div class="boght">
                                                            <h6>188 Bought</h6>
                                                            <h4>4IMFL(30ml)/4 BEAR
                                                                +1 Starter/Pint </h4>
                                                            <p>Free Cancellation</p>
                                                        </div>
                                                        <div class="time-bx">
                                                            <div class="valid-fl">
                                                                <span>Valid on:</span>
                                                                <span>All Days</span>
                                                            </div>
                                                            <div class="valid-fl">
                                                                <span>Timing:</span>
                                                                <span>12 PM - 12 AM</span>
                                                                <!-- tooltip start -->
                                                                <a data-placement="top" data-toggle="popover"
                                                                    data-container="body" data-placement="top"
                                                                    type="button" data-html="true" href="#"
                                                                    id="login"><span class="fa fa-caret-down"
                                                                        style="margin:3px 0 0 0"></span></a>
                                                                <div id="popover-content" class="hide">
                                                                    <!-- <h6>helloooo</h6> -->
                                                                    <div class="section">
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Sunday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium">
                                                                                        6 PM - 12 AM</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Monday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium text-danger">
                                                                                        Not Valid</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Tuesday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium text-red">
                                                                                        Not Valid</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Wednesday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium text-red">
                                                                                        Not Valid</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Thursday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium text-red">
                                                                                        Not Valid</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p class="card-main__desc">
                                                                                        Friday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <p
                                                                                        class="card-main__desc font-medium">
                                                                                        6 PM - 12 AM</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="margin-bottom-xs">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <p
                                                                                        class="card-main__desc txt-brand-secondary">
                                                                                        Saturday</p>
                                                                                </div>
                                                                                <div class="col-sm-8">

                                                                                    <p
                                                                                        class="card-main__desc font-medium">
                                                                                        6 PM - 12 AM</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- tooltip end -->
                                                            </div>
                                                            <div class="valid-fl">
                                                                <span>Valid:</span>
                                                                <span>2 People</span>
                                                            </div>
                                                            <div class="incl-flex">
                                                                <button class="inclsn-btn" data-toggle="modal"
                                                                    data-target="#myModal">Inclusions</button>
                                                                <button class="inclsn-btn mleft" data-toggle="modal"
                                                                    data-target="#myModales">Details</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-4 col-lg-4">
                                                        <div class="mtr-bx">
                                                            <h4>MSP- 6500/-</h4>
                                                            <h6 class="of-btn">56% OFF</h6>
                                                            <!-- price meter box -->
                                                            <div class='centered-box'>
                                                                <div class="gauge-box" data-percent='88'>
                                                                    <svg version="1.1" class="gauge-meter-chart"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        x="0px" y="0px" viewBox="0 0 100 51"
                                                                        style="enable-background:new 0 0 100 51;"
                                                                        xml:space="preserve">
                                                                        <g class="meter">
                                                                            <path class="p1" fill="#0FFF50"
                                                                                d="M4.1,31C2.6,34.6,1.6,38.5,1,42.4C0.5,45.9,3.2,49,6.7,49h0c2.8,0,5.3-2,5.7-4.8c0.4-3,1.2-6,2.3-8.7L4.1,31z" />
                                                                            <path class="p-2" fill="#0FFF50"
                                                                                d="M14.7,14.9c-4.3,4.4-7.8,9.5-10.2,15.2l10.6,4.4c1.9-4.3,4.5-8.2,7.7-11.5L14.7,14.9z" />
                                                                            <path class="p-3" fill="#0FFF50"
                                                                                d="M30.6,4c-5.7,2.4-10.9,5.9-15.2,10.2l8.1,8.1c3.3-3.2,7.2-5.9,11.5-7.7L30.6,4z" />
                                                                            <path class="p-4" fill="#3CFF2A"
                                                                                d="M49.5,0c-6.3,0.1-12.4,1.3-18,3.6l4.4,10.6c4.2-1.7,8.8-2.6,13.6-2.7V0z" />
                                                                            <path class="p-5" fill="#3CFF2A"
                                                                                d="M68.5,3.6c-5.6-2.2-11.6-3.5-18-3.6v11.5c4.8,0.1,9.4,1,13.6,2.7L68.5,3.6z" />
                                                                            <path class="p-6" fill="#00FFFF"
                                                                                d="M84.6,14.2C80.3,9.9,75.1,6.4,69.4,4L65,14.6c4.3,1.9,8.2,4.5,11.5,7.7L84.6,14.2z" />
                                                                            <path class="p-7" fill="#00FFFF"
                                                                                d="M95.5,30.1c-2.4-5.7-5.9-10.9-10.2-15.2L77.2,23c3.2,3.3,5.9,7.2,7.7,11.5L95.5,30.1z" />
                                                                            <path class="p-8" fill="#00FFFF"
                                                                                d="M99,42.4c-0.6-4-1.6-7.8-3.1-11.4l-10.6,4.4c1.1,2.8,1.9,5.7,2.3,8.7C88,47,90.5,49,93.3,49h0C96.8,49,99.5,45.9,99,42.4z" />
                                                                        </g>
                                                                        <path class="pointer"
                                                                            d="M51,47.3V18l1.7,0L50,13.1L47.3,18H49l0,29.3c-0.6,0.3-1,1-1,1.7c0,1.1,0.9,2,2,2s2-0.9,2-2C52,48.3,51.6,47.6,51,47.3z" />
                                                                    </svg>
                                                                    <h5>₹ 4500/-</h5>
                                                                    <p>Inc. of all taxes</p>
                                                                    <div class="add-ntn-div">
                                                                        <a class="add-btn" href="{{url('cart')}}"
                                                                            target="_blank"
                                                                            rel="noopener noreferrer">Add
                                                                            +</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane" id="tab2">
                            <p class="text-danger">Non Veg Section.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- inclusion modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal Title</h4>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- detail modal -->

    <div class="modal fade" id="myModales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal Title</h4>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>














    @include("web.include.footer")
    <!-- @include("web.include.foot") -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="assets/js/owl.carousel.js"></script>
<script src="assets/js/index.js"></script>
<script src="https://use.fontawesome.com/8280fd1790.js"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-..../" -->
    crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ url('') }}/public/user/assets/js/slick.js"></script>
    <script src="{{ url('') }}/public/user/assets/js/index.js"></script>
    <script src="{{ url('') }}/public/user/assets/js/slider.js"></script>

    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.3.3/d3.min.js"></script>



    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/6385dffdb0d6371309d1b006/1gj1f5tmv';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
    </script>
    <!--End of Tawk.to Script-->



    <script>
    // let bodyclassname = "login--page";
    // $('body').addClass(bodyclassname);



    function bodyClass(className) {
        document.body.classList.add(className);
    }
    </script>
    <script>
    function signout() {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: " you want to logout.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, logout!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{url('logout')}}";
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'You Are logged in.',
                    'error'
                )
            }
        })
    }
    </script>
    <script>
    $("[data-toggle=popover]").popover({
        html: true,
        content: function() {
            return $('#popover-content').html();
        }
    });
    </script>
    <script>
    function GaugeChart_SetPercent(el, _perc) {
        el.dataset.percent = _perc;
        //.innerHtml = _perc + "%";
        console.log(el.querySelector(".text"));
    }

    function GaugeChart_BehaviorInit() {
        document.querySelectorAll(".gauge-box").forEach(function(el, index) {
            GaugeChart_Animate(el);
            return;
        });
    }

    function GaugeChart_Animate(el) {
        var pointer = el.querySelector(".pointer");
        //var percent_text = el.querySelector(".text");
        if (!pointer)
            return;
        /*if (!percent_text)
            return;*/
        console.log("OK");
        var percent_deg = 1.2;
        if (el.dataset.percent) {
            var _perc = parseInt(el.dataset.percent);
            var _percFrom = 0;
            var percent_deg_style = _perc * percent_deg - 90;
            if (percent_deg_style < -90)
                percent_deg_style = -90;
            if (percent_deg_style > 90)
                percent_deg_style = 90;
            pointer.style.transform = "rotateZ(-90deg)";
            var indicator_index;
            for (var i = 0; i < 7; i++) {
                var piece_percent = 100 / 8;
                if (CheckBetween(_perc, piece_percent * i, piece_percent * (i + 1))) {
                    indicator_index = i + 1;
                    console.log(indicator_index + 1);
                    break;
                }
            }
            var piece_sel = el.querySelector(".p-" + indicator_index);
            if (piece_sel) {
                //piece_sel.style.opacity = "1";
                piece_sel.classList.add("selected");
            }
            setInterval(function() {
                pointer.style.transform = "rotateZ(" + percent_deg_style + "deg)";
                if (_perc >= 87.5) {
                    el.querySelector(".flame-gauge").classList.add("active");
                } else {
                    el.querySelector(".flame-gauge").classList.remove("active");
                }
            }, 100);
        }
    }

    function CheckBetween(num, min, max) {
        if (num >= min && num < max) {
            return true;
        }
        return false;
    }
    GaugeChart_BehaviorInit();
    </script>

</body>

</html>