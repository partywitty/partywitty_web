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
                            <!-- {{url('guest-profile')}} -->
                                <a href="{{url('guest-profile')}}"  class="side--url active">
                                    <img src="{{url('')}}/public/user/assets/img/side_icon/user.png" alt=""> 
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('my-booking')}}"  class="side--url">
                                    <img src="{{url('')}}/public/user/assets/img/side_icon/requset.png" alt=""> 
                                    <span>My Booking</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="right--box">
                <div class="tab--box">
                    <div class="tab--body">
                        <div class="tab--content" id="primary_details">
                            <div class="title">
                                <h5>My Profile</h5>
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
