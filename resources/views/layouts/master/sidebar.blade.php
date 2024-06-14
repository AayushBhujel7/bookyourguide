           <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo">
                <a href="#" class="simple-text logo-normal">
                    {{Auth::user()->name}}
                </a>
            </div>

            <div class="sidebar-wrapper">
                <ul class="nav">

                        <li class="nav-item active ">
                            <a class="nav-link" href="/">
                                <p>View Website</p>
                            </a>
                        </li>
                    @auth
                        <li class="nav-item active ">
                            <a class="nav-link" href="/home">
                                <p>Dashboard</p>
                            </a>
                        </li>
                    @endauth

                    @if(Auth::user()->role == 'admin')
                        <li class="nav-item active ">
                            <a class="nav-link" href="/admin/tours">
                                <p>All Tourist Areas</p>
                            </a>
                        </li>
                        <li class="nav-item active ">
                            <a class="nav-link" href="/admin/users">
                                <p>All Guides</p>
                            </a>
                        </li>
                        <li class="nav-item active ">
                            <a class="nav-link" href="/admin/bookings">
                                <p>All Bookings</p>
                            </a>
                        </li>
                        <li class="nav-item active ">
                            <a class="nav-link" href="/admin/ads">
                                <p>Ads Setting</p>
                            </a>
                        </li>
                        <li class="nav-item active ">
                            <a class="nav-link" href="/admin/profile">
                                <p>Edit Profile</p>
                            </a>
                        </li>
                        
                    @elseif(Auth::user()->role == 'user')

                        <li class="nav-item active ">
                            <a class="nav-link" href="/user/profile">
                                <p>Edit Profile</p>
                            </a>
                        </li>

                    @elseif(Auth::user()->role == 'guide')
                        <li class="nav-item active ">
                            <a class="nav-link" href="/guide/requests">
                                <p>All Requests</p>
                            </a>
                        </li>
                        <li class="nav-item active ">
                            <a class="nav-link" href="/guide/bookings">
                                <p>All Bookings</p>
                            </a>
                        </li>
                        <li class="nav-item active ">
                            <a class="nav-link" href="/guide/feedbacks">
                                <p>All Feedbacks</p>
                            </a>
                        </li>
                        <li class="nav-item active ">
                            <a class="nav-link" href="/guide/profile">
                                <p>Edit Profile</p>
                            </a>
                        </li>

                    @else
                        <li class="nav-item active ">
                            <p>You are not Authorized.</p>
                        </li>

                    @endif

                        <li class="nav-item active-pro">
                            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form1').submit();">
                                <p> {{ __('Logout') }}</p>
                            </a>
                        </li>

                        <form id="logout-form1" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>


                </ul>
            </div>