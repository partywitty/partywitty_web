<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Message</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<form action="{{ route('edit.deal') }}" method="post" id="edit_deal" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="club_id" value="{{ $deal->club_id }}">
    <input type="hidden" name="id" value="{{ $deal->id }}">
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Deal Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Deal Name"
                                value="{{ $deal->name }}">
                            <span class="text-danger error-text name_err"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Deal Category</label>
                            <select class="form-control" name="deal_type_id">
                                @foreach ($deal_type as $row)
                                    <option {{ $deal->deal_type_id == $row['id'] ? 'selected' : '' }}
                                        value="{{ $row['id'] }}">{{ $row['name'] }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text deal_type_id_err"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Picture</label>
                            <input type="file" name="images[]" class="form-control" id="images" multiple>
                            <span class="text-danger error-text images_err"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Start Date</label>
                            <input type="date" name="start_date" class="form-control"
                                value="{{ $deal->start_date }}">
                            <span class="text-danger error-text start_date_err"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">End Date</label>
                            <input type="date" name="end_date" class="form-control" value="{{ $deal->end_date }}">
                            <span class="text-danger error-text end_date_err"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="my-3">
                            <mark>
                                Price Management :-
                            </mark>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Menu Price(Highest Price)</label>
                            <input type="text" name="max_price" value="{{ $deal->max_price }}" class="form-control"
                                onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0">
                            <span class="text-danger error-text max_price_err"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Lowest Price</label>
                            <input type="text" name="min_price" value="{{ $deal->min_price }}" class="form-control"
                                onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0 ">
                            <span class="text-danger error-text min_price_err"></span>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="my-3">
                            <mark>
                                Artist Management :-
                            </mark>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Select Artist</label>
                            <select name="artist_id" class="form-control js-example-basic-single">
                                @foreach ($artists as $row)
                                    <option {{ $deal->artist_id == $row['id'] ? 'selected' : '' }}
                                        value="{{ $row['id'] }}">{{ $row['username'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Artist Price</label>
                            <input type="text" value="{{ $deal->artist_price }}" name="artist_price"
                                class="form-control"
                                onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 0 ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Inclusion</label>
                            <textarea name="inclusion" class="form-control" id="inclusion">{{ $deal->inclusion }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Detail</label>
                            <textarea name="detail" class="form-control" id="detail">{{ $deal->detail }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="my-3">
                            <mark>
                                Timing :-
                            </mark>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col-md-12">
                                <div class="mon-pad">
                                    <input class="form-check-input" type="checkbox" id="sel-all">
                                    <label for="start-time">Select all days</label>
                                </div>
                            </div>
                        </div>
                        @foreach ($headings as $key => $day)
                            @php
                                $daytime = get_deal_day_time($key, $deal->id);
                            @endphp
                            @if (!$daytime)
                                <div class="form-row mb-2">
                                    <div class="col-md-3">
                                        <div class="mon-pad">
                                            <input class="form-check-input checkbx" type="checkbox"
                                                name="day[{{ $key }}]" value="{{ $key }}">
                                            <h5 class="text-info">{{ $day }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Start time:</label>
                                        <input type="time" name="start_time[{{ $key }}][]"
                                            class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">End time:</label>
                                        <input type="time" name="end_time[{{ $key }}][]"
                                            class="form-control">
                                    </div>
                                    <div class="col-auto align-self-end">
                                        <button type="button" class="btn btn-primary btn-sm add-time-range"
                                            data-day='{{ $key }}'>+ Add</button>
                                    </div>
                                </div>
                            @endif
                            @foreach ($daytime as $k => $row)
                                @if ($k == 0)
                                    <div class="form-row mb-2">
                                        <div class="col-md-3">
                                            <div class="mon-pad">
                                                <input class="form-check-input checkbx" checked type="checkbox"
                                                    name="day[{{ $key }}]" value="{{ $key }}">
                                                <h5 class="text-info">{{ $day }}</h5>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Start time:</label>
                                            <input type="time" name="start_time[{{ $key }}][]"
                                                class="form-control" value="{{ $row['start_time'] }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">End time:</label>
                                            <input type="time" name="end_time[{{ $key }}][]"
                                                class="form-control" value="{{ $row['end_time'] }}">
                                        </div>
                                        <div class="col-auto align-self-end">
                                            <button type="button" class="btn btn-primary btn-sm add-time-range"
                                                data-day='{{ $key }}'>+ Add</button>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-row mb-2">
                                        <div class="offset-md-3 col-md-3">
                                            <label for="">Start time:</label>
                                            <input type="time" name="start_time[{{ $key }}][]"
                                                class="form-control" value="{{ $row['start_time'] }}">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">End time:</label>
                                            <input type="time" name="end_time[{{ $key }}][]"
                                                class="form-control" value="{{ $row['end_time'] }}">
                                        </div>
                                        <div class="col-auto align-self-end">
                                            <button type="button"
                                                class="btn btn-danger btn-sm remove-time-range">Remove</button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-img">Submit</button>
    </div>
</form>


<script>
    $(document).ready(function() {
        /************** Add more option jQuery ***********************/
        $(".add-time-range").click(function() {
            var day = $(this).data('day');
            var html = `<div class="form-row mb-2">
                            <div class="offset-md-3 col-md-3">
                                <label for="">Start time:</label>
                                <input type="time" name="start_time[${day}][]" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="">End time:</label>
                                <input type="time" name="end_time[${day}][]" class="form-control">
                            </div>
                            <div class="col-auto align-self-end">
                                <button type="button" class="btn btn-danger btn-sm remove-time-range">Remove</button>
                            </div>
                        </div>`;
            $(this).closest(".form-row").after(html);
        });
        /************** Add more option jQuery ***********************/

        /******************** Remove Filds ******************************/
        $(document).on("click", ".remove-time-range", function() {
            $(this).closest(".form-row").remove();
        });
        /******************** Remove Filds ******************************/

        /******************** Select 2 dropdown search ******************/
        $('.js-example-basic-multiple').select2();
        $('.js-example-basic-single').select2();
        /******************** Select 2 dropdown search ******************/

        $('#sel-all').click(function() {
            if ($(this).is(':checked')) {
                $('.checkbx').prop('checked', true);
            } else {
                $('.checkbx').prop('checked', false);
            }
        });
    });


    /*************** Deal Edit **************************/

    $(document).on('submit', '#edit_deal', function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            dataType: 'JSON',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data) {
                // console.log(data.error)
                if ($.isEmptyObject(data.error)) {
                    // alert(data.success);
                    Swal.fire(
                        'Good job!',
                        'You clicked the button!',
                        'success'
                    )
                    $('#edit_deal')[0].reset();
                    $('#exampleModal').modal('hide');
                    $('#ComboDeal').DataTable().ajax.reload();
                } else {
                    printErrorMsg(data.error);
                }
            },
            error: function(xhr, desc, err) {},
        });
    });

    function printErrorMsg(msg) {
        $.each(msg, function(key, value) {
            // console.log(key);
            $('.' + key + '_err').text(value);
        });
    }
    /*************** Deal Edit **************************/
</script>
<script>
    CKEDITOR.replace('inclusion');
    CKEDITOR.replace('detail');
</script>
