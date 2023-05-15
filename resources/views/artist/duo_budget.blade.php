@include('artist.include.head')
@include('artist.include.header')

<!-- <div class="back--btn">
    <a href="{{ url('referral_code') }}">
        <img src="{{ url('') }}/public/assets/img/back.png" alt="">
    </a>
</div> -->

<section class="artist_hire--section">
    <div class="main--box art--list">
        <div class="back--btn">
            <a href="{{ url('instrumental-page') }}">
                <img src="{{ url('') }}/public/assets/img/back.png" alt="">
            </a>
        </div>
        <div class="box--c">
            <h3>Duo Budget</h3>
            <form action="{{ url('submit_duo') }}" method="post">
                @csrf
                <input type="hidden" name="subcategory_id" value="2">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <h5 class="title--budget">For Private</h5>
                    </div>
                    <?php $data_array = []; ?>
                    @if (!empty($selecteds))
                        @foreach ($selecteds as &$selected)
                            <div class="col-md-4">
                                <div class="form-group budget">
                                    <label for="">{{ $selected['name'] }}</label>
                                    <input type="hidden" name="first_intrument_id[]" value="{{ $selected['id'] }}">
                                    <input type="number" name="first_price[]" class="form-control" placeholder="price"
                                        required>
                                </div>
                            </div>
                            <?php $data_array[] = $selected['id']; ?>
                        @endforeach
                        <div class="col-md-4">
                            <div class="form-group budget">
                                <label for="">All</label>
                                <input type="hidden" name="first_intrument_id[]" value="{{ implode(',', $data_array)}}">
                                <input type="number" name="first_price[]" class="form-control" placeholder="price"
                                    required>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <h5 class="title--budget">For Club</h5>
                    </div>
                    <?php $data_array = []; ?>
                    @if (!empty($selecteds))
                        @foreach ($selecteds as &$selected)
                            <div class="col-md-4">
                                <div class="form-group budget">
                                    <label for="">{{ $selected['name'] }}</label>
                                    <input type="hidden" name="secound_intrument_id[]" value="{{ $selected['id'] }}">
                                    <input type="number" name="secound_price[]" class="form-control" placeholder="price"
                                        required>
                                </div>
                            </div>
                            <?php $data_array[] = $selected['id']; ?>
                        @endforeach
                        <div class="col-md-4">
                            <div class="form-group budget">
                                <label for="">All</label>
                                <input type="hidden" name="secound_intrument_id[]" value="{{ implode(',', $data_array)}}">
                                <input type="number" name="secound_price[]" class="form-control" placeholder="price"
                                    required>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <h5 class="title--budget">For Corporate</h5>
                    </div>
                    <?php $data_array = []; ?>
                    @if (!empty($selecteds))
                        @foreach ($selecteds as &$selected)
                            <div class="col-md-4">
                                <div class="form-group budget">
                                    <label for="">{{ $selected['name'] }}</label>
                                    <input type="hidden" name="third_intrument_id[]" value="{{ $selected['id'] }}">
                                    <input type="number" name="third_price[]" class="form-control" placeholder="price"
                                        required>
                                </div>
                            </div>
                            <?php $data_array[] = $selected['id']; ?>
                        @endforeach
                        <div class="col-md-4">
                            <div class="form-group budget">
                                <label for="">All</label>
                                <input type="hidden" name="third_intrument_id[]" value="{{ implode(',', $data_array)}}">
                                <input type="number" name="third_price[]" class="form-control" placeholder="price"
                                    required>
                            </div>
                        </div>
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
