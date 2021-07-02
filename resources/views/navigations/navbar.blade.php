{{-- Navbar Top Section --}}

<nav class="navbar navbar-expand-sm navbar-light bg-panelBackColor fixed-top shadow py-0 my-0" style="background-color:{{$profiles->navbar_bg}};" data-color="{{$profiles->navbar_bg}}">

  <div class="d-flex ml-5 brand-logo">
    <img src="{{ asset('images/grahakomindo_logo.png') }}" style="width: 30%; padding-bottom:5px;" alt="ERB" />
    <span class="brand-text ml-2 navbarTitle" style="color:{{$profiles->navbar_text}};" data-color="{{$profiles->navbar_text}}">Administration Panel</span>
  </div>

  <!-- Left Side Menu Button -->
  <button class="sideMenuToggler wbtn-hideMenu" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-delay='{"hide":"100"}' title="Show/Hide Menu" style="color:{{$profiles->navbar_text}};" data-color="{{$profiles->navbar_text}}">
    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-ui-radios-grid" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M3.5 15a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm9-9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm0 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zM16 3.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0zm-9 9a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0zm5.5 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7zm-9-11a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm0 2a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
    </svg>
  </button>

  <div class="collapse navbar-collapse nav-atas" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto navbar-top">

      <!-- Dark Mode Switch -->

      <div class="input-group input-group-sm mb-2 centerly mr-4 pt-2">
        <div class="custom-control custom-switch">
          <input type="checkbox" data-onstyle="info" class="custom-control-input" id="dark_mode" name="dark_mode">
          <label id="DarkModeLabel" class="custom-control-label switch" for="dark_mode" style="color:{{$profiles->navbar_text}};" data-color="{{$profiles->navbar_text}}">Dark Mode</label>
        </div>
      </div>

      <!-- Notifikasi -->
      <li class="nav-item">
        <form method="GET" action="{{ url('notifikasi') }}">
          @csrf
          <button type="submit" class="d-flex wbtn-bellIcon" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-delay='{"hide":"100"}' title="Notifikasi" style="color:{{$profiles->navbar_text}};" data-color="{{$profiles->navbar_text}}">
            <svg class="bi" width="1.5em" height="1.5em" fill="currentColor">
              <use href="{{asset("bootstrap-icons.svg#bell-fill")}}" />
            </svg>
            <div id="jumlah-notif">
              <span class="ml-2">0</span>
              {{-- <span class="badge badge-pill badge-danger ml-1">0</span> --}}
            </div>
          </button>
        </form>
      </li>
      <li class="nav-item">
        <!-- Pesan -->
        <form method="GET" action="{{ url('/message') }}">
          @csrf
          <button type="submit" class="d-flex wbtn-mailIcon" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-delay='{"hide":"100"}' title="Pesan" style="color:{{$profiles->navbar_text}};" data-color="{{$profiles->navbar_text}}">
            <svg class="bi" width="1.5em" height="1.5em" fill="currentColor">
              <use href="{{asset("bootstrap-icons.svg#envelope-fill")}}" />
            </svg>
            <div id="jumlah-pesan">
              <span class="ml-2">0</span>
              {{-- <span class="badge badge-pill badge-warning ml-1">0</span> --}}
            </div>
          </button>
        </form>


      </li>
      <!-- Logout Button di Mobile only -->
      {{-- <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="wbtn-logout" style="display: none">
        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-door-open-fill" fill="red" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2v13h1V2.5a.5.5 0 0 0-.5-.5H11zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
        </svg>
      </button>
      </form> --}}

      <li class="divider mx-3"></li>

      <!-- User Profile -->
      <li class="nav-item dropdown nav-user">
        <a class="nav-link dropdown-toggle p-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{ asset('storage/profile/'.$profiles->profile_img) }}" class="rounded-circle user-icon" />
        </a>
        <div id="userNavbarDetail" class="dropdown-menu dropdown-menu-right fade-up" style="background-color:{{$profiles->navbar_bg}}; color:{{$profiles->navbar_text}};" aria-labelledby="navbarDropdown">
          <!-- dropdown menu for user -->
          <div class="user-menu-widget">
            <div class="user-menu-widget-header">
              <img src="{{ asset('images/user-bg.jpg') }}" class="bg-img-header" />
              <div class="user-menu-widget-header-info">
                <img src="{{ asset('storage/profile/'.$profiles->profile_img) }}" class="rounded-circle user-icon" />
                <div class="user-info-inwidget">
                  <span class="text-white">{{ $profiles->user_name }}</span>
                  <small class="text-white">{{ $profiles->access_name }}</small>
                </div>
                <!-- Edit Profile -->
                <a href="{{route('user_management.edit', [$profiles->user_id, 'dashboard'])}}" class="wbtn-settings shadow" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-delay='{"hide":"100"}' title="Edit Profile">
                  <svg class="bi" width="16" height="16" fill="currentColor">
                    <use href="{{asset("bootstrap-icons.svg#pen-fill")}}" />
                  </svg>
                </a>
                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="wbtn-logout shadow" data-toggle="tooltip" data-placement="bottom" data-trigger="hover" data-delay='{"hide":"100"}' title="Logout">
                    <svg class="bi" width="16" height="16" fill="currentColor">
                      <use href="{{asset("bootstrap-icons.svg#door-open-fill")}}" />
                    </svg>
                  </button>
                </form>
              </div>
            </div>
            <div class="user-menu-widget-body p-4 text-nunito">
              <!-- Personal Information -->
              <p class="text-center">Personal Information</p>

              <div class="row no-gutters my-0">
                <div class="col-sm-4 d-flex justify-content-between">
                  <strong>Tipe User</strong>
                  <strong>:</strong>
                </div>
                <div class="col-sm-8">
                  <p class="pl-2">{{ $profiles->access_name }}</p>
                </div>
              </div>

              <div class="row no-gutters my-0">
                <div class="col-sm-4 d-flex justify-content-between">
                  <strong>ID</strong>
                  <strong>:</strong>
                </div>
                <div class="col-sm-8">
                  <p class="pl-2">{{ $profiles->user_id }}</p>
                </div>
              </div>

              <div class="row no-gutters my-0">
                <div class="col-sm-4 d-flex justify-content-between">
                  <strong>Nama</strong>
                  <strong>:</strong>
                </div>
                <div class="col-sm-8">
                  <p class="pl-2">{{ $profiles->user_name }}</p>
                </div>
              </div>

              <div class="row no-gutters my-0">
                <div class="col-sm-4 d-flex justify-content-between">
                  <strong>No Identitas</strong>
                  <strong>:</strong>
                </div>
                <div class="col-sm-8">
                  <p class="pl-2">{{ $customer->cust_identity_no ?? '-' }}</p>
                </div>
              </div>

              <div class="row no-gutters my-0">
                <div class="col-sm-4 d-flex justify-content-between">
                  <strong>Alamat</strong>
                  <strong>:</strong>
                </div>
                <div class="col-sm-8">
                  <p class="pl-2">{{ $profiles->alamat ?? '-' }}</p>
                </div>
              </div>

              <div class="row no-gutters my-0">
                <div class="col-sm-4 d-flex justify-content-between">
                  <strong>Kota</strong>
                  <strong>:</strong>
                </div>
                <div class="col-sm-8">
                  <p class="pl-2">{{ $profiles->kota ?? '-' }}</p>
                </div>
              </div>

              <div class="row no-gutters my-0">
                <div class="col-sm-4 d-flex justify-content-between">
                  <strong>Kode Pos</strong>
                  <strong>:</strong>
                </div>
                <div class="col-sm-8">
                  <p class="pl-2">{{ $profiles->kodepos ?? '-' }}</p>
                </div>
              </div>

              <div class="row no-gutters my-0">
                <div class="col-sm-4 d-flex justify-content-between">
                  <strong>Mobile No.</strong>
                  <strong>:</strong>
                </div>
                <div class="col-sm-8">
                  <p class="pl-2">{{ $profiles->nohp_code }}{{ $profiles->no_hp ?? '-' }}</p>
                </div>
              </div>

              <div class="row no-gutters my-0">
                <div class="col-sm-4 d-flex justify-content-between">
                  <strong>Telp No.</strong>
                  <strong>:</strong>
                </div>
                <div class="col-sm-8">
                  <p class="pl-2">{{ $customer->telp_rumah ?? '-' }}</p>
                </div>
              </div>

              <div class="row no-gutters my-0">
                <div class="col-sm-4 d-flex justify-content-between">
                  <strong>Email</strong>
                  <strong>:</strong>
                </div>
                <div class="col-sm-8">
                  <p class="pl-2">{{ $profiles->email }}</p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </li>

      <!-- User Info Right Top -->
      <div class="d-flex flex-column ml-3 py-0 userInfo">
        <div class="row no-gutters pt-1">
          <span class="navbarUserName my-0 py-0" style="color:{{$profiles->navbar_text}};" data-color="{{$profiles->navbar_text}}">{{ ucwords($profiles->user_name) }}</span>
        </div>
        <div class="row no-gutters pb-2">
          <small class="navbarUserGroup my-0 py-0" style="color:{{$profiles->navbar_text}};" data-color="{{$profiles->navbar_text}}">{{ $profiles->access_name }}</small>
        </div>
      </div>

      <!-- <li class="divider mx-3"></li> -->


      <!-- Right Side Menu -->
      <!-- <li>
        <button class="wbtn-rightListIcon">
          <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path
              fill-rule="evenodd"
              d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"
            />
          </svg>
        </button>
      </li> -->
      <!-- Close Nav -->
    </ul>
  </div>
</nav>

<script>
  $(function() {
    
    const mainBGColor = localStorage.getItem("mainBGColor");
    const mainTextColor = localStorage.getItem("mainTextColor");
    const navbarBGColor = localStorage.getItem("navbarBGColor");
    const navbarTextColor = localStorage.getItem("navbarTextColor");
    const sidebarBGColor = localStorage.getItem("sidebarBGColor");
    const sidebarTextColor = localStorage.getItem("sidebarTextColor");
    const menuBGColor = localStorage.getItem("menuBGColor");
    const menuTextColor = localStorage.getItem("menuTextColor");
    
    $("#dark_mode").on('click', function(){
      let darkMode = localStorage.getItem("DarkMode");
      if (darkMode === "on") {
        localStorage.setItem("DarkMode", "off");
        $('body, footer').css("background-color",mainBGColor);
        $('.blockquote-footer').css("color",mainTextColor);
        $('.navbar').css("background-color",navbarBGColor);
        $('.navbar')
        .find('button, label, .navbarTitle, .navbarUserName, .navbarUserGroup')
        .css("color",navbarTextColor);
        $('.sideMenu').css("background-color",sidebarBGColor);
        $('.sideMenu').find('.sidebar, a, span').css("color",sidebarTextColor);
        $('.card').css("background-color",menuBGColor);
        $('.card').css("color",menuTextColor);
        $('#userNavbarDetail').css("background-color",navbarBGColor);
        $('#userNavbarDetail').css("color",navbarTextColor);
        $('table').css("color",mainTextColor);

        // Reset ColorInputvalue
        $('#mainBGColorInput').val(mainBGColor);
        $('#mainTextColorInput').val(mainTextColor);
        $('#navbarBGColorInput').val(navbarBGColor);
        $('#navbarTextColorInput').val(navbarTextColor);
        $('#sidebarBGColorInput').val(sidebarBGColor);
        $('#sidebarTextColorInput').val(sidebarTextColor);
        $('#menuBGColorInput').val(menuBGColor);
        $('#menuTextColorInput').val(menuTextColor);
        // Reset ColorChosenBox
        $('#mainBGColorChosen').css('background-color',mainBGColor);
        $('#mainTextColorChosen').css('background-color',mainTextColor);
        $('#navbarBGColorChosen').css('background-color',navbarBGColor);
        $('#navbarTextColorChosen').css('background-color',navbarTextColor);
        $('#sidebarBGColorChosen').css('background-color',sidebarBGColor);
        $('#sidebarTextColorChosen').css('background-color',sidebarTextColor);
        $('#menuBGColorChosen').css('background-color',menuBGColor);
        $('#menuTextColorChosen').css('background-color',menuTextColor);

      } else {
        localStorage.setItem("DarkMode", "on");
        let dark = '#343a40'
        let white = '#ffffff'

        $('body, footer').css("background-color",dark);
        $('.blockquote-footer').css("color",white);
        $('.navbar').css("background-color",dark);
        $('.navbar')
        .find('button, label, .navbarTitle, .navbarUserName, .navbarUserGroup')
        .css("color",white);
        $('.sideMenu').css("background-color",dark);
        $('.sideMenu').find('.sidebar, a, span').css("color",white);
        $('.card').css("background-color",dark);
        $('.card').css("color",white);
        $('#userNavbarDetail').css("background-color",dark);
        $('#userNavbarDetail').css("color",white);
        $('table').css("color",white);

        // Change ColorInputvalue
        $('#mainBGColorInput').val(dark);
        $('#mainTextColorInput').val(white);
        $('#navbarBGColorInput').val(dark);
        $('#navbarTextColorInput').val(white);
        $('#sidebarBGColorInput').val(dark);
        $('#sidebarTextColorInput').val(white);
        $('#menuBGColorInput').val(dark);
        $('#menuTextColorInput').val(white);
        // Change ColorChosenBox
        $('#mainBGColorChosen').css('background-color',dark);
        $('#mainTextColorChosen').css('background-color',white);
        $('#navbarBGColorChosen').css('background-color',dark);
        $('#navbarTextColorChosen').css('background-color',white);
        $('#sidebarBGColorChosen').css('background-color',dark);
        $('#sidebarTextColorChosen').css('background-color',white);
        $('#menuBGColorChosen').css('background-color',dark);
        $('#menuTextColorChosen').css('background-color',white);
      }
    });
  });
</script>