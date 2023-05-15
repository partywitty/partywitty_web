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
            <h3>Stage formation you perform in.</h3>
            <form id="updatedata">
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
                    @if (!empty($SelecteSubcategories))
                        @foreach ($ArtistSubcategory as $Subcategory)
                            @if (in_array($Subcategory['id'], $SelecteSubcategories))
                                <div class="select--type">
                                    <span>{{ $Subcategory['name'] }} </span>
                                    <input type="hidden" value="{{ $Subcategory['id'] }}" name="vocalist_seleted[]">
                                    <a href="javascript:void(0);" class="times--icon remove"
                                        data-id="{{ $Subcategory['id'] }}"></a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                <div class="artist--type--box">
                    <?php $count = 0;
                    $total_data = 4;
                    ?>
                    @foreach ($ArtistSubcategory as $Subcategory)
                        <?php if ($count == $total_data) {
                            break;
                        } ?>
                        <a href="javascript:void(0);"
                            class="artist--type {{ empty($SelecteSubcategories) ? 'unselect' : (in_array($Subcategory['id'], $SelecteSubcategories) ? 'selected' : 'unselect') }} select{{ $Subcategory['id'] }}"
                            data-name="{{ $Subcategory['name'] }}" data-id="{{ $Subcategory['id'] }}">
                            <span>{{ $Subcategory['name'] }}</span>
                        </a>
                        <?php $count++; ?>
                    @endforeach
                </div>
                <div class="btn---box">
                    <a href="javascript:void(0)" onclick="seemore()" class="btn--style">See more</a>
                </div>
                <div class="login--button--bx">
                    <a href="javascript:void(0)" onclick="checkvalidation();" class="lg--btn--theame">Submit</a>
                </div>
            </form>
        </div>
    </div>
</section>
@include('artist.include.foot')

<script>
    $(document).on('keyup', '#search', function() {
        var search = $(this).val();
        if (search != "") {
            $.post("{{ url('get_vocalist') }}", {
                    search: search,
                    "_token": "{{ csrf_token() }}",
                },
                function(data, status) {
                    $(".artist--type--box").html(data);
                });
        }
    });

    function seemore() {
        $.post("{{ url('get_vocalist') }}", {
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
            '<input type="hidden" value="' + $(this).data('id') + '" name="vocalist_seleted[]">' +
            '<a href="javascript:void(0);" class="times--icon remove" data-id="' + $(this).data('id') +
            '"></a>' +
            '</div>';
        $(".selected--box").append(html);
        // $(".artist--type").addClass('unselect').removeClass('selected');
        $(this).addClass('selected');
        $(this).removeClass('unselect');

        var formElem = $("#updatedata");
        var formdata = new FormData(formElem[0]);
        $.ajax({
            url: "{{ url('set_vocalist') }}",
            data: formdata,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function(data) {
                console.log('upload success!')
            }
        });
    });

    $(document).on('click', '.remove', function() {
        $(this).parent().remove();
        var id = $(this).data('id');
        $(".select" + id).removeClass('selected');
        $(".select" + id).addClass('unselect');
        $.ajax({
            url: "{{ url('remove_vocalist') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                id: id
            },
            success: function(data) {
                console.log('upload success!')
            }
        });
    });

    function checkvalidation() {
        $.get("{{ url('get_selected_vocalist') }}",
            function(data, status) {
                if (data > 0) {
                        window.location.href = "{{ url('genres') }}";
                } else {
                    alert('Please, select atleast one Vocalist');
                }
            });
    }
</script>

<script>
    bodyClass('artist--list');
</script>
