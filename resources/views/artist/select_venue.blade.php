@include('artist.include.head')
@include("artist.include.header")


<section class="artist_hire--section">
    <div class="main--box art--list">
        <div class="back--btn">
            <a href="{{url('genres')}}">
                <img src="{{url('')}}/public/assets/img/back.png" alt="">
            </a>
        </div>
        <div class="box--c">
            <h3>Event you Wish To Perform At? </h3>
            <form action="{{url('venue_submit')}}" method="post">
                @csrf
                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="search--box">
                    <input type="search" class="form-control" id="search" placeholder="Enter the Perform At...">
                    <a href="javascript:void(0);"> <span class="times--icon"></span></a>
                    <p class="data--nfound">select mulple option</p>
                </div>
                <div class="selected--box">
                    @if(!empty($UserProfiles->venue_id))
                    @php $dataid = explode(',', $UserProfiles->venue_id);
                    $dataname = explode(',', $UserProfiles->venue_name);
                    @endphp
                    @for($i=0; $i < count($dataid); $i++) <div class="select--type">
                        <span>{{$dataname[$i]}} </span>
                        <input type="hidden" value="{{$dataid[$i]}}" name="selected_venue[]">
                        <input type="hidden" value="{{$dataname[$i]}}" name="selected_venue_name[]">
                        <a href="javascript:void(0);" class="times--icon remove" data-id="{{$dataid[$i]}}"></a>
                </div>
                @endfor
                @endif

        </div>
        <div class="artist--type--box">
            @foreach($venues as $venue)
            <a href="javascript:void(0);" class="artist--type {{empty($UserProfiles->venue_id)?'unselect':(in_array($venue['id'],$dataid)?'selected':'unselect')}} select{{$venue['id']}}" data-name="{{$venue['name']}}" data-id="{{$venue['id']}}">
                <span>{{$venue['name']}}</span>
            </a>
            <!-- <a href="javascript:void(0);" class="artist--type unselect select{{$venue['id']}}" data-name="{{$venue['name']}}" data-id="{{$venue['id']}}">
                <span>{{$venue['name']}}</span>
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
@include('artist.include.foot')
<script>
    $(document).on('keyup', '#search', function() {
        var search = $(this).val();
        if (search != "" && search != " ") {
            $.post("{{url('get_venue')}}", {
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
        html += '<div class="select--type">' +
            '<span>' + $(this).data('name') + '</span>' +
            '<input type="hidden" value="' + $(this).data('id') + '" name="selected_venue[]">' +
            '<input type="hidden" value="' + $(this).data('name') + '" name="selected_venue_name[]">' +
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