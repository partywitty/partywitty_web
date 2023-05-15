@include('artist.include.head')
@include('artist.include.header')

<section class="artist_hire--section">
    <div class="main--box art--list">
        <div class="back--btn">
            <a href="{{ url('artist_type') }}">
                <img src="{{ url('') }}/public/assets/img/back.png" alt="">
            </a>
        </div>
        <div class="box--c">
            <h3>Music Type/Genre of Music </h3>
            <form action="{{ url('genres_submit') }}" method="post">
                @csrf
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="search--box">
                    <input type="search" class="form-control" id="search"
                        placeholder="Enter the instrument type...">
                    <a href="javascript:void(0);"> <span class="times--icon"></span></a>
                    <p class="data--nfound">select mulple option</p>
                </div>
                <div class="selected--box">
                    @if (!empty($UserProfiles->genres_id))
                        @php
                            $dataid = explode(',', $UserProfiles->genres_id);
                            $dataname = explode(',', $UserProfiles->genres_name);
                        @endphp
                        @for ($i = 0; $i < count($dataid); $i++)
                            <div class="select--type">
                                <span>{{ $dataname[$i] }} </span>
                                <input type="hidden" value="{{ $dataid[$i] }}" name="selected_genres[]">
                                <input type="hidden" value="{{ $dataname[$i] }}" name="selected_genres_name[]">
                                <a href="javascript:void(0);" class="times--icon remove"
                                    data-id="{{ $dataid[$i] }}"></a>
                            </div>
                        @endfor
                    @endif
                </div>
                <div class="artist--type--box">
                    @foreach ($genreses as $genres)
                        <a href="javascript:void(0);"
                            class="artist--type {{ empty($UserProfiles->genres_id) ? 'unselect' : (in_array($genres['id'], $dataid) ? 'selected' : 'unselect') }} select{{ $genres['id'] }}"
                            data-name="{{ $genres['name'] }}" data-id="{{ $genres['id'] }}">
                            <span>{{ $genres['name'] }}</span>
                        </a>
                        <!-- <a href="javascript:void(0);" class="artist--type unselect select{{ $genres['id'] }}" data-name="{{ $genres['name'] }}" data-id="{{ $genres['id'] }}">
                <span>{{ $genres['name'] }}</span>
            </a> -->
                    @endforeach
                    <div>
                        <a href="javascript:void(0);" class="artist--type other">
                            <span>Other</span>
                        </a>
                        <div id="other_name">
                            <input type="text" class="form-control" id="genres_name">
                            <button class="btn--theame form-control" type="button" onclick="AddGenres();">add</button>
                        </div>
                    </div>
                </div>
                <div class="btn---box">
                    <a href="javascript:void(0)" onclick="seemore()" class="btn--style">See more</a>
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
            $.post("{{ url('get_genre') }}", {
                    search: search,
                    "_token": "{{ csrf_token() }}",
                },
                function(data, status) {
                    $(".artist--type--box").html(data);
                });
        }
    });

    function seemore() {
        $.post("{{ url('get_genre') }}", {
                search: "",
                "_token": "{{ csrf_token() }}",
            },
            function(data, status) {
                $(".artist--type--box").html(data);
            });
    }

    $(document).on('click', '.unselect', function() {

        var html = "";
        html += '<div class="select--type">' +
            '<span>' + $(this).data('name') + '</span>' +
            '<input type="hidden" value="' + $(this).data('id') + '" name="selected_genres[]">' +
            '<input type="hidden" value="' + $(this).data('name') + '" name="selected_genres_name[]">' +
            '<a href="javascript:void(0);" class="times--icon remove" data-id="' + $(this).data('id') +
            '"></a>' +
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
    $('#other_name').hide();
    $(document).on('click', '.other', function() {
        $('#other_name').show();
    });

    function AddGenres() {
        var genres_name = $('#genres_name').val();
        $.ajax({
            url: "{{ url('add_genres') }}",
            type: "post",
            data: {
                "_token": "{{ csrf_token() }}",
                genres_name: genres_name
            },
            success: function(responce) {
                html = '<div class="select--type">' +
                    '<span>' + responce.data.name + '</span>' +
                    '<input type="hidden" value="' + responce.data.id + '" name="selected_genres[]">' +
                    '<input type="hidden" value="' + responce.data.name +
                    '" name="selected_genres_name[]">' +
                    '<a href="javascript:void(0);" class="times--icon remove" data-id="' + responce.data
                    .id +
                    '"></a>' +
                    '</div>';
                $(".selected--box").append(html);
            }
        });
    }
</script>
<script>
    bodyClass('artist--list');
</script>
