<div class="left--box">
    <div class="sidebar">
        <div class="profile--box">
            <a href="javascript:void(0);" class="mobile--sidebar">
                <i class="fa fa-bars" aria-hidden="true"></i>
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>
            @foreach($medias as $media)
            @if($media['type'] == '0')
            <img src="{{url('')}}/{{$media['file_path']}}" alt="">
            @endif
            @endforeach
            <h5>{{session('userdata')['username']}}</h5>
        </div>
        <div class="side--nav">
            <ul>
                <li>
                    <a href="javascript:void(0);" class="side--url dashboard">
                        <img src="{{url('')}}/public/user/assets/img/side_icon/dashboard.png" alt="">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('artist-profile')}}" class="side--url my_profile">
                        <img src="{{url('')}}/public/user/assets/img/side_icon/user.png" alt="">
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('request-list')}}" class="side--url request">
                        <img src="{{url('')}}/public/user/assets/img/side_icon/requset.png" alt="">
                        <span>Request</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="side--url event">
                        <img src="{{url('')}}/public/user/assets/img/side_icon/calender.png" alt="">
                        <span>Event</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="side--url wallet">
                        <img src="{{url('')}}/public/user/assets/img/side_icon/wallet.png" alt="">
                        <span>Wallet</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>