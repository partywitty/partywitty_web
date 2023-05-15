@include('artist.include.head')
<div class="back--btn">
    <a href="{{ url('solo_budget') }}">
        <img src="{{ url('/public/assets/img/back.png') }}" alt="">
    </a>
</div>

<section class="artist_hire--section">
    <div class="main--box art--list">
        <div class="box--c">
            <h3>Duo With What Instrument</h3>
            <form id="updatedata">
                @csrf
                <div class="search--box">
                    <input type="search" id="search" class="form-control" placeholder="Enter a music type...">
                    <a href="javascript:void(0);"> <span class="times--icon"></span></a>
                </div>
                <input type="hidden" name="subcategory_id" value="2">
                <div class="selected--box">
                    @if (!empty($selected_instruments))
                        @foreach ($instruments as $instrument)
                            @if (in_array($instrument['id'], $selected_instruments))
                                <div class="select--type">
                                    <span>{{ $instrument['name'] }} </span>
                                    <input type="hidden" value="{{ $instrument['id'] }}" name="intrument_id[]">
                                    <a href="javascript:void(0);" class="times--icon remove"
                                        data-id="{{ $instrument['id'] }}"></a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                <div class="artist--type--box">
                    <?php $count = 0;
                    $total_data = 4;
                    ?>
                    @foreach ($instruments as $instrument)
                        <?php if ($count == $total_data) {
                            break;
                        } ?>
                        <a href="javascript:void(0);"
                            class="artist--type {{ empty($selected_instruments) ? 'unselect' : (in_array($instrument['id'], $selected_instruments) ? 'selected' : 'unselect') }} select{{ $instrument['id'] }}"
                            data-name="{{ $instrument['name'] }}" data-id="{{ $instrument['id'] }}">
                            <span>{{ $instrument['name'] }}</span>
                        </a>
                        <?php $count++; ?>
                    @endforeach
                    <div class="btn---box">
                        <a href="javascript:void(0)" onclick="seemore()" class="btn--style">See more</a>
                    </div>
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
            $.post("{{ url('get_instruments') }}", {
                    search: search,
                    subcategory_id: '2',
                    "_token": "{{ csrf_token() }}",
                },
                function(data, status) {
                    $(".artist--type--box").html(data);
                });
        }
    });

    function seemore() {
        $.post("{{ url('get_instruments') }}", {
                search: "",
                subcategory_id: '2',
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
            '<input type="hidden" value="' + $(this).data('id') + '" name="intrument_id[]">' +
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
            url: "{{ url('set_instruments') }}",
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
            url: "{{ url('delete_instrument') }}",
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                subcategory_id: '2',
                id: id
            },
            success: function(data) {
                console.log('upload success!')
            }
        });

    });

    function checkvalidation() {
        $.post("{{ url('get_selected_instrument') }}", {
                subcategory_id: '2',
                "_token": "{{ csrf_token() }}",
            },
            function(data, status) {
                if (data > 0) {
                    if (data < 3) {
                        window.location.href = "{{ url('duo_budget') }}";
                    } else {
                        alert('Sorry, you can select only two instrument.');
                    }
                } else {
                    alert('Please, select atleast one instrument');
                }
            });
    }
</script>

<script>
    bodyClass('artist--list');
</script>
