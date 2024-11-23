<div id="header" class="app-header doNotPrint">
    @php
        use Illuminate\Support\Facades\Crypt;
    @endphp
    <div class="desktop-toggler">
        <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-collapsed" data-dismiss-class="app-sidebar-toggled" data-toggle-target=".app">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </div>
    <div class="mobile-toggler">
        <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-mobile-toggled" data-toggle-target=".app">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </div>
    <div class="brand">
        <a href="{{ route('admin.index') }}" class="brand-logo">
            <span class="brand-img">
                <span class="brand-img-text text-theme">DB</span>
            </span>
            <span class="brand-text">CDMS</span>
        </a>
    </div>
    <div class="menu print_media">

      @if(Auth::user() != NULL)
          <x-notification/>
      @endif

      <div class="menu-item dropdown dropdown-mobile-full doNotPrint">

          <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link doNotPrint">
              <div class="menu-img online">
                  {{-- <img src="{{ asset('storage/users/' . Auth::user()->image) }}" alt="Profile" height="60"> --}}
                  <img src="{{ asset('storage/users/' . Auth::user()->userInfo->image) }}" alt="Photo" style="max-width: 80px;">
              </div>
              <div class="menu-text d-sm-block d-none w-170px">
                  <span class="__cf_email__">{{ Auth::user()->name_en }}</span>
              </div>
          </a>
          
          <div class="dropdown-menu dropdown-menu-end me-lg-3 fs-11px mt-1">
              <a class="dropdown-item d-flex align-items-center doNotPrint"
                  href="{{ route('admin.user.editProfile', Crypt::encryptString(Auth::user()->id)) }}">
                  PROFILE <i class="bi bi-person-circle ms-auto text-theme fs-16px my-n1"></i>
              </a>
              <div class="dropdown-divider"></div>

              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT
                  <i class="bi bi-toggle-off ms-auto text-theme fs-16px my-n1"></i>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>

              </a>

          </div>
      </div>
    </div>
</div>
