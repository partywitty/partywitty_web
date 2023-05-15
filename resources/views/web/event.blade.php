@include("web.include.head")
@include("web.include.header")

<section class="about--banner event_page">
    <div class="main--box">
        <!-- <div class="title--name">
            <h1>As an Artist</h1>
        </div> -->
    </div>
</section>
<section class="main--feacture blog">    
    <div class="main--box">
        <div class="wrapper--box">
            <div class="category--box">
                <div class="mobile--category">
                    <h5>Menus</h5>
                    <h5><a href="#menus" class="fa--plus" id="category_menu"></a></h5>
                </div>
                <div class="tab--style">
                    <div class="aside--box">
                        <div class="head--box">
                            <h5 class="name"> Search </h5>  
                            <h5 class="active"><a href="#search" class="fa--plus"></a></h5>                        
                        </div>
                        <div class="body--box" id="search">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="search" placeholder="Search..." class="form-control">
                                        <span class="search--icon"><img src="{{url('')}}/public/user/assets/img/search.png" alt="" ></span>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="aside--box">
                        <div class="head--box">
                            <h5 class="name"> Select Date </h5>
                            <h5><a href="#select_pacakage" class="fa--plus"></a></h5>
                        </div>
                        <div class="body--box" id="select_pacakage" style="display: none;">
                        </div>
                    </div>
                  
                    <div class="aside--box">
                        <div class="head--box">
                            <h5 class="name"> Price </h5> 
                            <h5 ><a href="#price" class="fa--plus"></a></h5>                      
                        </div>
                        <div class="body--box" id="price" style="display: none;">
                                       
                        </div>
                    </div>
                    <div class="aside--box">
                        <div class="head--box">
                            <h5 class="name"> Music Type </h5> 
                            <h5 ><a href="#musictype" class="fa--plus"></a></h5>                      
                        </div>
                        <div class="body--box" id="musictype" style="display: none;">
                            <div class="ul--wrapper">
                                <div class="pacakage--box">Popular music</div>
                                <div class="pacakage--box">Blues Music.</div>
                                <div class="pacakage--box">Rock Music</div>
                                <div class="pacakage--box">Soul Music</div>
                            </div>                
                        </div>
                    </div>
                    <div class="aside--box">
                        <div class="head--box">
                            <h5 class="name">Stage Formation </h5> 
                            <h5 ><a href="#stage_information" class="fa--plus"></a></h5>                      
                        </div>
                        <div class="body--box" id="stage_information" style="display: none;">
                            <div class="ul--wrapper">
                                <div class="pacakage--box">Trio</div>
                                <div class="pacakage--box">Duio</div>
                                <div class="pacakage--box">Rock Music</div>
                                <div class="pacakage--box">Solo</div>
                            </div>                   
                        </div>
                    </div>
                    <div class="aside--box">
                        <div class="head--box">
                            <h5 class="name"> Venue</h5> 
                            <h5 ><a href="#venue" class="fa--plus"></a></h5>                      
                        </div>
                        <div class="body--box" id="venue" style="display: none;">
                            <div class="ul--wrapper">
                                <div class="pacakage--box">Marriage</div>
                                <div class="pacakage--box">Birthday</div>
                                <div class="pacakage--box">Anniversary</div>
                            </div>               
                        </div>
                    </div>
                </div>
            </div>
            <div class="blog--box event">
                <div class="grid--box">
                    <?php for($i=1; $i<=6; $i++){   ?>
                        <div class="event--box">
                            <div class="event--img">
                                <a href="javascript:void(0);" class="heart--blank"><i class="fa fa-heart-o"></i></a>
                                <img src="{{url('')}}/public/user/assets/img/event_img1.png" alt="">                                
                            </div>
                            <div class="content">
                                <h5> Piece Band Setup by  Sanmeet a</h5>                               
                                <p><i class="fa fa-calendar" aria-hidden="true"></i> MON 14/08/2023</p>
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i> 12 PM - 4 PM</p>                                
                                <div class="list--type">
                                    <span>Bollywood</span>
                                    <span>Pop/Rock</span>
                                </div>    
                                <h5><i class="fa fa-map-marker" aria-hidden="true"> </i> California, CA </h5> 
                                <p class="para">It is a long established fact that a reader will be distracteby the readable content </p>                            
                                <button type="button" class="book--btn">Book Now</button>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
            
        </div>
    </div>
</section>



@include("web.include.footer")
@include("web.include.foot")
