@include('artist.include.head')

<div class="back--btn">
    <a href="guest_offer.php">
        <img src="{{url('public/')}}/assets/img/back.png" alt="">
    </a>
</div>
<div class="sort--btn">
    <!-- <a href="javascript:void(0);" class="btn--img">
        <img src="{{url('public/')}}/assets/img/sort.png" alt="">
    </a> -->
    <a href="javascript:void(0);" class="btn--img">
        <img src="{{url('public/')}}/assets/img/filter.png" alt="">
    </a>
</div>

<section class="artist_hire--section">
    <div class="main--box art--list">
        <div class="box--c">
            <h3>Artist List</h3>
            <form action="" id="" method="">
                <div class="search--box mb-5">
                    <input type="search" class="form-control" id="search" placeholder="Enter the type of artist...">
                    <a href="javascript:void(0);"> <span class="times--icon"></span></a>
                    <p class="data--nfound">select Only One</p>
                </div>
            </form>
            <div class="grid--box mt-5">
                @foreach($artists as $artist)
                <div class="box--artist">
                    <div class="wrapper--box">
                        <div class="img--box">
                            <img src="{{url('public/')}}/assets/img/01.png" alt="">
                        </div>
                        <div class="content">
                            <h5>{{$artist->username}}</h5>
                            <?php for ($star = 1; $star <= 5; $star++) { ?>
                                <i class="fa fa-star"></i>
                            <?php } ?>
                            <div class="art--skill">

                                <div class="skill--name">{{$artist->type_of_artist_name}} </div>
                            </div>
                            <div class="ul--box">
                                <div class="li--box"><img src="{{url('public/')}}/assets/img/music.png" alt=""><span>12</span></div>
                                <div class="li--box"><img src="{{url('public/')}}/assets/img/user.png" alt=""><span>1.5k</span></div>
                                <div class="li--box"><img src="{{url('public/')}}/assets/img/cmt.png" alt=""><span>12</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="btn--box">
                        @if(empty($artist->request_to))
                        <a href="javascript:void(0);" onclick='CodeRequest("{{$artist->id}}")' type="button" class="btn--style">Referred Code Request</a>
                        @elseif($artist->refer_status == '1')
                        <a href="javascript:void(0);" onclick='copycode("{{$artist->referral_code}}")' type="button" class="btn--style">Referred Code : {{$artist->referral_code}}</a>
                        @elseif($artist->refer_status == '2')
                        <a href="javascript:void(0);" onclick='CodeRequest("{{$artist->id}}")' type="button" class="btn--style danger">Denied</a>
                        @else
                        <a href="javascript:void(0);" onclick='copycode()' type="button" class="btn--style">Waiting for Response</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@include('artist.include.foot')
<script>
    bodyClass('club--list');

    function CodeRequest(request_to) {
        console.log(request_to);
        $.ajax({
            type: "POST",
            url: "{{url('send_request_artist')}}",
            data: {
                "request_to": request_to,
                "_token": "{{ csrf_token() }}"
            },
            success: function(data) {
                if (data.error != true) {
                    location.reload();
                }
            }
        });
    }

    function copycode(copyText) {
        alert("copy");
        var text = "Example text to appear on clipboard";
        navigator.clipboard.writeText(text).then(function() {
            console.log('Async: Copying to clipboard was successful!');
        }, function(err) {
            console.error('Async: Could not copy text: ', err);
        });
    }
</script>