<div>
    <div>
        <div class="rbt-default-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
            <div class="inner">
                <div class="content-item-content">
                    <div class="rbt-default-sidebar-wrapper">
                        <div class="section-title mb--20">
                            <h6 class="rbt-title-style-2">Xin chào, {{ $student->full_name }}</h6>
                        </div>
                        <nav class="mainmenu-nav">
                            <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                                <li>
                                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                        <i class="feather-home"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboard.profile') }}" class="{{ request()->routeIs('dashboard.profile') ? 'active' : '' }}">
                                        <i class="feather-user"></i>
                                        <span>Thông tin cá nhân</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboard.enrolled-courses') }}" class="{{ request()->routeIs('dashboard.enrolled-courses') ? 'active' : '' }}">
                                        <i class="feather-book-open"></i>
                                        <span>Khóa học của tôi</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboard.learning-history') }}" class="{{ request()->routeIs('dashboard.learning-history') ? 'active' : '' }}">
                                        <i class="feather-bookmark"></i>
                                        <span>Lịch sử học tập</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboard.attendance') }}" class="{{ request()->routeIs('dashboard.attendance') ? 'active' : '' }}">
                                        <i class="feather-check-circle"></i>
                                        <span>Điểm danh</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('dashboard.reviews') }}" class="{{ request()->routeIs('dashboard.reviews') ? 'active' : '' }}">
                                        <i class="feather-star"></i>
                                        <span>Đánh giá môn học</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
    
                        <div class="section-title mt--40 mb--20">
                            <h6 class="rbt-title-style-2">Tài khoản</h6>
                        </div>
    
                        <nav class="mainmenu-nav">
                            <ul class="dashboard-mainmenu rbt-default-sidebar-list">
                                <li>
                                    <a href="{{ route('dashboard.settings') }}" class="{{ request()->routeIs('dashboard.settings') ? 'active' : '' }}">
                                        <i class="feather-settings"></i>
                                        <span>Cài đặt</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" wire:click.prevent="logout">
                                        <i class="feather-log-out"></i>
                                        <span>Đăng xuất</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <style>
 
    </style> 
</div>