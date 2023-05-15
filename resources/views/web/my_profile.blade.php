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
                                <a href="{{url('my-profile')}}"  class="side--url active">
                                    <img src="{{url('')}}/public/user/assets/img/side_icon/user.png" alt=""> 
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('request-list')}}"  class="side--url">
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
                                <a href="#primary_details" class="tab--url">Primary Details</a>
                            </li>
                            <li>
                                <a href="#artist_profile" class="tab--url">Artist Profile</a>
                            </li>
                            <li>
                                <a href="#my_channel" class="tab--url">My Channel</a>
                            </li>
                            <li>
                                <a href="#manage_price" class="tab--url">Manage Price</a>
                            </li>
                            <li>
                                <a href="#location" class="tab--url">Location</a>
                            </li>
                            <li>
                                <a href="#address" class="tab--url">Address</a>
                            </li>
                            <li>
                                <a href="#bank_detail" class="tab--url">Bank Details</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab--body">
                        <div class="tab--content" id="primary_details">
                            <div class="title">
                                <h5>Primary Details </h5>
                            </div>
                            <form action="">
                                <div class="form--box">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Full Name</label>
                                                <input type="text" placeholder="Adwerd Shwn" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" placeholder="adwerd@gmail.com" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Phone Number</label>
                                                <input type="number" placeholder="7896878965" class="form-control number">
                                                <span class="flag--icon"><img src="{{url('')}}/public/user/assets/img/flag.png" alt=""> +91</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Gender</label>
                                                <div class="inline--radio">
                                                    <div class="radio--box">                                                
                                                        <input type="radio" id="male" class="radio--btn" name="gender">
                                                        <label for="male"> Male</label>
                                                    </div>
                                                    <div class="radio--box">                                                
                                                        <input type="radio" id="female" class="radio--btn" name="gender">
                                                        <label for="female">Female </label>
                                                    </div>
                                                </div>
                                            </div>
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
                        <div class="tab--content" id="artist_profile" style="display: none;">
                            <div class="title">
                                <h5>Artist Profile  </h5>
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
                        <div class="tab--content" id="my_channel" style="display: none;">
                            <div class="title">
                                <h5>My Channel </h5>
                            </div>
                            <form action="">
                                <div class="list">
                                    <h5 class="hd--name">Photographs </h5>
                                    <div class="wrapper--box">
                                        <div class="add--channel">
                                            <a href="javascript:void(0);">
                                                <img src="{{url('')}}/public/user/assets/img/add_channel.png" alt="" class="img--artist">
                                            </a>
                                        </div>
                                        <?php for($i=0; $i<=4; $i++){?>
                                            <div class="channel--box">
                                                <img src="{{url('')}}/public/user/assets/img/img_1.png" alt="" class="img--artist">
                                                <a href="javscript:void(0);" class="cancel--img"> 
                                                    <img src="{{url('')}}/public/user/assets/img/cancel_img.png" alt="">
                                                </a>
                                                <p>Createen</p>
                                            </div>
                                        <?php }?>
                                    </div>                                    
                                </div>
                                <div class="list">
                                    <h5 class="hd--name">Intro Video </h5>
                                    <div class="wrapper--box">
                                        <div class="add--channel">
                                            <a href="javascript:void(0);">
                                                <img src="{{url('')}}/public/user/assets/img/add_channel.png" alt="" class="img--artist">
                                            </a>
                                        </div>
                                        <?php for($i=0; $i<=4; $i++){?>
                                            <div class="channel--box">
                                                <img src="{{url('')}}/public/user/assets/img/img_1.png" alt="" class="img--artist">
                                                <a href="javscript:void(0);" class="cancel--img"> 
                                                    <img src="{{url('')}}/public/user/assets/img/cancel_img.png" alt="">
                                                </a>
                                                <p>Createen</p>
                                            </div>
                                        <?php }?>
                                    </div>                                    
                                </div>
                                <div class="list">
                                    <h5 class="hd--name">Cover song </h5>
                                    <div class="wrapper--box">
                                        <div class="add--channel">
                                            <a href="javascript:void(0);">
                                                <img src="{{url('')}}/public/user/assets/img/add_channel.png" alt="" class="img--artist">
                                            </a>
                                        </div>
                                        <?php for($i=0; $i<=4; $i++){?>
                                            <div class="channel--box">
                                                <img src="{{url('')}}/public/user/assets/img/img_1.png" alt="" class="img--artist">
                                                <a href="javscript:void(0);" class="cancel--img"> 
                                                    <img src="{{url('')}}/public/user/assets/img/cancel_img.png" alt="">
                                                </a>
                                                <p>Createen</p>
                                            </div>
                                        <?php }?>
                                    </div>                                    
                                </div>
                                <div class="list">
                                    <h5 class="hd--name">Orignal Song</h5>
                                    <div class="wrapper--box">
                                        <div class="add--channel">
                                            <a href="javascript:void(0);">
                                                <img src="{{url('')}}/public/user/assets/img/add_channel.png" alt="" class="img--artist">
                                            </a>
                                        </div>
                                        <?php for($i=0; $i<=4; $i++){?>
                                            <div class="channel--box">
                                                <img src="{{url('')}}/public/user/assets/img/img_1.png" alt="" class="img--artist">
                                                <a href="javscript:void(0);" class="cancel--img"> 
                                                    <img src="{{url('')}}/public/user/assets/img/cancel_img.png" alt="">
                                                </a>
                                                <p>Createen</p>
                                            </div>
                                        <?php }?>
                                    </div>                                    
                                </div>
                              
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-primary" type="button">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab--content" id="manage_price" style="display: none;">
                            <div class="title">
                                <h5>Instrument to Play </h5>
                            </div>
                            <form action="">
                                <div class="list">
                                    <div class="wrapper--box">
                                        <div class="list--box">
                                            <p>Guitar</p>                                            
                                        </div>
                                        <div class="list--box">
                                            <p>₹ 5000/-</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="add--more--list">
                                            <a href="javascript:void(0);"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="wrapper--box">
                                        <div class="list--box">
                                            <p>Guitar</p>                                            
                                        </div>
                                        <div class="list--box">
                                            <p>₹ 5000/-</p>
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
                        <div class="tab--content" id="location" style="display: none;">
                            <div class="title">
                                <h5>Location  </h5>
                            </div>
                            <form action="">
                                <div class="list">
                                    <div class="wrapper--box">
                                        <div class="list--box">
                                            <p>Punjab</p>                                            
                                        </div>
                                        <div class="list--box">
                                            <p>₹ 5000/-</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        <div class="add--more--list">
                                            <a href="javascript:void(0);"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                    <div class="wrapper--box">
                                        <div class="list--box">
                                            <p>Indore</p>                                            
                                        </div>
                                        <div class="list--box">
                                            <p>₹ 5000/-</p>
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
                        <div class="tab--content" id="address" style="display: none;">
                            <div class="title">
                                <h5>Primary Details </h5>
                            </div>
                            <form action="">
                                <div class="form--box">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Full Name</label>
                                                <input type="text" placeholder="Adwerd Shwn" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" placeholder="adwerd@gmail.com" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Phone Number</label>
                                                <input type="number" placeholder="7896878965" class="form-control number">
                                                <span class="flag--icon"><img src="{{url('')}}/public/user/assets/img/flag.png" alt=""> +91</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Gender</label>
                                                <div class="inline--radio">
                                                    <div class="radio--box">                                                
                                                        <input type="radio" id="male" class="radio--btn" name="gender">
                                                        <label for="male"> Male</label>
                                                    </div>
                                                    <div class="radio--box">                                                
                                                        <input type="radio" id="female" class="radio--btn" name="gender">
                                                        <label for="female">Female </label>
                                                    </div>
                                                </div>
                                            </div>
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
                        <div class="tab--content" id="bank_detail" style="display: none;">
                            <div class="title">
                                <h5>Primary Details </h5>
                            </div>
                            <form action="">
                                <div class="form--box">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Full Name</label>
                                                <input type="text" placeholder="Adwerd Shwn" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" placeholder="adwerd@gmail.com" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Phone Number</label>
                                                <input type="number" placeholder="7896878965" class="form-control number">
                                                <span class="flag--icon"><img src="{{url('')}}/public/user/assets/img/flag.png" alt=""> +91</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Gender</label>
                                                <div class="inline--radio">
                                                    <div class="radio--box">                                                
                                                        <input type="radio" id="male" class="radio--btn" name="gender">
                                                        <label for="male"> Male</label>
                                                    </div>
                                                    <div class="radio--box">                                                
                                                        <input type="radio" id="female" class="radio--btn" name="gender">
                                                        <label for="female">Female </label>
                                                    </div>
                                                </div>
                                            </div>
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
