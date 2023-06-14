{{-- Main Nav Bar --}}
<main class="main-content mt-1 border-radius-lg">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder mb-0 text-capitalize">
                    {{ str_replace('-', ' ', Route::currentRouteName()) }}</h6>
            </nav>
            <div class="mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
                <div class="nav-item d-flex align-self-end">
                    <a href="{{ route('createShipment') }}" target="_self"
                        class="btn btn-secondary active mb-0 text-white" role="button" aria-pressed="true">
                        Add New
                    </a>
                </div>

                <div class="ms-md-3 pe-md-3 d-flex align-items-center">
                    <div class="nav-item d-flex align-self-end">
                        <a href="{{ route('track') }}" target="_blank"
                            class="btn btn-primary active mb-0 text-white" role="button" aria-pressed="true">
                            Track
                        </a>
                    </div>
                </div>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                            <livewire:auth.logout />
                        </a>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>