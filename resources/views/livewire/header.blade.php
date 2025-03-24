<div>
    <header class="rbt-header rbt-header-default">
        <div class="rbt-sticky-placeholder"></div>
        

        <div class="rbt-header-wrapper shadow-none">
            <div class="container">
                <div class="mainbar-row rbt-navigation-center align-items-center">
                    <div class="header-left">
                        <div class="logo logo-dark">
                            <a href="{{ route('home') }}">
                                <img src="/assets/Removal-474.png" alt="Logo Giáo Dục">
                            </a>
                        </div>
        
                        <div class="logo d-none logo-light">
                            <a href="{{ route('home') }}">
                                <img src="/assets/Removal-474.png" alt="Logo Giáo Dục">
                            </a>
                        </div>
                    </div>
        
                    <div class="rbt-main-navigation d-none d-xl-block">
                        <nav class="mainmenu-nav">
                            <ul class="mainmenu">
                                <li class="with-megamenu position-static">
                                    <a href="{{ route('home') }}">Trang Chủ</a>
                                </li>
        
                                <li class="with-megamenu">
                                    <a href="{{ route('courses.index') }}">Môn học</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
        
                    <div class="header-right">
                        <!-- Navbar Icons -->
                        <ul class="quick-access">
                            <li class="access-icon">
                                <a class="search-trigger-active rbt-round-btn" href="#">
                                    <i class="feather-search"></i>
                                </a>
                            </li>
                        </ul>
        
                        @if ($student)
                <li style="border-left: 1px solid gray;padding-left:1rem;" class="account-access rbt-user-wrapper d-none d-xl-block">
                    <a href="#"><i class="feather-user"></i>Xin chào, {{ $student->full_name }}</a>
                    <div class="rbt-user-menu-list-wrapper">
                        <div class="inner">
                            <div class="rbt-admin-profile">
                                <div class="admin-thumbnail">
                                    <img src="{{ asset('assets/2afdbc3aab8c8b066d95f812f91df33e.jpg') }}" alt="User Image">
                                </div>
                                <div class="admin-info">
                                    <span class="name">{{ $student->full_name }}</span>
                                    <a class="rbt-btn-link color-primary" href="{{ route('dashboard.profile') }}">Xem hồ sơ</a>
                                </div>
                            </div>
                            <ul class="user-list-wrapper">
                                <li><a href="{{ route('dashboard') }}"><i class="feather-home"></i><span>Bảng điều khiển</span></a></li>
                                <li><a href="{{ route('dashboard.enrolled-courses') }}"><i class="feather-shopping-bag"></i><span>Khóa học đã đăng ký</span></a></li>
                                <li><a href="{{ route('dashboard.reviews') }}"><i class="feather-star"></i><span>Đánh giá</span></a></li>
                                <li><a href="{{ route('dashboard.settings') }}"><i class="feather-settings"></i><span>Cài đặt</span></a></li>
                                <li>
                                    <a href="#" wire:click.prevent="logout">
                                        <i class="feather-log-out"></i>
                                        <span>Đăng xuất</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            @else
                <div class="rbt-btn-wrapper mb--20">
                    <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center" href="{{ route('auth') }}">
                        <span>Đăng Ký Ngay</span>
                    </a>
                </div>
            @endif
        
                        <!-- Start Mobile-Menu-Bar -->
                        <div class="mobile-menu-bar ml--5 d-block d-xl-none">
                            <div class="hamberger">
                                <button class="hamberger-button">
                                    <i class="feather-menu"></i>
                                </button>
                            </div>
                        </div>
                        <!-- Start Mobile-Menu-Bar -->
                    </div>
                </div>
            </div>
        
            <!-- Start Search Dropdown  -->
            <div class="rbt-search-dropdown">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <livewire:search />
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Dropdown  -->
        </div>
        

    </header>

       <!-- Mobile Menu Section -->
       <div class="popup-mobile-menu">
        <div class="inner-wrapper">
            <div class="inner-top">
                <div class="content">
                    <div class="logo">
                        <div class="logo logo-dark">
                            <a href="index.html">
                                <img src="/assets/giang-removebg-preview.png" alt="Logo Quản Lý Môn Học">
                            </a>
                        </div>
            
                        <div class="logo d-none logo-light">
                            <a href="index.html">
                                <img src="/assets/giang-removebg-preview.png" alt="Logo Quản Lý Môn Học">
                            </a>
                        </div>
                    </div>
                    <div class="rbt-btn-close">
                        <button class="close-button rbt-round-btn"><i class="feather-x"></i></button>
                    </div>
                </div>
                <p class="description">Hệ thống quản lý môn học giúp bạn theo dõi, đăng ký và quản lý các môn học một cách dễ dàng.</p>
                <ul class="navbar-top-left rbt-information-list justify-content-start">
                    <li>
                        <a href="mailto:contact@qlmonhoc.com"><i class="feather-mail"></i>contact@qlmonhoc.com</a>
                    </li>
                    <li>
                        <a href="#"><i class="feather-phone"></i>(+84) 123-456-789</a>
                    </li>
                </ul>
            </div>
            

            <nav class="mainmenu-nav">
                <ul class="mainmenu">
                    <li class=" position-static">
                        <a href="{{ route('home') }}">Trang Chủ</a>
                    </li>
                    
                    <li class="">
                        <a href="{{ route('courses.index') }}">Môn học</a>
                    </li>
                    
                </ul>
            </nav>
            
            <div class="mobile-menu-bottom">
                <div class="rbt-btn-wrapper mb--20">
                    <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center" href="#">
                        <span>Đăng Ký Ngay</span>
                    </a>
                </div>
            
                <div class="social-share-wrapper">
                    <span class="rbt-short-title d-block">Kết Nối Với Chúng Tôi</span>
                    <ul class="social-icon social-default transparent-with-border justify-content-start mt--20">
                        <li><a href="https://www.facebook.com/">
                                <i class="feather-facebook"></i>
                            </a>
                        </li>
                        <li><a href="https://twitter.com">
                                <i class="feather-twitter"></i>
                            </a>
                        </li>
                        <li><a href="https://www.instagram.com/">
                                <i class="feather-instagram"></i>
                            </a>
                        </li>
                        <li><a href="https://www.linkedin.com/">
                                <i class="feather-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</div>
