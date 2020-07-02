<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                    </span>
                    <span class="logo-lg">
                        <h3 style="color: white;">Papiu</h3>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light"
                    data-toggle="collapse" data-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">

            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                     aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..."
                                       aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="" src="{{ asset('assets/images/flags/' . App::getLocale() .'.jpg') }}"
                         alt="Header Language"
                         height="16">
                </button>
                <div class="dropdown-menu dropdown-menu-right">

                    @foreach(['en', 'vi'] as $locale)
                        @if(!App::isLocale($locale))
                            <a href="{{ url('locale/switch/' . $locale) }}" class="dropdown-item notify-item">
                                <img src="{{ asset('assets/images/flags/' . $locale . '.jpg') }}" alt="user-image"
                                     class="mr-1"
                                     height="12">
                                <span class="align-middle">{{ ucfirst($locale) }}</span>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="dropdown d-inline-block">
                @auth
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user"
                             src="{{ asset('assets/images/users/avatar.jpeg') }}"
                             alt="Header Avatar">
                        <span class="d-none d-xl-inline-block ml-1">{{ auth()->user()->name }}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item text-danger" href="javascript:void();"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> {{ __('labels.logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endauth
                @guest
                    <a href="{{route('login')}}">
                        <button class="btn header-item waves-effect btn-rounded btn-info">Login</button>
                    </a>
                @endguest
            </div>

        </div>
    </div>
</header>
