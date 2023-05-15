@foreach ($artists as $artist)
    <div class="box--artist">
        <div class="wrapper--box">
            <div class="img--box">
                <img src="{{ url('') }}/{{ $artist['profile'] }}" alt="">
            </div>
            <div class="content">
                <h5>{{ $artist['username'] }}</h5>
                <?php for ($star = 1; $star <= 5; $star++) { ?>
                <i class="fa fa-star"></i>
                <?php } ?>
                <div class="art--skill">
                    <div class="skill--name">{{ $artist['type_of_artist_name'] }} </div>
                </div>
                <div class="ul--box">
                    <div class="li--box"><img src="{{ url('public/') }}/assets/img/music.png"
                            alt=""><span>12</span></div>
                    <div class="li--box"><img src="{{ url('public/') }}/assets/img/user.png"
                            alt=""><span>1.5k</span></div>
                    <div class="li--box"><img src="{{ url('public/') }}/assets/img/cmt.png"
                            alt=""><span>12</span></div>
                </div>
            </div>
        </div>
        @if ($request_by_status != '1')
            <div class="btn--box">
                @if (empty($artist['request_to']))
                    <a href="javascript:void(0);" onclick='CodeRequest("{{ $artist['id'] }}")' type="button"
                        class="btn--style">Referral Code Request</a>
                @elseif($artist['refer_status'] == '1')
                    <button type="button" class="mr-1 btn btn-default btn-copy js-tooltip js-copy"
                        data-placement="bottom" data-copy="{{ $artist['referral_code'] }}">Referral
                        Code : {{ $artist['referral_code'] }}</button>
                @elseif($artist['refer_status'] == '2')
                    <a href="javascript:void(0);" class="btn--style danger">Denied</a>
                @else
                    <a href="javascript:void(0);" class="btn--style">Waiting for Response</a>
                @endif
            </div>
        @else
            <div class="btn--box">
                @if (empty($artist['request_to']))
                    <a href="javascript:void(0);" type="button" class="btn--style">Referral Code
                        Request</a>
                @elseif($artist['refer_status'] == '1')
                    <button type="button" class="mr-1 btn btn-default btn-copy js-tooltip js-copy"
                        data-placement="bottom" data-copy="{{ $artist['referral_code'] }}">Referral
                        Code : {{ $artist['referral_code'] }}</button>
                @elseif($artist['refer_status'] == '2')
                    <a href="javascript:void(0);" class="btn--style danger">Denied</a>
                @else
                    <a href="javascript:void(0);" class="btn--style">Waiting for Response</a>
                @endif
            </div>
        @endif
    </div>
@endforeach
