@include("web.include.head")
@include("web.include.header")

<section class="about--banner">
    <div class="main--box">
        <div class="title--name">
            <h1>Blog</h1>
        </div>
    </div>
</section>
<section class="main--feacture blog">    
    <div class="main--box">
        <div class="wrapper--box">
            <div class="blog--box">
                <div class="grid--box">
                    <?php for($i=1; $i<=4; $i++){

                        
                        ?>
                        <div class="blog--a">
                           <div class="blog--img">
                                <img src="{{url('')}}/public/user/assets/img/blog_<?= $i?>.png" alt="">
                           </div>
                            <h3>Going to Club Alone,Good or Bad Idea?</h3>
                            <h5>MON 14/08/2023</h5>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tinci dunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse. Molestie consequat, vel…</p>
                        </div>
                    <?php }?>
                </div>
            </div>
            <div class="category--box">
                <div class="aside--box">
                    <div class="head--box">
                        <h5 class="name"> Categories </h5>
                        <h5 ><a href="javascript:void(0);" class="fa--plus"></a></h5>
                    </div>
                    <div class="body--box">
                        <div class="ul--box">
                            <div class="li--box"><a href="javascript:void(0);">Club Life</a> </div>
                            <div class="li--box"><a href="javascript:void(0);">Dance</a> </div>
                            <div class="li--box"><a href="javascript:void(0);">Dance Floor</a> </div>
                            <div class="li--box"><a href="javascript:void(0);">Music</a> </div>
                            <div class="li--box"><a href="javascript:void(0);">Photogallery</a> </div>
                            <div class="li--box"><a href="javascript:void(0);">Relax</a> </div>
                            <div class="li--box"><a href="javascript:void(0);">Uncategorized</a> </div>
                        </div>
                    </div>
                </div>
                <div class="aside--box">
                    <div class="head--box">
                        <h5 class="name"> Search </h5>                       
                    </div>
                    <div class="body--box">
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
                        <h5 class="name"> Comments </h5> 
                        <h5 ><a href="javascript:void(0);" class="fa--plus"></a></h5>                      
                    </div>
                    <div class="body--box">
                        <div class="comments">
                            <div class="wrapper--box">
                                <div class="icon--msz">
                                    <img src="{{url('')}}/public/user/assets/img/msz.png" alt="">
                                </div>
                                <h5>JOHN SNOW</h5>
                            </div>
                            <p class="msz--para">Kill the Noise Party </p>
                        </div>
                        <div class="comments">
                            <div class="wrapper--box">
                                <div class="icon--msz">
                                    <img src="{{url('')}}/public/user/assets/img/msz.png" alt="">
                                </div>
                                <h5>JOHN SNOW</h5>
                            </div>
                            <p class="msz--para">Kill the Noise Party </p>
                        </div>                        
                    </div>
                </div>
                <div class="aside--box">
                    <div class="head--box">
                        <h5 class="name"> Calendar </h5> 
                        <h5 ><a href="javascript:void(0);" class="fa fa-calendar"></a></h5>                      
                    </div>
                </div>
                <div class="aside--box">
                    <div class="head--box">
                        <h5 class="name"> Tags </h5> 
                        <h5 ><a href="javascript:void(0);" class="fa--plus"></a></h5>                      
                    </div>
                    <div class="body--box">
                        <div class="grid--box">
                            <div class="type"><h5>CLUBBING </h5></div>
                            <div class="type"><h5>MIXING  </h5></div>
                            <div class="type"><h5>MUSIC  </h5></div>
                            <div class="type"><h5>PODCAST  </h5></div>
                            <div class="type"><h5>TRANCE  </h5></div>
                            <div class="type"><h5>SUPERMIX   </h5></div>
                            <div class="type"><h5>DJR   </h5></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




@include("web.include.footer")
@include("web.include.foot")
