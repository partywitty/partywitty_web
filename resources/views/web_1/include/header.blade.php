<header class='c-header'>
  <h1 class='c-header__title'> <a href="{{ url('') }}"><img src="{{url('')}}/public/user/assets/img/logo.png" alt=""></a></h1>
  <nav class='c-navigation'>
    <ul class='c-navigation__list'>
      <li class='c-navigation__list-item'>
        <a href="{{ url('') }}" class="home">HOME</a>
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
      <li class='c-navigation__list-item'>
          <div class="submenu--header">
            <a href='javascript:void(0);' class="sub--menu">Join us</a>
            <div class="dropdown--box">
              <a class="dropdown-item" href="{{ url('artist') }}">As an Artist</a>            
              <a class="dropdown-item" href="#">As a Club - Coming Soon</a>
            </div>
          </div>
         
        <div class="dropdown d-none">
          <a href='javascript:void(0);' type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Join us
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ url('artist') }}">As an Artist</a>
            <!-- <a class="dropdown-item" href="{{ url('club') }}">As a Club</a> -->
            <a class="dropdown-item" href="#">As a Club - Coming Soon</a>

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
    </ul>
  </nav>
  <div class='c-cta'>    
    <a href="javascript:void(0);" class="button_menu">
        <span></span>
        <span></span>
        <span></span>
    </a>
    <!-- <button class='c-cta__button c-cta__button__menu'>  </button> -->

    <div class="mobile--menu">
        <ul class="mobile--navbar">
            <li class="li--nav"> <a href='{{ url('') }}' class="link--style home">HOME</a></li>
            <li class="li--nav"> <a href='{{ url('about') }}' class="link--style about">ABOUT US</a></li>
            <li class="li--nav"> <a href='{{ url('service') }}' class="link--style service">SERVICES</a></li>
            <li class="li--nav"> <a href='{{ url('clients') }}' class="link--style clients">CLIENTS</a></li>
            <li class="li--nav"> <a href='javascript:void(0);' class="link--style portfolio">PORTFOLIO</a></li>
            <li class="li--nav"> 
              <div class="dropdown--menu" id="">
                <a href="javascript:void(0);" id="mobile--menu--dropdown" class="link--style">Join us</a>
                <div class="dropdown-mobile">
                  <a class="drop--menu" href="{{ url('artist') }}">As an Artist</a>
                  <a class="drop--menu" href="{{ url('club') }}">As a Club</a>
                </div>
              </div>
            </li>
            <!-- <li class="li--nav"> <a href='{{ url('artist') }}' class="link--style artist">As a Artist</a></li> -->
            <!-- <li class="li--nav"> <a href='{{ url('club') }}' class="link--style club">As a Club</a></li> -->
            <li class="li--nav"> <a href='{{ url('blog') }}' class="link--style blog">BLOG</a></li>
            <li class="li--nav"> <a href='{{ url('careers') }}' class="link--style career">CAREERS</a></li>
            <li class="li--nav"> <a href='{{ url('contact') }}' class="link--style conatct" >CONTACT US</a></li>
        </ul>
    </div>
  </div>
  
</header>