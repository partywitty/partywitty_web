<header class='c-header'>
    <h1 class='c-header__title'>
        <a href="{{ url('') }}"><img src="{{ url('') }}/public/user/assets/img/logo.png" alt=""></a>       
    </h1>
    <div class="offer--logo">
        <a href="{{ url('offer') }}"><img src="{{ url('') }}/public/user/assets/img/offer_logo3.png" alt=""></a>
    </div>
    <nav class='c-navigation'>
        <ul class='c-navigation__list'>
            @if (session()->exists('userdata'))
            <li class='c-navigation__list-item unset_after'>
                <a href="{{ url('') }}"><img src="{{ url('') }}/public/user/assets/img/logo.png" alt=""></a>     
            </li>
            <li class='c-navigation__list-item '>               
                <div class="btn--style--box">
                    <a href='{{ url('logout') }}' class="login btn--th">Logout</a>
                </div>
            </li>
            @else
            <li class='c-navigation__list-item unset_after'>
                <a href="{{ url('') }}"><img src="{{ url('') }}/public/user/assets/img/logo.png" alt=""></a>     
            </li>
           
            <li class='c-navigation__list-item'>
                <a href="{{ url('our-artist') }}" class="service">OUR ARTIST</a>
            </li>            
            {{-- <li class='c-navigation__list-item'>
                <a href="{{ url('event') }}" class="service">EVENT</a>
            </li> --}}
            <li class='c-navigation__list-item '>
                <a href="{{ url('offer') }}" class="conatct">
                    {{-- <img src="{{ url('') }}/public/user/assets/img/offer_logo3.png" alt=""> --}}
                    Deals
                </a>
            </li>
            <li class='c-navigation__list-item'>
                <a href="{{ url('about') }}" class="about">ABOUT US</a>
            </li>

            <!-- <li class='c-navigation__list-item'>
        <a href='{{ url('service') }}' class="service">SERVICES</a>
      </li> -->
            <!-- <li class='c-navigation__list-item'>
        <a href='{{ url('clients') }}' class="clients">CLIENTS</a>
      </li>
      <li class='c-navigation__list-item'>
        <a href='javascript:void(0);' class="portfolio">PORTFOLIO</a>
      </li> -->
            <li class='c-navigation__list-item d-none'>
                <div class="submenu--header">
                    <a href='javascript:void(0);' class="sub--menu">JOIN US</a>
                    <div class="dropdown--box">
                        <a class="dropdown-item" href="{{ url('artist') }}"> As an Artist</a>
                        {{-- <a class="dropdown-item" href="#">As a Club - Coming Soon</a> --}}
                        <a href="{{ url('book-artist') }}" class="url--style">Book an Artist</a>
                    </div>
                </div>
                <!-- <a href='javascript:void(0);' class="sub--menu">Join us</a>
          <div class="dropdown--box">
            <a class="dropdown-item" href="{{ url('artist') }}">As a Artist</a>
            <a class="dropdown-item" href="#">As a Club - Coming Soon</a>
          </div> -->
                <div class="dropdown d-none">
                    <a href='javascript:void(0);' class="hover--dropdown" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Join us
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ url('artist') }}">AS AN ARTIST</a>
                        <a class="dropdown-item" href="{{ url('book-artist') }}">BOOK AN ARTIST</a>
                        <a class="dropdown-item" href="{{url('partner_with_us')}}">PARTNER WITH US</a>
                    </div>
                </div>
            </li>
            <!-- <li class='c-navigation__list-item'>
                <a href='{{ url('blog') }}' class="blog">BLOG</a>
            </li>
            <li class='c-navigation__list-item'>
                <a href='{{ url('careers') }}' class="career">CAREERS</a>
            </li> -->
            <li class='c-navigation__list-item'>
                <a href="{{ url('contact') }}" class="conatct">CONTACT US</a>
            </li>
            <!-- <li class='c-navigation__list-item unset_after'>
                <a href="{{ url('offer') }}" class="conatct">
                    <img src="{{ url('') }}/public/user/assets/img/offer_logo3.png" alt="">
                </a>
            </li> -->
            <li class='c-navigation__list-item search'>
                <a href="javascript:void(0);" class="search--icon" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
            </li>
            <li class='c-navigation__list-item'>
                <div class="btn--style--box">
                    <a href='{{ url('signin') }}' class="login btn--th">Login</a>
                    <a href='{{ url('signup') }}' class="signup btn--th">Sign up</a>
                </div>
            </li>
            @endif
        </ul>
    </nav>
    <!-- <div class="search--icon">
        <li class='c-navigation__list-item search'>
            <a href="javascript:void(0);" class="search--icon" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-search"></i></a>
        </li>
    </div> -->
    <div class='c-cta'>
        <a href="javascript:void(0);" class="button_menu">
            <span></span>
            <span></span>
            <span></span>
        </a>
        <div class="mobile--menu">
            <ul class="mobile--navbar">
                <li class="li--nav"> <a href='{{ url('about') }}' class="link--style about">ABOUT US</a></li>
                <li class="li--nav"> <a href='{{ url('our-artist') }}' class="link--style service">OUR ARTIST</a>
                </li>
                
                {{-- <li class="li--nav"> <a href='{{ url('event') }}' class="link--style clients">EVENT</a></li> --}}
               
                <li class="li--nav">
                    <div class="dropdown--menu" id="">
                        <a href="javascript:void(0);" id="mobile--menu--dropdown" class="link--style">JOIN US</a>
                        <div class="dropdown-mobile">
                                <a class="drop--menu" href="{{ url('artist') }}">AS AN ARTIST</a>
                                <a class="drop--menu" href="{{ url('book-artist') }}">BOOK AN ARTIST</a>
                                <a class="drop--menu" href="{{url('partner_with_us')}}">PARTNER WITH US</a>
                        </div>
                    </div>
                </li>
                <!-- <li class="li--nav"> <a href='{{ url('artist') }}' class="link--style artist">As a Artist</a></li> -->
                <!-- <li class="li--nav"> <a href='{{ url('club') }}' class="link--style club">As a Club</a></li> -->
                <!-- <li class="li--nav"> <a href='{{ url('blog') }}' class="link--style blog">BLOG</a></li> -->
                <!-- <li class="li--nav"> <a href='{{ url('careers') }}' class="link--style career">CAREERS</a></li> -->
                <li class="li--nav"> <a href='{{ url('contact') }}' class="link--style conatct">CONTACT US</a></li>
                <li class="li--nav"> <a href='{{ url('offer') }}' class="link--style offer">OFFER</a></li>
                <li class='c-navigation__list-item'>
                    <div class="btn--style--box">
                        <a href='{{ url('signin') }}' class="login btn--th">Login</a>
                        <a href='{{ url('signup') }}' class="signup btn--th">Sign up</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</header>


<div class="modal fade search--box" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
            <form action="">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="search" class="form-control" placeholder="Search here..." />
                    </div>
                </div>

                <div class="modal-footer text-center">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="button" class="btn--theame--2">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>