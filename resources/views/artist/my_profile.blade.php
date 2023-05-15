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
                                                <input type="text" placeholder="{{$user->username}}" value="{{$user->username}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="email" placeholder="{{$user->email}}" value="{{$user->email}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Phone Number</label>
                                                <input type="number" placeholder="{{$user->contact_no}}" value="{{$user->contact_no}}" class="form-control number">
                                                <span class="flag--icon"><img src="{{url('')}}/public/user/assets/img/flag.png" alt=""> +91</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Gender</label>
                                                <div class="inline--radio">
                                                    <div class="radio--box">
                                                        <input type="radio" id="male" value="male" {{$user->gender == "male"?"checked":""}} class="radio--btn" name="gender">
                                                        <label for="male"> Male</label>
                                                    </div>
                                                    <div class="radio--box">
                                                        <input type="radio" id="female" value="female" {{$user->gender == "female"?"checked":""}} class="radio--btn" name="gender">
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
                                <h5>Artist Profile </h5>
                            </div>
                            <form action="">
                                <div class="list">
                                    <h5 class="hd--name">What Type of Artist</h5>
                                    <div class="wrapper--box">
                                        <div class="list--box">
                                            <p>{{$profiles->artist_name}}</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @if(!empty($profiles->subcategory_id))
                                @php
                                $subcategories = explode(',',$profiles->subcategory_name);
                                $genres = explode(',', $profiles->genres_name);
                                $venues = explode(',', $profiles->venue_name);
                                @endphp
                                <div class="list">
                                    <h5 class="hd--name">Instrument you play</h5>
                                    <div class="wrapper--box">
                                        @foreach($subcategories as $subcategory)
                                        <div class="list--box">
                                            <p>{{$subcategory}}</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <div class="list">
                                    <h5 class="hd--name">Music Type/Genre of Music </h5>
                                    <div class="wrapper--box">
                                        @if(!empty($genres))
                                        @foreach($genres as $genre)
                                        <div class="list--box">
                                            <p>{{$genre}}</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        @endforeach
                                        @endif
                                        <div class="add--more--list">
                                            <a href="javascript:void(0);"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list">
                                    <h5 class="hd--name">Venue you Wish To Perform At </h5>
                                    <div class="wrapper--box">
                                        @if(!empty($venue))
                                        @foreach($venues as $venue)
                                        <div class="list--box">
                                            <p>{{$venue}}</p>
                                            <a href="javascript:void(0);"><i class="fa fa-times"></i></a>
                                        </div>
                                        @endforeach
                                        @endif
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
                                    <h5 class="hd--name">Approval Videos</h5>
                                    <div class="wrapper--box">
                                        <div class="add--channel">
                                            <a href="javascript:void(0);">
                                                <img src="{{url('')}}/public/user/assets/img/add_channel.png" alt="" class="img--artist">
                                            </a>
                                        </div>
                                        @foreach($medias as $media)
                                        @if($media['type'] == '1')
                                        <div class="channel--box">
                                            <video id="video1" width="110" height="110">
                                                <source src="{{url('')}}/{{$media['file_path']}}" type="video/mp4">
                                            </video>
                                            <a href="javscript:void(0);" class="cancel--img">
                                                <img src="{{url('')}}/public/user/assets/img/cancel_img.png" alt="">
                                            </a><br>
                                            <p>{{$media['perfomed_at']}}</p>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="list">
                                    <h5 class="hd--name">Cover song</h5>
                                    <div class="wrapper--box">
                                        <div class="add--channel">
                                            <a href="javascript:void(0);">
                                                <img src="{{url('')}}/public/user/assets/img/add_channel.png" alt="" class="img--artist">
                                            </a>
                                        </div>
                                        @foreach($medias as $media)
                                        @if($media['type'] == '2')
                                        <div class="channel--box">
                                            <video id="video1" width="110" height="110">
                                                <source src="{{url('')}}/{{$media['file_path']}}" type="video/mp4">
                                            </video>
                                            <a href="javscript:void(0);" class="cancel--img">
                                                <img src="{{url('')}}/public/user/assets/img/cancel_img.png" alt="">
                                            </a><br>
                                            <p>{{$media['perfomed_at']}}</p>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="list">
                                    <h5 class="hd--name">Orignal song</h5>
                                    <div class="wrapper--box">
                                        <div class="add--channel">
                                            <a href="javascript:void(0);">
                                                <img src="{{url('')}}/public/user/assets/img/add_channel.png" alt="" class="img--artist">
                                            </a>
                                        </div>
                                        @foreach($medias as $media)
                                        @if($media['type'] == '3')
                                        <div class="channel--box">
                                            <video id="video1" width="110" height="110">
                                                <source src="{{url('')}}/{{$media['file_path']}}" type="video/mp4">
                                            </video>
                                            <a href="javscript:void(0);" class="cancel--img">
                                                <img src="{{url('')}}/public/user/assets/img/cancel_img.png" alt="">
                                            </a><br>
                                            <p>{{$media['perfomed_at']}}</p>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="list">
                                    <h5 class="hd--name">Media with celebs</h5>
                                    <div class="wrapper--box">
                                        <div class="add--channel">
                                            <a href="javascript:void(0);">
                                                <img src="{{url('')}}/public/user/assets/img/add_channel.png" alt="" class="img--artist">
                                            </a>
                                        </div>
                                        @foreach($medias as $media)
                                        @if($media['type'] == '4')
                                        <div class="channel--box">
                                            <img src="{{url('')}}/{{$media['file_path']}}" alt="" class="img--artist">
                                            <a href="javscript:void(0);" class="cancel--img">
                                                <img src="{{url('')}}/public/user/assets/img/cancel_img.png" alt="">
                                            </a><br>
                                            <p>{{$media['perfomed_at']}}</p>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="list">
                                    <h5 class="hd--name">Photo of Bands you have worked with</h5>
                                    <div class="wrapper--box">
                                        <div class="add--channel">
                                            <a href="javascript:void(0);">
                                                <img src="{{url('')}}/public/user/assets/img/add_channel.png" alt="" class="img--artist">
                                            </a>
                                        </div>
                                        @foreach($medias as $media)
                                        @if($media['type'] == '5')
                                        <div class="channel--box">
                                            <img src="{{url('')}}/{{$media['file_path']}}" alt="" class="img--artist">
                                            <a href="javscript:void(0);" class="cancel--img">
                                                <img src="{{url('')}}/public/user/assets/img/cancel_img.png" alt="">
                                            </a><br>
                                            <p>{{$media['perfomed_at']}}</p>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="list">
                                    <h5 class="hd--name">Photos of club you have worked with</h5>
                                    <div class="wrapper--box">
                                        <div class="add--channel">
                                            <a href="javascript:void(0);">
                                                <img src="{{url('')}}/public/user/assets/img/add_channel.png" alt="" class="img--artist">
                                            </a>
                                        </div>
                                        @foreach($medias as $media)
                                        @if($media['type'] == '6')
                                        <div class="channel--box">
                                            <img src="{{url('')}}/{{$media['file_path']}}" alt="" class="img--artist">
                                            <a href="javscript:void(0);" class="cancel--img">
                                                <img src="{{url('')}}/public/user/assets/img/cancel_img.png" alt="">
                                            </a><br>
                                            <p>{{$media['perfomed_at']}}</p>
                                        </div>
                                        @endif
                                        @endforeach
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
                                <h5>Location </h5>
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
                                <h5>Address</h5>
                            </div>
                            <form action="">
                                <div class="form--box">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Flat No./House No.</label>
                                                <input type="text" placeholder="Flat No./House No." class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Landmark</label>
                                                <input type="text" placeholder="Landmark" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">State</label>
                                                <select name="" class="form-control" id="">
                                                    <option value="">Select State</option>
                                                    <option value="">Madhya Pradesh</option>
                                                    <option value="">Uttar Pradesh</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Town/City</label>
                                                <select name="" class="form-control" id="">
                                                    <option value="">Select Town/City</option>
                                                    <option value="">Madhya Pradesh</option>
                                                    <option value="">Uttar Pradesh</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">PinCode</label>
                                                <input type="number" placeholder="PinCode" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">ID Proof type</label>
                                                <select name="" class="form-control" id="">
                                                    <option value="">Select</option>
                                                    <option value="">Voter ID</option>
                                                    <option value="">Driving Licence</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">ID Proof</label>
                                                <input type="file" placeholder="ID Proof" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Aadhar Number</label>
                                                <input type="number" placeholder="Aadhar Number" class="form-control">
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
                                <h5>Bank Details</h5>
                            </div>
                            <form action="">
                                <div class="form--box">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Bank Name</label>
                                                <select name="" id="" class="form-control">
                                                    <option value="">Select Bank</option>
                                                    <option value="">Bank of India</option>
                                                    <option value="">Canera Bank</option>
                                                    <option value="">State Bank of India</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Account Number</label>
                                                <input type="number" placeholder="Account Number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">IFSC Code</label>
                                                <input type="text" placeholder="IFSC Code" class="form-control ">                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Branch Name</label>
                                                <input type="text" placeholder="Branch Name" class="form-control ">                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Pan Card Name</label>
                                                <input type="text" placeholder="Pan Card Name" class="form-control ">                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Pan Card Number</label>
                                                <input type="text" placeholder="Pan Card Number" class="form-control ">                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Cancel Cheque</label>
                                                <input type="file" placeholder="Cancel Cheque" class="form-control ">                                                
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


<script>
    bodyClass('my_profile');
</script>
