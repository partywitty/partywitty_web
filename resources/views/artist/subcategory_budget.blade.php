@include('artist.include.head')
@include('artist.include.header')

<!-- <div class="back--btn">
    <a href="{{ url('referral_code') }}">
        <img src="{{ url('') }}/public/assets/img/back.png" alt="">
    </a>
</div> -->
<style>
    .row.add--on {
        display: flex;
        justify-content: end;
    }
</style>

<section class="artist_hire--section">
    <div class="main--box art--list">
        <div class="back--btn">
            <a href="{{ url('instrumental-page') }}">
                <img src="{{ url('') }}/public/assets/img/back.png" alt="">
            </a>
        </div>
        <div class="box--c">
            <h3>{{ $title }} Budget</h3>
            <form action="{{ url('submit_subcategory') }}" method="post">
                @csrf
                <input type="hidden" name="subcategory_id" value="{{ $subcategory_id }}">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <h5 class="title--budget">For Private</h5>
                    </div>
                    <?php $data_array = []; ?>
                    @if (!empty($selecteds))
                        @foreach ($selecteds as $selected)
                            @if ($subcategory_id != '15')
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group budget">
                                                <label for="">{{ $selected['name'] }} name</label>
                                                <input type="hidden" name="first_intrument_id[]"
                                                    value="{{ $selected['id'] }}">
                                                <input type="text" name="first_name[]" class="form-control"
                                                    placeholder="Name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="first_intrument_id[]" value="{{ $selected['id'] }}">
                                <input type="hidden" name="first_name[]" class="form-control" value=" "
                                    placeholder="Name">
                            @endif
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group budget">
                                            <label for="">Price</label>
                                            <input type="number" name="first_price[]" class="form-control"
                                                placeholder="price" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $data_array[] = $selected['id']; ?>
                        @endforeach
                        @if ($subcategory_id != '15')
                            <div class="col-md-12">
                                <div class="row add--on">
                                    <div class="col-md-6">
                                        <div class="form-group budget">
                                            <label for="">Total</label>
                                            <input type="hidden" name="first_intrument_id[]"
                                                value="{{ implode(',', $data_array) }}">
                                            <input type="hidden" name="first_name[]" value=" ">
                                            <input type="number" name="first_price[]" class="form-control"
                                                placeholder="price" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <h5 class="title--budget">For Club</h5>
                    </div>
                    <?php $data_array = []; ?>
                    @if (!empty($selecteds))
                        @foreach ($selecteds as $selected)
                            @if ($subcategory_id != '15')
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group budget">
                                                <label for="">{{ $selected['name'] }} name</label>
                                                <input type="hidden" name="secound_intrument_id[]"
                                                    value="{{ $selected['id'] }}">
                                                <input type="text" name="secound_name[]" class="form-control"
                                                    placeholder="Name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="secound_intrument_id[]" value="{{ $selected['id'] }}">
                                <input type="hidden" name="secound_name[]" class="form-control" value=" "
                                    placeholder="Name">
                            @endif
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group budget">
                                            <label for="">Price</label>
                                            <input type="number" name="secound_price[]" class="form-control"
                                                placeholder="price" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $data_array[] = $selected['id']; ?>
                        @endforeach
                        @if ($subcategory_id != '15')
                            <div class="col-md-12">
                                <div class="row add--on">
                                    <div class="col-md-6">
                                        <div class="form-group budget">
                                            <label for="">Total</label>
                                            <input type="hidden" name="secound_intrument_id[]"
                                                value="{{ implode(',', $data_array) }}">
                                            <input type="hidden" name="secound_name[]" value=" ">
                                            <input type="number" name="secound_price[]" class="form-control"
                                                placeholder="price" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <h5 class="title--budget">For Corporate</h5>
                    </div>
                    <?php $data_array = []; ?>
                    @if (!empty($selecteds))
                        @foreach ($selecteds as $selected)
                            @if ($subcategory_id != '15')
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group budget">
                                                <label for="">{{ $selected['name'] }} name</label>
                                                <input type="hidden" name="third_intrument_id[]"
                                                    value="{{ $selected['id'] }}">
                                                <input type="text" name="third_name[]" class="form-control"
                                                    placeholder="Name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <input type="hidden" name="third_intrument_id[]" value="{{ $selected['id'] }}">
                                <input type="hidden" name="third_name[]" class="form-control" value=" "
                                    placeholder="Name">
                            @endif
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group budget">
                                            <label for="">Price</label>
                                            <input type="number" name="third_price[]" class="form-control"
                                                placeholder="price" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $data_array[] = $selected['id']; ?>
                        @endforeach
                        @if ($subcategory_id != '15')
                            <div class="col-md-12">
                                <div class="row add--on">
                                    <div class="col-md-6">
                                        <div class="form-group budget">
                                            <label for="">Total</label>
                                            <input type="hidden" name="third_intrument_id[]"
                                                value="{{ implode(',', $data_array) }}">
                                            <input type="hidden" name="third_name[]" value=" ">
                                            <input type="number" name="third_price[]" class="form-control"
                                                placeholder="price" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
                <div class="login--button--bx">
                    <button type="submit" class="lg--btn--theame budget">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@include('artist.include.foot')


<script>
    bodyClass('artist--list');
</script>
