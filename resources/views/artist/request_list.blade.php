@include("web.include.head")
@include("web.include.header")
<section class="profile--section">
    <div class="main--box">
        <div class="wrapper--box">
            @include("web.include.sidebar")
            <div class="right--box">
                <div class="tab--box">
                    <div class="tab--navbar">
                        <ul class="nav--buttons">
                            <li class="active">
                                <a href="#request" class="tab--url">Request</a>
                            </li>
                            <li>
                                <a href="#event" class="tab--url">Event</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab--body">
                        <div class="tab--content" id="request">
                            <div class="title">
                                <h5>Request </h5>
                            </div>
                            <form action="">
                                <div class="grid--box">
                                    <?php foreach ($requests as $request) { ?>
                                        <div class="box--artist">
                                            <div class="wrapper--box">
                                                <div class="img--box">
                                                    <img src="{{url('')}}/public/user/assets/img/client_img.png" alt="">
                                                </div>
                                                <div class="content">
                                                    <h5>{{$request['username']}}</h5>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <div class="art--skill">
                                                        <div class="skill--name">Gitarist </div>
                                                        ,
                                                        <div class="skill--name">Singer </div>
                                                    </div>
                                                    <div class="ul--box">
                                                        <div class="li--box"><img src="{{url('')}}/public/user/assets/img/music.png" alt=""><span>12</span></div>
                                                        <div class="li--box"><img src="{{url('')}}/public/user/assets/img/user_1.png" alt=""><span>1.5k</span></div>
                                                        <div class="li--box"><img src="{{url('')}}/public/user/assets/img/cmt.png" alt=""><span>12</span></div>
                                                    </div>
                                                    @if($request['status'] == '0')
                                                    <?php $id = $request['id']; ?>
                                                    <button type="botton" onclick='statusChange("{{$id}}","1")' class="btn btn-primary">accept</button>
                                                    <button type="botton" onclick='statusChange("{{$id}}","2")' class="btn btn-danger">Denied</button>
                                                    @elseif($request['status'] == '2')
                                                    <button type="botton" class="btn btn-danger">Rejected</button>
                                                    @else
                                                    <button type="botton" class="btn btn-success">Accepted</button>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- <div class="btn--box">
                                            <a href="confirm_booking.php" type="button" class="btn--style">Request For Booking</a>
                                        </div> -->
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-primary" type="button">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab--content" id="event" style="display: none;">
                            <div class="title">
                                <h5>Event</h5>
                            </div>
                            <div class="grid--box">
                                <div class="card--style">
                                    <div class="cb--style">
                                        <div class="wrapper--style">
                                            <div class="img--box">
                                                <img src="{{url('')}}/public/user/assets/img/event_1.png" alt="" class="event_img">
                                            </div>
                                        
                                            <div class="content--box">
                                                <h5>California party: 2022</h5>
                                                <p><i class="fa fa-clock-o"></i> 12 PM - 4 PM, 7 PM - 11 PM</p>
                                                <p>4 People</p>
                                                <p>Sun ,Sat</p>
                                                <p><i class="fa fa-music"></i> Sufi, Foke</p>
                                                <p>It is a long established fact that a reader will be distracteby the readable content </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ft--style">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>
                                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7 0.125C5.35954 0.126861 3.78681 0.779354 2.62683 1.93933C1.46685 3.09931 0.814361 4.67204 0.8125 6.3125C0.8125 11.607 6.4375 15.6078 6.67656 15.7766C6.77237 15.8404 6.8849 15.8744 7 15.8744C7.1151 15.8744 7.22763 15.8404 7.32344 15.7766C7.5625 15.6078 13.1875 11.607 13.1875 6.3125C13.1856 4.67204 12.5331 3.09931 11.3732 1.93933C10.2132 0.779354 8.64046 0.126861 7 0.125ZM7 4.0625C7.44501 4.0625 7.88002 4.19446 8.25003 4.44169C8.62004 4.68893 8.90843 5.04033 9.07873 5.45146C9.24903 5.8626 9.29358 6.315 9.20677 6.75145C9.11995 7.18791 8.90566 7.58882 8.59099 7.90349C8.27632 8.21816 7.87541 8.43245 7.43895 8.51927C7.0025 8.60608 6.5501 8.56153 6.13896 8.39123C5.72783 8.22093 5.37643 7.93254 5.12919 7.56253C4.88196 7.19252 4.75 6.75751 4.75 6.3125C4.75 5.71576 4.98705 5.14347 5.40901 4.72151C5.83097 4.29955 6.40326 4.0625 7 4.0625Z" fill="white"/>
                                                    </svg> 
                                                    California, CA
                                                </p>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="wrapper--box">
                                                    <div class="price--box">&#8377; 5000/-</div>
                                                    <div class="btn--style accepted">Accepted</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card--style">
                                    <div class="cb--style">
                                        <div class="wrapper--style">
                                            <div class="img--box">
                                                <img src="{{url('')}}/public/user/assets/img/event_1.png" alt="" class="event_img">
                                            </div>
                                        
                                            <div class="content--box">
                                                <h5>California party: 2022</h5>
                                                <p><i class="fa fa-clock-o"></i> 12 PM - 4 PM, 7 PM - 11 PM</p>
                                                <p>4 People</p>
                                                <p>Sun ,Sat</p>
                                                <p><i class="fa fa-music"></i> Sufi, Foke</p>
                                                <p>It is a long established fact that a reader will be distracteby the readable content </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ft--style">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>
                                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7 0.125C5.35954 0.126861 3.78681 0.779354 2.62683 1.93933C1.46685 3.09931 0.814361 4.67204 0.8125 6.3125C0.8125 11.607 6.4375 15.6078 6.67656 15.7766C6.77237 15.8404 6.8849 15.8744 7 15.8744C7.1151 15.8744 7.22763 15.8404 7.32344 15.7766C7.5625 15.6078 13.1875 11.607 13.1875 6.3125C13.1856 4.67204 12.5331 3.09931 11.3732 1.93933C10.2132 0.779354 8.64046 0.126861 7 0.125ZM7 4.0625C7.44501 4.0625 7.88002 4.19446 8.25003 4.44169C8.62004 4.68893 8.90843 5.04033 9.07873 5.45146C9.24903 5.8626 9.29358 6.315 9.20677 6.75145C9.11995 7.18791 8.90566 7.58882 8.59099 7.90349C8.27632 8.21816 7.87541 8.43245 7.43895 8.51927C7.0025 8.60608 6.5501 8.56153 6.13896 8.39123C5.72783 8.22093 5.37643 7.93254 5.12919 7.56253C4.88196 7.19252 4.75 6.75751 4.75 6.3125C4.75 5.71576 4.98705 5.14347 5.40901 4.72151C5.83097 4.29955 6.40326 4.0625 7 4.0625Z" fill="white"/>
                                                    </svg> 
                                                    California, CA
                                                </p>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="wrapper--box">
                                                    <div class="price--box">&#8377; 5000/-</div>
                                                    <div class="btn--style denid">Denid</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card--style">
                                    <div class="cb--style">
                                        <div class="wrapper--style">
                                            <div class="img--box">
                                                <img src="{{url('')}}/public/user/assets/img/event_1.png" alt="" class="event_img">
                                            </div>
                                        
                                            <div class="content--box">
                                                <h5>California party: 2022</h5>
                                                <p><i class="fa fa-clock-o"></i> 12 PM - 4 PM, 7 PM - 11 PM</p>
                                                <p>4 People</p>
                                                <p>Sun ,Sat</p>
                                                <p><i class="fa fa-music"></i> Sufi, Foke</p>
                                                <p>It is a long established fact that a reader will be distracteby the readable content </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ft--style">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p>
                                                    <svg width="14" height="16" viewBox="0 0 14 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M7 0.125C5.35954 0.126861 3.78681 0.779354 2.62683 1.93933C1.46685 3.09931 0.814361 4.67204 0.8125 6.3125C0.8125 11.607 6.4375 15.6078 6.67656 15.7766C6.77237 15.8404 6.8849 15.8744 7 15.8744C7.1151 15.8744 7.22763 15.8404 7.32344 15.7766C7.5625 15.6078 13.1875 11.607 13.1875 6.3125C13.1856 4.67204 12.5331 3.09931 11.3732 1.93933C10.2132 0.779354 8.64046 0.126861 7 0.125ZM7 4.0625C7.44501 4.0625 7.88002 4.19446 8.25003 4.44169C8.62004 4.68893 8.90843 5.04033 9.07873 5.45146C9.24903 5.8626 9.29358 6.315 9.20677 6.75145C9.11995 7.18791 8.90566 7.58882 8.59099 7.90349C8.27632 8.21816 7.87541 8.43245 7.43895 8.51927C7.0025 8.60608 6.5501 8.56153 6.13896 8.39123C5.72783 8.22093 5.37643 7.93254 5.12919 7.56253C4.88196 7.19252 4.75 6.75751 4.75 6.3125C4.75 5.71576 4.98705 5.14347 5.40901 4.72151C5.83097 4.29955 6.40326 4.0625 7 4.0625Z" fill="white"/>
                                                    </svg> 
                                                    California, CA
                                                </p>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="wrapper--box">
                                                    <div class="price--box">&#8377; 5000/-</div>
                                                    <div class="btn--style expiry">Expiry</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary" type="button">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include("web.include.footer")
@include("web.include.foot")

<script>
    function statusChange(id, status) {
        $.ajax({
            url: '{{url("request_accept_reject_status")}}',
            type: 'post',
            data: {
                id: id,
                status: status,
                "_token": "{{ csrf_token() }}"
            },
        }).done(function(data) {
            location.reload();
            // Optionally alert the user of success here...
        }).fail(function(data) {
            // Optionally alert the user of an error here...
        });
    }
</script>
<script>
    bodyClass('request');
</script>