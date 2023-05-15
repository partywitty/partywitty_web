@include('artist.include.head')
@include("artist.include.header")

<section class="artist_hire--section ">
    <div class="main--box intro">
        <div class="back--btn">
            <a href="{{url('UploadClubs')}}">
                <img src="{{url('')}}/public/assets/img/back.png" alt="">
            </a>
        </div>
        <div class="box--c channel">
            <h3>Insta Followers with URL</h3>
            <form action="{{url('submitinta')}}" method="post">
                @csrf
                <div class="clickable--box insta">                
                    <div class="music--url">
                        <input type="url" class="url--style" name="intagram_link" value="{{(!empty($UserProfiles->intagram_link))? $UserProfiles->intagram_link:'' }}" placeholder="https //www.instagram.com">
                    </div>
                </div>
                <div class="clickable--box insta">                
                    <div class="music--url">
                        <input type="text" class="url--style" name="intagram_follower" value="{{(!empty($UserProfiles->intagram_follower))? $UserProfiles->intagram_follower:'' }}" placeholder="Followers">
                    </div>
                </div>      
                <div class="login--button--bx ">
                    <button type="submit" class="lg--btn--theame">Submit</button>
                    <!-- facebook_data -->
                </div>  
                <div class="login--button--bx ">
               
                    <a href="{{url('facebook_data')}}" class="lg--btn--theame">skip</a>
                </div>
            </form>
        </div>
    </div>
</section>

@include('artist.include.foot')
<script>
bodyClass('artist--page');
</script>