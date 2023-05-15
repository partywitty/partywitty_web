@include('web.include.head')
@include('web.include.header')
<style>
    .error {
        color: red !important;
    }
</style>

<section class="about--banner corporate">
    <div class="main--box">
        <div class="title--name">
            <h1>{{ $title }}</h1>
        </div>
    </div>
</section>

<section class="main--feacture">
    <div class="main--box">
        <!-- <div class="title">
            <h5>SEND A MESSAGE </h5>
            <h2>GET IN TOUCH</h2>
        </div> -->
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
        @endif
        <div class="border--box" style="margin: 0;">
            <div class="contact--box">
                <div class="form--box corporate">
                    <form action="{{ url('submit-party-form') }}" id="party-form" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Type of event</label>
                                    <select name="typeOfevent" class="form-control" required>                                        
                                        <option {{ $typeOfevent == 'private' ? "selected":"" }} value="private">Private</option>
                                        <option {{ $typeOfevent == 'corporate' ? "selected":"" }} value="corporate">Corporate</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Occasion</label>
                                    <select name="occasion_id" class="form-control" required>
                                        <option selected disabled>-- Select Occasion --</option>
                                        @foreach ($occasions as $occasion)
                                            <option value="{{ $occasion['id'] }}">{{ $occasion['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" placeholder="Enter Name" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Venue</label>
                                    <input type="text" placeholder="Enter Venue" name="venue" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" placeholder="Enter Address" name="address"
                                        class="form-control">
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Landmark</label>
                                    <input type="text" placeholder="Enter Landmark" name="landmark"
                                        class="form-control">
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Contact Number</label>
                                    <input type="number" placeholder="Enter Contact Number" name="point_of_contact"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="text" placeholder="yyyy-mm-dd" name="date"
                                        class="form-control date">
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Type of event</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select Event Type</option>
                                        <option value="">Private</option>
                                        <option value="">Corporate</option>
                                    </select>
                                </div>
                            </div> --}}
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Have you arrange the sound for your Party?</label>
                                    <div class="inline--radio">
                                        <div class="radio--box">
                                            <input type="radio" id="yes" value="yes"
                                                name="sound_arrangement">
                                            <label for="yes">Yes</label>
                                        </div>
                                        <div class="radio--box">
                                            <input type="radio" id="no" value="no"
                                                name="sound_arrangement">
                                            <label for="no">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6" id="light_and_sound">
                                <div class="form-group">
                                    <label for="">Light and sound Engineer contact details</label>
                                    <input type="text" placeholder="Enter Details..." name="LSE_contact_details"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            {{-- <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Start Time</label>
                                    <input type="text" placeholder="Enter Start Time" name="start_time"
                                        class="form-control time">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">End Time</label>
                                    <input type="text" placeholder="Enter End Time" name="end_time"
                                        class="form-control time">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Start Break Time</label>
                                    <input type="text" placeholder="Enter Start Time" name="s_break_time"
                                        class="form-control time">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">End Break Time</label>
                                    <input type="text" placeholder="Enter End Time" name="e_break_time"
                                        class="form-control time">
                                </div>
                            </div> --}}
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gathering size</label>
                                    {{-- <input type="text" placeholder="Enter size..." name="gathering_size"
                                        class="form-control"> --}}
                                        <select name="gathering_size" class="form-control">
                                            <option value="0-50">0-50</option>
                                            <option value="50-100">50-100</option>
                                            <option value="100-500">100-500</option>
                                            <option value="500-1000">500-1000</option>
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Type of Music(Genres)</label>
                                    <select name="genres_id" class="form-control">
                                        <option selected disabled>-- select type of Music(Genres) --</option>
                                        @foreach ($genres as $genre)
                                            <option value="{{ $genre['id'] }}">{{ $genre['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Band size</label>
                                    {{-- <input type="text" placeholder="Enter size..." name="band_size"
                                        class="form-control"> --}}
                                        <select name="band_size" class="form-control">
                                            <option value="solo">Solo</option>
                                            <option value="dio">Dio</option>
                                            <option value="trio">Trio</option>
                                            <option value="4 pc">4 pc</option>
                                            <option value="4 pc">5 pc</option>
                                        </select>
                                </div>
                            </div>

                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn--theame--2">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



@include('web.include.footer')
@include('web.include.foot')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<script>
    
    
    $(".date" ).datepicker({
        dateFormat:'yy-mm-dd'
    });
    $('#party-form').validate({
        rules: {
            occasion_id: {
                required: true,
            },
            name: {
                required: true,
            },
            venue: {
                required: true,
            },
            address: {
                required: true
            },
            landmark: {
                required: true
            },
            point_of_contact: {
                required: true,
                maxlength: 11,
                minlength: 10,
            },
            date: {
                required: true
            },
            sound_arrangement: {
                required: true
            },
            start_time: {
                required: true
            },
            end_time: {
                required: true
            },
            s_break_time: {
                required: true
            },
            e_break_time: {
                required: true
            },
            gathering_size: {
                required: true
            },
            genres_id: {
                required: true
            },
            band_size: {
                required: true
            }
        },
        messages: {
            occasion_id: {
                required: "Please Select Occasion",
            },
            name: {
                required: "Please Enter name",
            },
            venue: {
                required: "Please Enter Venue",
            },
            address: {
                required: "Please Enter Address"
            },
            landmark: {
                required: "Please Enter landmark"
            },
            point_of_contact: {
                required: "Please Enter Poin of Contact",
                maxlength: "Please Enter Valid Poin Of Contact",
                minlength: "Please Enter Valid Poin Of Contact"
            },
            date: {
                required: "Please Select Event Date"
            },
            sound_arrangement: {
                required: "Please select either Yes or No for sound arrangement"
            },
            start_time: {
                required: "Please Select Event start time"
            },
            end_time: {
                required: "Please Select Event End time"
            },
            s_break_time: {
                required: "Please Select Event break start time"
            },
            e_break_time: {
                required: "Please Select Event break end time"
            },
            gathering_size: {
                required: "Please Enter Gathering size"
            },
            genres_id: {
                required: "Please Select Type of Music(Genres)"
            },
            band_size: {
                required: "Please Enter Band size"
            }
        },
    });

    $('#light_and_sound').hide();
    $(document).on('click', '#yes', function(){
        $('#light_and_sound').show();
    });
    $(document).on('click', '#no', function(){
        $('#light_and_sound').hide();
    });
</script>