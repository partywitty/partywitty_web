@include("user.include.head")

<div class="back--btn">
    <a href="{{url('artist_type')}}">
        <img src="{{url('')}}/public/assets/img/back.png" alt="">
    </a>
</div>

<section class="artist_hire--section">
    <div class="main--box art--list">
        <div class="box--c">
            <h3>Instrument you play</h3>
            <form action="{{url('music_submit')}}" method="post">
                @csrf
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="search--box">
                    <input type="search" class="form-control" id="search" placeholder="Enter the instrument type...">
                    <a href="javascript:void(0);"> <span class="times--icon"></span></a>
                </div>
                <div class="selected--box">

                </div>
                <div class="artist--type--box">
                    @foreach($MusicianList as $music)
                    <a href="javascript:void(0);" class="artist--type unselect select{{$music['id']}}" data-name="{{$music['name']}}" data-id="{{$music['id']}}">
                        <span>{{$music['name']}}</span>
                    </a>
                    @endforeach
                </div>
                <div class="login--button--bx">
                    <button type="submit" class="lg--btn--theame">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@include("user.include.foot")

<script>
    $(document).on('keyup', '#search', function() {
        $.post("{{url('get_music')}}", {
                search: $(this).val(),
                "_token": "{{ csrf_token() }}",
            },
            function(data, status) {
                $(".artist--type--box").html(data);
            });
    });

    $(document).on('click', '.unselect', function() {

        var html = "";
        html += '<div class="select--type">' +
            '<span>' + $(this).data('name') + '</span>' +
            '<input type="hidden" value="' + $(this).data('id') + '" name="music_seleted[]">' +
            '<a href="javascript:void(0);" class="times--icon remove" data-id="' + $(this).data('id') + '"></a>' +
            '</div>';
        $(".selected--box").append(html);
        $(this).addClass('selected');
        $(this).removeClass('unselect');
    });

    $(document).on('click', '.remove', function() {
        $(this).parent().remove();
        var id = $(this).data('id');
        $(".select" + id).removeClass('selected');
        $(".select" + id).addClass('unselect');

    });
</script>

<script>
    bodyClass('artist--list');
</script>