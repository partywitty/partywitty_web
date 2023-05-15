@include("web.include.head")
@include("web.include.header")

<section class="about--banner">
    <div class="main--box">
        <div class="title--name">
            <h1>Careers</h1>
        </div>
    </div>
</section>
<section class="main--feacture career">    
    <div class="main--box">
        <div class="title">
            <h5>SEND A MESSAGE </h5>
            <h2>GET IN TOUCH</h2>            
        </div>
        <div class="grid--box">
            <div class="box--a">
                <img src="{{url('')}}/public/user/assets/img/team_1.png" alt="">
                <h5>DJR</h5>
            </div>
            <div class="box--a">
                <img src="{{url('')}}/public/user/assets/img/team_2.png" alt="">
                <h5>LIGHT & SOUND </h5>
            </div>
            <div class="box--a">
                <img src="{{url('')}}/public/user/assets/img/team_3.png" alt="">
                <h5>BARTENDER </h5>
            </div>
        </div>
        <div class="border--box">
            <div class="contact--box">
                <div class="form--box">
                    <form action="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <p>Be a part of the amazing team, delivering the best marcomm results for top-tier clients. </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Name*</label>
                                    <input type="text" placeholder="Enter Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" placeholder="Enter Email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Message*</label>
                                    <textarea type="text" placeholder="Enter Message*" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Upload your resume</label>
                                    <input type="file" placeholder="" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                            <button type="button" class="btn--theame--2">Send</button>
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
