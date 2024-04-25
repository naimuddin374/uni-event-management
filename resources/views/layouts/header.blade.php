<!-- header-start -->
<header>
  <div class="header-area ">
    <div class="header-top_area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div
              class="header_top_wrap d-flex justify-content-between align-items-center">
              <div class="text_wrap">
                <p>
                  <!-- <span>+880155 253 232</span> -->
                  <span>fiucec.club@gmail.com</span>
                </p>
              </div>
              <div class="text_wrap">
                <p>
                  @if(Auth::check())
                  <a href="{{ url('logout') }}"><i class="ti-user"></i>
                    Logout</a>
                  @else
                  <a href="{{ url('/login') }}"> <i class="ti-user"></i>
                    Login</a>
                  @endif
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="sticky-header" class="main-header-area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div
              class="header_wrap d-flex justify-content-between align-items-center">
              <div class="header_left">
                <div class="logo">
                  <a href="{{ url('/') }}">
                    <img src="{{ asset('img/cec.jpg') }}" alt="" width="100">
                  </a>
                </div>
              </div>
              <div class="header_right d-flex align-items-center">
                <div class="main-menu  d-none d-lg-block">
                  <nav>
                    <ul id="navigation">
                      <li><a href="{{ url('/') }}">home</a></li>
                      <li><a href="{{ url('/events') }}">Events</a></li>
                      <li><a href="{{ url('/about') }}">About</a></li>
                      <li><a href="{{ url('/mission') }}">mission</a></li>
                      <li><a href="{{ url('/vision') }}">Vision</a></li>
                      <li><a href="{{ url('/contact') }}">Contact</a></li>
                      @if(Auth::check())
                      <li><a href="{{ url('/admin/events') }}">Manage Event</a>
                      </li>
                      <li><a href="{{ url('/admin/slides') }}">Manage Slider</a>
                      </li>
                      @endif
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="mobile_menu d-block d-lg-none"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- header-end -->