@include('artist.include.head')
@include('artist.include.header')




<section class="artist_hire--section">
    <div class="main--box art--list">
        <div class="back--btn">
            <a href="{{ url('referral_code') }}">
                <img src="{{ url('public/') }}/assets/img/back.png" alt="">
            </a>
        </div>
        <div class="sort--btn">
            <a href="javascript:void(0);" class="btn--img">
                <img src="{{ url('public/') }}/assets/img/filter.png" alt="">
            </a>
        </div>
        <div class="box--c">
            <h3>Artist List</h3>
            <div class="search--box mb-5">
                <input type="search" class="form-control" id="search" placeholder="Enter the type of artist...">
                <a href="javascript:void(0);"> <span class="times--icon"></span></a>
            </div>
            <div class="grid--box mt-5" id="filter_data">
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
                                    <a href="javascript:void(0);" onclick='CodeRequest("{{ $artist['id'] }}")' type="button" class="btn--style">Referral Code Request</a>
                                @elseif($artist['refer_status'] == '1')
                                    <button type="button" class="mr-1 btn btn-default btn-copy js-tooltip js-copy btn--success"
                                        data-placement="bottom" data-copy="{{ $artist['referral_code'] }}">Referral
                                        Code : {{ $artist['referral_code'] }}</button>
                                @elseif($artist['refer_status'] == '2')
                                    <a href="javascript:void(0);" class="btn--denid">Denied</a>
                                @else
                                    <a href="javascript:void(0);" class="btn--style">Waiting for Response</a>
                                @endif
                            </div>
                        @else
                            <div class="btn--box">
                                @if (empty($artist['request_to']))
                                    <a href="javascript:void(0);" type="button" class="btn--style">Referral Code Request</a>
                                @elseif($artist['refer_status'] == '1')
                                    <button type="button" class="mr-1 btn btn-default btn-copy js-tooltip js-copy btn--success"
                                        data-placement="bottom" data-copy="{{ $artist['referral_code'] }}">Referral
                                        Code : {{ $artist['referral_code'] }}</button>
                                @elseif($artist['refer_status'] == '2')
                                    <a href="javascript:void(0);" class="btn--denid">Denied</a>
                                @else
                                    <a href="javascript:void(0);" class="btn--style">Waiting for Response</a>
                                @endif
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@include('artist.include.foot')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    bodyClass('club--list');

    function CodeRequest(request_to) {
        console.log(request_to);
        $.ajax({
            type: "POST",
            url: "{{ url('send_request_artist') }}",
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
</script>

<script>
    function copyToClipboard(text, el) {
        var copyTest = document.queryCommandSupported('copy');
        var elOriginalText = el.attr('data-original-title');

        if (copyTest === true) {
            var copyTextArea = document.createElement("textarea");
            copyTextArea.value = text;
            document.body.appendChild(copyTextArea);
            copyTextArea.select();
            try {
                var successful = document.execCommand('copy');
                var msg = successful ? 'Copied!' : 'Whoops, not copied!';
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: msg
                }).then((result) => {
                    window.location.href = '{{ url('referral_code') }}';
                });
                el.attr('data-original-title', msg).tooltip('show');
            } catch (err) {
                console.log('Oops, unable to copy');
            }
            document.body.removeChild(copyTextArea);
            el.attr('data-original-title', elOriginalText);
        } else {
            // Fallback if browser doesn't support .execCommand('copy')
            window.prompt("Copy to clipboard: Ctrl+C or Command+C, Enter", text);
        }
    }

    $(document).ready(function() {
        // Initialize
        // ---------------------------------------------------------------------

        // Tooltips
        // Requires Bootstrap 3 for functionality
        $('.js-tooltip').tooltip();

        // Copy to clipboard
        // Grab any text in the attribute 'data-copy' and pass it to the 
        // copy function
        $('.js-copy').click(function() {
            var text = $(this).attr('data-copy');
            var el = $(this);
            copyToClipboard(text, el);
        });
    });

    $(document).on('keyup', '#search', function() {
        var search = $(this).val();
        $.ajax({
            url: '{{ url('SerachArtist') }}',
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                search: search
            },
            cache: false,
            datatype: 'html',
            success: function(responce) {
                $('#filter_data').html(responce.html);
                console.log(responce);
            }
        });
    });
</script>
