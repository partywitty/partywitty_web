{{-- <div class="vertical-menu"> --}}
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{url('admin_Dashboard')}}" class="waves-effect dashboard">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span>Artist Dashboard</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('manage-artist')}}">Manage Artist</a></li>
                        <li><a href="javascript: void(0);">Artist-Legal</a></li>
                        <li><a href="javascript: void(0);">Artist Reports</a></li>
                        <li><a href="{{url('request_for')}}">Refrral Request</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span>Club Dashboard</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('club_manage')}}">Manage Club</a></li>
                        <li><a href="{{url('manage-club')}}">Manage Club (Old)</a></li>
                        <li><a href="#">Live Music</a></li>
                        <li><a href="{{url('club_reports')}}">Club Reports</a></li>
                        <li><a href="{{ url('club-offers') }}">Club Offers</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span>Event Dashboard</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{url('club_manage')}}">Manage Events</a></li>
                        <li><a href="{{url('club_deal')}}">Event Reports</a></li>
                        <li><a href="{{ url('private-event') }}">Private Event</a></li>
                        <li><a href="{{ url('corporate-event') }}">Corporate Event</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span>Partygoer Dashboard</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('guest-artist') }}">Names & Contact Info.</a></li>
                        <li><a href="javascript: void(0);">Partygoer Reports</a></li>
                        <li><a href="{{ url('guest-wallets') }}">Guest Wallet</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span>Service Agreement</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="javascript: void(0);">Artist</a></li>
                        <li><a href="javascript: void(0);">Club</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span>Employee management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="javascript: void(0);">Role</a></li>
                        <li><a href="javascript: void(0);">Permission</a></li>
                        <li><a href="javascript: void(0);">Employees Exeption</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('contact-us')}}" class="waves-effect manage_artist">
                        <i class="bx bx-user"></i>
                        <span>Contact Us</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-layout"></i>
                        <span>Home Page</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="javascript: void(0);">Party Witty Heart - Artist</a></li>
                        <li><a href="javascript: void(0);">Party Witty Heart - Club</a></li>
                        <li><a href="{{route('cross')}}">Party Witty Cross</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<div class="main-content">