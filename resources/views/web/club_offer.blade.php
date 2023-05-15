@include('web.include.head')
@include('web.include.header')

<style>
.error {
    color: red !important;
}
</style>
<section class="about--banner">
    <div class="main--box">
        <div class="title--name">
            <h1>Club Offer</h1>
        </div>
    </div>
</section>

<section class="main--feacture">
    <div class="main--box">
        <!-- <div class="title" style="visibility: hidden;">
            <h5>SEND A MESSAGE </h5>
            <h2>GET IN TOUCH</h2>
        </div> -->
        @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <div class="border--box m-0">
            <div class="contact--box">
                <div class="form--box">
                    <form action="{{ url('club-offer') }}" method="post" id="club_offer">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name of the Club *</label>
                                    <input type="text" placeholder="Enter Name" name="club_name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Your Name *</label>
                                    <input type="text" placeholder="Enter your name" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Your Number *</label>
                                    <input type="text" placeholder="Enter your number" name="contact_no"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Are you the *</label>
                                    <select name="are_you" class="form-control">
                                        <option selected disabled>Select</option>
                                        <option value="Owner">Owner</option>
                                        <option value="Manager">Manager</option>
                                        <option value="Staff">Staff</option>
                                        <option value="Agent">Agent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Dance Floor *</label>
                                    <div class="inline--radio">
                                        <div class="radio--box">
                                            <input type="radio" id="yes" name="dance_floor" value="1">
                                            <label for="yes">Yes</label>
                                        </div>
                                        <div class="radio--box">
                                            <input type="radio" id="no" name="dance_floor" value="0">
                                            <label for="no">no</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">LIVE Music *</label>
                                    <div class="inline--radio">
                                        <div class="radio--box">
                                            <input type="radio" name="live_music" id="live_music_yes" value="1">
                                            <label for="live_music_yes">Yes</label>
                                        </div>
                                        <div class="radio--box">
                                            <input type="radio" name="live_music" id="live_music_no" value="0">
                                            <label for="live_music_no">no</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">You would like to advertise your club /Restaurant deals with
                                        partywitty for</label>
                                    <select name="advertise_type" class="form-control">
                                        <option selected disabled>Select</option>
                                        <option value="0">Special Days</option>
                                        <option value="1">Regular Days</option>
                                        <option value="2">Both</option>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<script>
$("#club_offer").validate({
    rules: {
        // simple rule, converted to {required:true}
        club_name: {
            required: true,
        },
        name: {
            required: true,
        },
        contact_no: {
            required: true,
            minlength: 10,
            number: true
        },
        are_you: {
            required: true
        },
        dance_floor: {
            required: true,
        },
        live_music: {
            required: true,
        },
        advertise_type: {
            required: true,
        }
    }
});
</script>