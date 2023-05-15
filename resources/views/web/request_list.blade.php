@include("web.include.head")
@include("web.include.header")
<section class="profile--section">
    <div class="main--box">
        <div class="wrapper--box">
            <div class="left--box">
                <div class="sidebar">
                    <div class="profile--box">
                        <a href="javascript:void(0);" class="mobile--sidebar">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                        <img src="{{url('')}}/public/user/assets/img/user.png" alt="">
                        <h5>Adwerd Shwn</h5>                        
                    </div>
                    <div class="side--nav">
                        <ul>
                            <li>
                                <a href="javascript:void(0);"  class="side--url">
                                    <img src="{{url('')}}/public/user/assets/img/side_icon/dashboard.png" alt=""> 
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('my-profile')}}"  class="side--url">
                                    <img src="{{url('')}}/public/user/assets/img/side_icon/user.png" alt=""> 
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('request-list')}}"  class="side--url active">
                                    <img src="{{url('')}}/public/user/assets/img/side_icon/requset.png" alt=""> 
                                    <span>Request</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"  class="side--url">
                                    <img src="{{url('')}}/public/user/assets/img/side_icon/calender.png" alt=""> 
                                    <span>Event</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"  class="side--url">
                                    <img src="{{url('')}}/public/user/assets/img/side_icon/wallet.png" alt=""> 
                                    <span>Wallet</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
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
                                   <?php for($s=1; $s<5; $s++){?>
                                    <div class="box--artist">
                                        <div class="wrapper--box">
                                            <div class="img--box">
                                                <img src="{{url('')}}/public/user/assets/img/client_img.png" alt="">
                                            </div>
                                            <div class="content">
                                                <h5>David Borg</h5>
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
                                            </div>
                                        </div>
                                        <!-- <div class="btn--box">
                                            <a href="confirm_booking.php" type="button" class="btn--style">Request For Booking</a>
                                        </div> -->
                                    </div> 
                                    <?php }?>                                   
                                </div>
                                <div class="row">
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
                            <form action="">
                                <div class="list">
                                    <h5 class="hd--name">What Type of Artist</h5>
                                    <div class="wrapper--box">
                                        <div class="list--box">
                                            <p>Vocalist</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="list--box">
                                            <p>Musician</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="list--box">
                                            <p>Anchor</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="list--box">
                                            <p>Dj</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="list--box">
                                            <p>Band</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="add--more--list">
                                            <a href="javascript:void(0);"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list">
                                    <h5 class="hd--name">Music Type/Genre of Music </h5>
                                    <div class="wrapper--box">
                                        <div class="list--box">
                                            <p>Western</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="list--box">
                                            <p>Sufi</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="list--box">
                                            <p>Folk</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="list--box">
                                            <p>Funk</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="list--box">
                                            <p>Jazz</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="list--box">
                                            <p>Latin</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="list--box">
                                            <p>Hard rock</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="add--more--list">
                                            <a href="javascript:void(0);"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list">
                                    <h5 class="hd--name">Venue you Wish To Perform At </h5>
                                    <div class="wrapper--box">
                                        <div class="list--box">
                                            <p>Birthday</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="list--box">
                                            <p>Marriage</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="add--more--list">
                                            <a href="javascript:void(0);"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-primary" type="button">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>                       
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</section>
@include("web.include.footer")
@include("web.include.foot")
