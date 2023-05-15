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
                        <div class="tab--content" id="my-booking">
                            <div class="title">
                                <h5>My Booking  </h5>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Couple</th>
                                            <th>Stage</th>
                                            <th>Total Payment</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Zoya Khan</td>
                                            <td>zoya@gmail.com</td>
                                            <td>7896541230</td>
                                            <td>2</td>
                                            <td>5</td>
                                            <td>&#8377; 4000 /- </td>
                                            <td><a href="javascript:void(0);"  id="detail"><i class="fa fa-eye"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab--content" id="booking-detail">
                            <div class="title">
                                <h5>Booking Detail </h5>
                            </div>
                            <form action="">
                                <div class="form--box">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="hd--form">Stage</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" placeholder="" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Age</label>
                                                <input type="number" placeholder="" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Contact Number</label>
                                                <input type="number" placeholder="" class="form-control number" readonly>
                                                <span class="flag--icon"><img src="{{url('')}}/public/user/assets/img/flag.png" alt=""> +91</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="hd--form">Couple</h5>
                                        </div>
                                        <div class="col-md-12">
                                            <h5 class="hd--form">Male</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" placeholder="" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Age</label>
                                                <input type="number" placeholder="" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Contact Number</label>
                                                <input type="number" placeholder="" class="form-control number" readonly>
                                                <span class="flag--icon"><img src="{{url('')}}/public/user/assets/img/flag.png" alt=""> +91</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="hd--form">Female</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" placeholder="" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Age</label>
                                                <input type="number" placeholder="" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Contact Number</label>
                                                <input type="number" placeholder="" class="form-control number" readonly>
                                                <span class="flag--icon"><img src="{{url('')}}/public/user/assets/img/flag.png" alt=""> +91</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button class="btn btn-primary" type="button">Update</button>
                                    </div>
                                </div> -->
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

<script>
    $(document).ready(function(){
        $("#booking-detail").hide();
        $("#detail").click(function(){
            $("#booking-detail").show();
            $("#my-booking").hide();
        });
        $("#show").click(function(){
            $("p").show();
        });
    });
</script>

