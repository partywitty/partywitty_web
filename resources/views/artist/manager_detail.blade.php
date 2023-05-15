@include('artist.include.head')
@include('artist.include.header')
<style>
    .error{
        color:red !important;
        font-size: small;
    }
</style>
<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="back--btn">
            <a href="{{url('facebook_data')}}">
                <img src="{{url('')}}/public/assets/img/back.png" alt="">
            </a>
        </div>
        <div class="box--c intro">
            <h3>Manager Detail</h3>
            @if (\Session::has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
            @endif
            <form action="{{url('submit_manager_detail')}}" method="post" id="myform">
                @csrf
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">Party Witty Signature </label>
                        <input type="text" class="form-control rd" name="signature" placeholder="Write a signature Link... " required>
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">Manager Name</label>
                        <input type="text" class="form-control rd" name="name" placeholder="Write a Manager name... " required>
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">Manager Contact No.</label>
                        <input type="number" class="form-control rd" name="contact_no" placeholder="Write a Manager Contact No... " required>
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">Preferred language</label>
                        <select class="form-control rd" name="language_id">
                            <option selected disabled>-- Select Preferred Language --</option>
                            @foreach($languages as $language)
                            <option value="{{$language['id']}}">{{$language['language']}}</option>
                            @endforeach
                        </select>
                    </div>
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
    bodyClass('artist--list');
</script>
<script>
    $('#myform').validate({ // initialize the plugin
        rules: {
            signature: {
                required: true
            },
            name: {
                required: true
            },
            contact_no: {
                required: true,
                minlength: 10,
                maxlength: 11
            },
            language_id: {
                required: true
            }
        }
    });
</script>