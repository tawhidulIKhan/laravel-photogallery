
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

<a class="navbar-brand mr-1" href="{{ route('homepage') }}">{{setting('site_title')}}</a>


    <!-- Navbar Search -->
    {{-- <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> --}}

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="{{ route('user.profile') }}">Settings</a>
          {{-- <a class="dropdown-item" href="#">Activity Log</a>
          <div class="dropdown-divider"></div> --}}

          <a class="dropdown-item" href="#" data-toggle="modal" onclick="event.preventDefault();document.querySelector('#logout').submit();" data-target="#logoutModal">Logout</a>
        <form id="logout" action="{{ route('logout') }}" method="POST">
        @csrf
        </form>
        </div>
      </li>
    </ul>

  </nav>    

  {{-- <header class="site-navbar py-3" role="banner">
    
                <div class="container-fluid">
                  <div class="row align-items-center">
                    
                    <div class="col-6 col-xl-2" data-aos="fade-down">
                    <h1 class="mb-0"><a href="{{ route('homepage') }}" class="text-black h2 mb-0">Photon</a></h1>
                    </div>
                    <div class="col-10 col-md-8 d-none d-xl-block" data-aos="fade-down">
                      <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">
          
                        <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                          <li class="active"><a href="{{ route('homepage')}}">Home</a></li>
                          <li class="has-children">
                            <a href="#">Gallery</a>
                            <ul class="dropdown">
                            @if (count($albums) > 0)
                                @foreach ($albums as $album)

                            <li><a href="{{ route('gallery',$album->slug) }}">{{ $album->name }}</a></li>
                                    
                                @endforeach
                            @endif
                            </ul>
                          </li>
                        <li><a href="{{ route('service') }}">Services</a></li>
                          <li><a href="{{ route('about') }}">About</a></li>
                          <li><a href="{{ route('contact') }}">Contact</a></li>
                          @guest
                      <li><a href="{{ route('register') }}">Register</a></li>
                      <li><a href="{{ route('login') }}">Login</a></li>
                              
                          @endguest
                          @auth
                          <li><a href="{{ route('admin') }}">Dashboard</a></li>
                          <li class="has-children">
                              <a href="#">Profile</a>
                              <ul class="dropdown">
                                <li>
                                <a href="{{ route('logout') }}" 
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit()">Logout</a>
                                      
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                      @csrf
                              </form>
      
                                  </li>
                              </ul>
                            </li>
                              
                          @endauth
      
                            
      
                        </ul>
                      </nav>
                    </div>
          
                    <div class="col-6 col-xl-2 text-right" data-aos="fade-down">
                      <div class="d-none d-xl-inline-block">
                        <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                          <li>
                            <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                          </li>
                          <li>
                            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                          </li>
                          <li>
                            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                          </li>
                          <li>
                            <a href="#" class="pl-3 pr-3"><span class="icon-youtube-play"></span></a>
                          </li>
                        </ul>
                      </div>
          
                      <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
          
                    </div>
          
                  </div>
                </div>
                
              </header>
       --}}