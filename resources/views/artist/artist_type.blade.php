@include("artist.include.head")
@include("artist.include.header")

<section class="artist_hire--section">
    <div class="main--box art--list">
        <div class="back--btn">
            <a href="{{url('referral_code')}}">
                <img src="{{url('')}}/public/assets/img/back.png" alt="">
            </a>
        </div>
        <div class="box--c">
            <h3>What Type of Artist You Are ?</h3>
            <form action="{{url('artist_submit')}}" id="artist_submit" method="post">
                @csrf;
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="search--box">
                    <input type="search" class="form-control" id="search" placeholder="Enter the type of artist...">
                    <a href="javascript:void(0);"> <span class="times--icon"></span></a>
                    
                    <p class="data--nfound">select Only One</p>
                </div>
                <div class="selected--box">
                    @if(!empty($UserProfiles->artists_type_id))
                    <div class="select--type">
                        <span>{{$UserProfiles->artist_name}}</span>
                        <input type="hidden" value="{{$UserProfiles->artists_type_id}}" name="artist_seleted">
                        <input type="hidden" value="{{$UserProfiles->artist_name}}" name="artist_name">
                        <a href="javascript:void(0);" class="times--icon remove" data-id="{{$UserProfiles->artists_type_id}}"></a>
                    </div>
                    @endif
                </div>
                <div class="artist--type--box">
                    @foreach($ArtistList as $artist)
                    
                    <a href="javascript:void(0);" class="artist--type  {{empty($UserProfiles->artists_type_id) ?'unselect': (($UserProfiles->artists_type_id == $artist['id']) ? 'selected':'unselect')}} select{{$artist['id']}}" data-name="{{$artist['name']}}" data-id="{{$artist['id']}}">
                        <span>{{$artist['name']}}</span>
                    </a>
                    <!-- <a href="javascript:void(0);" class="artist--type unselect select{{$artist['id']}}" data-name="{{$artist['name']}}" data-id="{{$artist['id']}}">
                        <span>{{$artist['name']}}</span>
                    </a> -->
                    @endforeach
                </div>
                <div class="login--button--bx">
                    <button type="submit" class="lg--btn--theame">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@include("artist.include.foot")
<script>
    $(document).on('keyup', '#search', function() {
        var search = $(this).val();
        if (search != "") {
            $.post("{{url('get_artist')}}", {
                    search: search,
                    "_token": "{{ csrf_token() }}",
                },
                function(data, status) {
                    $(".artist--type--box").html(data);
                });
        }
    });

    $(document).on('click', '.unselect', function() {
        var html = "";
        html = '<div class="select--type">' +
            '<span>' + $(this).data('name') + '</span>' +
            '<input type="hidden" value="' + $(this).data('id') + '" name="artist_seleted">' +
            '<input type="hidden" value="' + $(this).data('name') + '" name="artist_name">' +
            '<a href="javascript:void(0);" class="times--icon remove" data-id="' + $(this).data('id') + '"></a>' +
            '</div>';
        $(".selected--box").html(html);
        $(".artist--type").removeClass('selected').addClass('unselect');
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