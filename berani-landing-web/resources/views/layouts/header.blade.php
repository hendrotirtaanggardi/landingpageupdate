<div id="kt_header" class="header align-items-stretch">
    <div class="container-fluid d-flex align-items-stretch justify-content-between">

        <!--begin::Aside mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
        </div>
        <!--end::Aside mobile toggle-->

        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
        </div>
        <!--end::Mobile logo-->

        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-center" id="kt_header_nav">
                <!--begin::Page title-->
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_header_nav'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <a href="{{ route('/') }}">
                        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
                            {{ __('Berani Digital Talent Platform') }}
                        </h1>
                    </a>
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Navbar-->

            <!--begin::Topbar-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <div class="d-flex align-items-stretch flex-shrink-0">

                    <!--begin::User-->
                    @guest
                    <div class="d-flex align-items-center ms-1 ms-lg-3">
                        <a href="{{ route('register') }}" class="btn btn-sm btn-primary me-5">
                            Become Talent
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-sm btn-light">
                            Login
                        </a>
                    </div>
                    @endguest
                    @auth
                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
                            data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                            @if (auth()->user()->avatar)
                            <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}">
                            @else
                            <div class="symbol-label fs-2 fw-bold text-success">
                                {{ auth()->user()->name[0] }}
                            </div>
                            @endif
                        </div>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                            data-kt-menu="true">
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <div class="symbol symbol-50px me-5">
                                        @if (auth()->user()->avatar)
                                        <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}">
                                        @else
                                        <div class="symbol-label fs-2 fw-bold text-success">
                                            {{ auth()->user()->name[0] }}
                                        </div>
                                        @endif
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div href="#" class="fw-bolder d-flex align-items-center fs-5">
                                            {{ auth()->user()->name }}
                                        </div>
                                        <div class="fw-bolder d-flex align-items-center fs-5">
                                            <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1">
                                                @php
                                                $role =
                                                App\Models\User::find(auth()->user()->id)->roles->first()->name;
                                                @endphp
                                                {{ Str::title($role)}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="separator my-2"></div>
                            <div class="menu-item px-5">
                                <a href="{{ $role == 'recruiter' ? route('recruiter') : route('talent') }}"
                                    class="menu-link px-5">{{ $role == 'recruiter' ? "Recruiter Page" : "Talent Page"
                                    }}</a>
                            </div>
                            <div class="separator my-2"></div>
                            <div class="menu-item px-5">
                                <a href="" class="menu-link px-5" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_1">Logout</a>
                            </div>
                        </div>
                    </div>
                    @endauth
                    <!--end::User -->

                </div>
            </div>
            <!--end::Topbar-->
        </div>
    </div>
</div>