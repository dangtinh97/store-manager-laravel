<style>
    .navbar-vertical.navbar-expand-xs .navbar-collapse{
        height: calc(100vh - 250px);
    }
    .dark-version .sidenav.bg-white {
        background-image: linear-gradient(
            195deg, #323a54, #1a2035)!important;
    }
    .dark-version .sidenav{
        background: #1f283e !important;
    }
    #manager-nav-sell{
        display: none;
    }
    #manager-nav-sell.toggle{
        display: block;
    }
    .dark-version .sidenav.bg-white .collapse .nav-item h6, .dark-version .sidenav.bg-white .collapse .nav-item .h6{
        color: white!important;
    }
</style>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
            <img src="{{asset('assets/img/logo-ct.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Monstar lab</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('dashboard')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            @can('SUPPER_ADMIN|MANAGER')
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Admin</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('admins.index')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">groups</i>
                    </div>
                    <span class="nav-link-text ms-1">Danh s??ch t??i kho???n</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('admins.create')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person_add_alt</i>
                    </div>
                    <span class="nav-link-text ms-1">T???o t??i kho???n</span>
                </a>
            </li>
            @endcan

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Qu???n l?? d??? ??n</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('projects.index')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">hub</i>
                    </div>
                    <span class="nav-link-text ms-1">Danh s??ch d??? ??n</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('projects.create')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">hub</i>
                    </div>
                    <span class="nav-link-text ms-1">T???o d??? ??n</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Qu???n l?? kh??ch h??ng</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('users.index')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">people</i>
                    </div>
                    <span class="nav-link-text ms-1">Danh s??ch kh??ch h??ng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('users.create')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person_add_alt</i>
                    </div>
                    <span class="nav-link-text ms-1">T???o kh??ch h??ng</span>
                </a>
            </li>

            <li class="nav-item mt-3 cursor-pointer" onclick="addMenu();">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Qu???n l?? ho???t ?????ng b??n h??ng
                    <span class="material-icons" id="drop-button">
arrow_drop_down
</span>
                </h6>
            </li>
            <ul class="navbar-nav ms-3" id="manager-nav-sell">
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Qu???n l?? h???p ?????ng</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('contracts.index')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">description</i>
                    </div>
                    <span class="nav-link-text ms-1">Danh s??ch h???p ?????ng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('contracts.create')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">add</i>
                    </div>
                    <span class="nav-link-text ms-1">T???o h???p ?????ng</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Qu???n l?? phi???u xu???t h??ng</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('delivery-notes.index')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">description</i>
                    </div>
                    <span class="nav-link-text ms-1">DS phi???u xu???t h??ng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('delivery-notes.create')}}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">add</i>
                    </div>
                    <span class="nav-link-text ms-1">T???o phi???u xu???t h??ng</span>
                </a>
            </li>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Qu???n l?? ho?? ????n</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="{{route('histories-bill.index')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">description</i>
                        </div>
                        <span class="nav-link-text ms-1">Danh s??ch ho?? ????n</span>
                    </a>
                </li>
            </ul>

        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
        </div>
    </div>
</aside>
