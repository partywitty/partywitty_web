@include('artist.include.head')
@include("artist.include.header")
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
@php
switch ($type) {
case '0':
$next = 'videolist';
$pre = 'intro_message';
break;
case '1':
$next = 'coversong';
$pre = 'photograph';
break;
case '2':
$next = 'Origanalsong';
$pre = 'videolist';
break;
case '3':
$next = 'uploadcelebs';
$pre = 'coversong';
break;
case '4':
$next = 'UploadBands';
$pre = 'Origanalsong';
break;
case '5':
$next = 'UploadClubs';
$pre = 'uploadcelebs';
break;
case '6':
$next = 'intafollow';
$pre = 'UploadBands';
break;
}

if ($type == 0 || $type == 4 || $type == 5 || $type == 6) {
$accept = '1';
} else {
$accept = '2';
}
@endphp

<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="back--btn">
            <a href="{{ url($pre) }}">
                <img src="{{ url('') }}/public/assets/img/back.png" alt="">
            </a>
        </div>

        <div class="box--c channel">
            <h3>{{ $heading }}</h3>
            <form action="">
                <div class="search--box">
                    <input type="text" class="form-control" placeholder="Enter Here...">
                    <a href="javascript:void(0);"> <span class="times--icon"></span></a>
                </div>
            </form>

            <div class="channel--box">
                <h5>{{ $title }}</h5>
                <div class="grid--box">
                    <div class="box--ch ">
                        <a href="{{ url('media_file_upload/') }}/{{ $type }}" >
                            <img src="{{ url('') }}/public/assets/img/i_1.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="channel--box">
                <div class="grid--box">
                    @foreach ($UserMedias as $media)
                    <div class="box--ch">
                        
                        @if ($accept == 1)
                        <a href="javascript:void(0);" >
                            <img src="{{ url('') . '/' . $media['file_path'] }}" alt="" >
                        </a>
                        @else
                        <a href="javascript:void(0);">
                            <video width="110" height="110" controls autoplay>
                                <source src="{{ url('') . '/' . $media['file_path'] }}" type="video/mp4">
                                <source src="movie.ogg" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        </a>
                        @endif
                        <a href="javascript:void(0);" class="removeMedia" data-id="{{$media['id']}}"><span class="cl_icon"></span></a>
                        <span>{{ $media['perfomed_at'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            @if ($type == '0' || $type == '1')
            @if (!empty($UserMedias))
            <div class="login--button--bx mt-8">
                <a href="{{ url('') }}/{{ $next }}" class="lg--btn--theame">Submit</a>
            </div>
            @else
            <div class="login--button--bx mt-8">
                <a href="javascript:void(0)" onclick="alert('Please {{ $heading }}')" class="lg--btn--theame">Submit</a>
            </div>
            @endif
            @else
            <div class="login--button--bx mt-8">
                <a href="{{ url('') }}/{{ $next }}" class="lg--btn--theame">Submit</a>
            </div>
            <div class="login--button--bx mt-8">
                <a href="{{ url('') }}/{{ $next }}" class="lg--btn--theame">skip</a>
            </div>
            @endif
        </div>
    </div>
</section>

@include('artist.include.foot')

<script>
    bodyClass('artist--list');
</script>
<script>
    $(document).on('click', '.removeMedia', function(event) {
        event.preventDefault();
        var t = $(this);
        var id = t.data('id');
        if (confirm('Are sure you want to delete.')) {
            $.post('{{url("remove-media")}}', {
                "_token": "{{ csrf_token() }}",
                id: id
            }, function(result) {
                t.parent('.box--ch').remove();
            });
        }
    });

    $(document).on('click', '.play_video', function() {
        var media = $(this).data('')
    });
</script>