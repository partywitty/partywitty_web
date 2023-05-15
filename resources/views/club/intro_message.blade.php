@include('club.include.head')
@include('artist.include.header')
<style>
    .error{
        color: red !important;
        font-size: 16px !important;
        margin-top: 2px !important;
    }
</style>

<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="back--btn">
            <a href="{{ url('referral_code') }}">
                <img src="{{ url('') }}/public/assets/img/back.png" alt="">
            </a>
        </div>
        <div class="box--c intro">
            <h3>Intro Message in words </h3>
            <form action="{{ url('submit-intro-message') }}" id="submit-intro-message" method="post">
                @csrf
                <div class="grid--box">
                    <div class="flex--100">
                        <label for="">Name of the Club</label>
                        <!-- <a href="javascript:void(0);"><span class="fa fa-edit"></span></a> -->
                        <input type="text" name="name_of_club" class="form-control"
                            placeholder="Write a  Name of the Club...">
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--50">
                        <label for="">Address</label>
                        <textarea name="address" class="form-control" placeholder="Write a Address..."></textarea>
                    </div>
                    <div class="flex--50">
                        <label for="">Landmark</label>
                        <textarea name="landmark" class="form-control" placeholder="Write a Landmark..."></textarea>
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--40">
                        <label for="">State</label>
                        <input type="text" name="state" class="form-control" placeholder="Write a State...">
                    </div>
                    <div class="flex--40">
                        <label for="">Town/City</label>
                        <input type="text" name="city" class="form-control" placeholder="Write a City... ">
                    </div>
                    <div class="flex--40">
                        <label for="">PinCode</label>
                        <input type="number" name="pincode" class="form-control" placeholder="Write a Pincode...">
                    </div>
                </div>
                <div class="grid--box">
                    <div class="flex--50">
                        <label for="">I Am </label>
                        <div class="inline--radio--btn">
                            <div class=" form-check-inline">
                                <label class="form-check-label" for="inlineRadio1">Owner</label>
                                <input class="form-check-input" type="radio" name="iam" id="inlineRadio1"
                                    value="owner">
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label" for="inlineRadio2">Manager</label>
                                <input class="form-check-input" type="radio" name="iam" id="inlineRadio2"
                                    value="manager">
                            </div>
                        </div>
                    </div>
                    <div class="flex--40">
                        <label for="">POC Number</label>
                        <input type="number" name="poc" class="form-control" placeholder="Phone number">
                    </div>
                </div>

                <div class="login--button--bx">
                    <button type="submit" class="lg--btn--theame">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@include('club.include.foot')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    bodyClass('club--list');
</script>
<script>
    $("#submit-intro-message").validate({
        rules: {
            name_of_club: {
                required: true,
            },
            address: {
                required: true,
            },
            landmark: {
                required: true,
            },
            state: {
                required: true,
            },
            city: {
                required: true,
            },
            pincode: {
                required: true,
                minlength: 6,
            },
            iam: {
                required: true,
            },
            poc: {
                required: true,
                minlength: 10,
                maxlength: 10,
            }
        },
        messages: {
            name_of_club: {
                required: "Please write name of the club.",
            },
            address: {
                required: "Please write address.",
            },
            landmark: {
                required: "Please write landmark.",
            },
            state: {
                required: "Please write state.",
            },
            city: {
                required: "please write city",
            },
            pincode: {
                required: "Please write pincode",
                minlength: "Plese write valid pincode",
            },
            iam: {
                required: "Please select i am",
            },
            poc: {
                required: "Please writes POC number",
                minlength: "Please write valid POC number",
                maxlength: "Please write valid POC number",
            }
        },
    });
</script>
