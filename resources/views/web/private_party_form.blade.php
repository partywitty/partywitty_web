@include("web.include.head")
@include("web.include.header")

<section class="about--banner private">
    <div class="main--box">
        <div class="title--name">
            <h1>Private Party</h1>
        </div>
    </div>
</section>

<section class="main--feacture">
    <div class="main--box">
        <!-- <div class="title">
            <h5>SEND A MESSAGE </h5>
            <h2>GET IN TOUCH</h2>
        </div> -->
        <div class="border--box" style="margin: 0;">
            <div class="contact--box">
                <div class="form--box corporate">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Type of event</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select Event Type</option>
                                        <option value="">Indoor</option>
                                        <option value="">Ambience</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Occasion</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select Occasion</option>
                                        <option value="">Mehandi</option>
                                        <option value="">Birthday Party</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" placeholder="Enter Name" name="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Venue</label>
                                    <input type="text" placeholder="Enter Venue" name="" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" placeholder="Enter Address" name="" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Landmark</label>
                                    <input type="text" placeholder="Enter Landmark" name="" class="form-control" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Point of contact</label>
                                    <input type="number" placeholder="Enter Point of contact" name="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="text" placeholder="Enter Date" name="" class="form-control date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Type of event</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select Event Type</option>
                                        <option value="">Private</option>
                                        <option value="">Corporate</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Sound arrangement</label>
                                    <div class="inline--radio">
                                        <div class="radio--box">
                                            <input type="radio" id="yes" name="sound_arrangement">
                                            <label for="yes">Yes</label>
                                        </div>
                                        <div class="radio--box">
                                            <input type="radio" id="no" name="sound_arrangement">
                                            <label for="no">No</label>
                                        </div>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Start Time</label>
                                    <input type="text" placeholder="Enter Start Time" name="" class="form-control time">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">End Time</label>
                                    <input type="text" placeholder="Enter End Time" name="" class="form-control time">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Start Break Time</label>
                                    <input type="text" placeholder="Enter Start Time" name="" class="form-control time">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">End Break Time</label>
                                    <input type="text" placeholder="Enter End Time" name="" class="form-control time">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Light and sound Engineer contact details</label>
                                    <input type="text" placeholder="Enter Details..." name="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Gathering size</label>
                                    <input type="text" placeholder="Enter size..." name="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Type of Music</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Select Music Type</option>
                                        <option value="">Sufi</option>
                                        <option value="">Remix</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Band size</label>
                                    <input type="text" placeholder="Enter size..." name="" class="form-control">
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



@include("web.include.footer")
@include("web.include.foot")
<script>
    $(".date" ).datepicker({
        dateFormat:'yy-mm-dd'
    });

     
</script>