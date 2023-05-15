@include("web.include.head")
@include("web.include.header")

<section class="about--banner">
    <div class="main--box">
        <div class="title--name">
            <h1>Contact us</h1>
        </div>
    </div>
</section>

<section class="main--feacture">
    <div class="main--box">
        <div class="title">
            <h5>SEND A MESSAGE </h5>
            <h2>GET IN TOUCH</h2>
        </div>
        <div class="border--box">
            <div class="contact--box">
                <div class="form--box">
                    @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                    @endif
                    <form action="{{url('contact_submit')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Your Name *</label>
                                    <input type="text" placeholder="Enter Name" name="username" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mobile Number *</label>
                                    <input type="text" placeholder="Enter Mobile Number" name="mobile" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Your Email *</label>
                                    <input type="text" placeholder="Enter Email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Location *</label>
                                    <input type="text" placeholder="Enter Location" name="location" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Subject</label>
                                    <input type="text" placeholder="Enter Subject" name="subject" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Your Message</label>
                                    <textarea type="text" placeholder="Enter Message" name="message" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn--theame--2">Send Message</button>
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