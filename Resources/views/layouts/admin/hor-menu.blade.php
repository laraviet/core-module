<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link arrow-none" href="{{ route('admin.home') }}" aria-expanded="false">
                            <i class="bx bx-home-circle mr-2"></i>{{ __('labels.home') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link arrow-none" href="#" aria-expanded="false">
                            <i class="bx bxl-product-hunt mr-2"></i>{{ __('labels.product') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link arrow-none" href="{{ route('services.index') }}" aria-expanded="false">
                            <i class="bx bxs-store mr-2"></i>{{ __('labels.service') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link arrow-none" href="#" aria-expanded="false">
                            <i class="bx bx-calendar mr-2"></i>{{ __('labels.booking') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link arrow-none" href="#" aria-expanded="false">
                            <i class="bx bx-dollar mr-2"></i>{{ __('labels.payment') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link arrow-none" href="{{ route('feedbacks.index') }}" aria-expanded="false">
                            <i class="bx bx-message mr-2"></i>{{ __('labels.feedback') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link arrow-none" href="#" aria-expanded="false">
                            <i class="bx bx-list-check mr-2"></i>{{ __('labels.policy') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link arrow-none" href="#" aria-expanded="false">
                            <i class="bx bxs-report mr-2"></i>{{ __('labels.report') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link arrow-none" href="{{ route('users.index') }}" aria-expanded="false">
                            <i class="bx bxs-user mr-2"></i>{{ __('labels.user') }}
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
    </div>
</div>
