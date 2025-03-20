<div>
   
<body class="rbt-header-sticky">
    <div id="my_switcher" class="my_switcher">
        <ul>
            <li>
                <a href="javascript: void(0);" data-theme="light" class="setColor light">
                    <img src="/assets/images/about/sun-01.svg" alt="Sun images"><span title="Light Mode"> Light</span>
                </a>
            </li>
            <li>
                <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                    <img src="/assets/images/about/vector.svg" alt="Vector Images"><span title="Dark Mode"> Dark</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Start Header Area -->
    

   
    <!-- Start Side Vav -->
    <div class="rbt-cart-side-menu">
        <div class="inner-wrapper">
            <div class="inner-top">
                <div class="content">
                    <div class="title">
                        <h4 class="title mb--0">Your shopping cart</h4>
                    </div>
                    <div class="rbt-btn-close" id="btn_sideNavClose">
                        <button class="minicart-close-button rbt-round-btn"><i class="feather-x"></i></button>
                    </div>
                </div>
            </div>
            <nav class="side-nav w-100">
                <ul class="rbt-minicart-wrapper">
                    <li class="minicart-item">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="/assets/images/product/1.jpg" alt="Product Images">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="title"><a href="single-product.html">Miracle Morning</a></h6>

                            <span class="quantity">1 * <span class="price">$22</span></span>
                        </div>
                        <div class="close-btn">
                            <button class="rbt-round-btn"><i class="feather-x"></i></button>
                        </div>
                    </li>

                    <li class="minicart-item">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="/assets/images/product/7.jpg" alt="Product Images">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="title"><a href="single-product.html">Happy Strong</a></h6>

                            <span class="quantity">1 * <span class="price">$30</span></span>
                        </div>
                        <div class="close-btn">
                            <button class="rbt-round-btn"><i class="feather-x"></i></button>
                        </div>
                    </li>

                    <li class="minicart-item">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="/assets/images/product/3.jpg" alt="Product Images">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="title"><a href="single-product.html">Rich Dad Poor Dad</a></h6>

                            <span class="quantity">1 * <span class="price">$50</span></span>
                        </div>
                        <div class="close-btn">
                            <button class="rbt-round-btn"><i class="feather-x"></i></button>
                        </div>
                    </li>

                    <li class="minicart-item">
                        <div class="thumbnail">
                            <a href="#">
                                <img src="/assets/images/product/4.jpg" alt="Product Images">
                            </a>
                        </div>
                        <div class="product-content">
                            <h6 class="title"><a href="single-product.html">Momentum Theorem</a></h6>

                            <span class="quantity">1 * <span class="price">$50</span></span>
                        </div>
                        <div class="close-btn">
                            <button class="rbt-round-btn"><i class="feather-x"></i></button>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="rbt-minicart-footer">
                <hr class="mb--0">
                <div class="rbt-cart-subttotal">
                    <p class="subtotal"><strong>Subtotal:</strong></p>
                    <p class="price">$121</p>
                </div>
                <hr class="mb--0">
                <div class="rbt-minicart-bottom mt--20">
                    <div class="view-cart-btn">
                        <a class="rbt-btn btn-border icon-hover w-100 text-center" href="#">
                            <span class="btn-text">View Cart</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </a>
                    </div>
                    <div class="checkout-btn mt--20">
                        <a class="rbt-btn btn-gradient icon-hover w-100 text-center" href="#">
                            <span class="btn-text">Checkout</span>
                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Side Vav -->
    <a class="close_side_menu" href="javascript:void(0);"></a>


    <div class="rbt-page-banner-wrapper">
        <!-- Start Banner BG Image -->
        <div class="rbt-banner-image"></div>
        <!-- End Banner BG Image -->
        <div class="rbt-banner-content">
    
            <!-- Start Banner Content Top -->
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Start Breadcrumb Area -->
                            <ul class="page-list">
                                <li class="rbt-breadcrumb-item"><a href="{{ route('home') }}">Trang Chủ</a></li>
                                <li>
                                    <div class="icon-right"><i class="feather-chevron-right"></i></div>
                                </li>
                                <li class="rbt-breadcrumb-item active">Tất Cả Khóa Học</li>
                            </ul>
                            <!-- End Breadcrumb Area -->
    
                            <div class="title-wrapper">
                                <h1 class="title mb--0">Tất Cả Khóa Học</h1>
                                <a href="#" class="rbt-badge-2">
                                    <div class="image">🎉</div> {{ $courses->total() }} Khóa Học
                                </a>
                            </div>
    
                            <p class="description">Khám phá các khóa học giúp bạn nâng cao kỹ năng và phát triển sự nghiệp.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top -->
    
            <!-- Start Course Top -->
            <div class="rbt-course-top-wrapper mt--40 mt_sm--20">
                <div class="container">
                    <div class="row g-5 align-items-center">
    
                        <div class="col-lg-5 col-md-12">
                            <div class="rbt-sorting-list d-flex flex-wrap align-items-center">
                                <div class="rbt-short-item switch-layout-container">
                                    <ul class="course-switch-layout">
                                        <li class="course-switch-item">
                                            <button class="rbt-grid-view active" title="Dạng Lưới"><i class="feather-grid"></i> <span class="text">Lưới</span></button>
                                        </li>
                                        <li class="course-switch-item">
                                            <button class="rbt-list-view" title="Dạng Danh Sách"><i class="feather-list"></i> <span class="text">Danh Sách</span></button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="rbt-short-item">
                                    <span class="course-index">Hiển thị {{ $courses->count() }} trên tổng số {{ $courses->total() }} kết quả</span>
                                </div>
                            </div>
                        </div>
    
                        <div class="col-lg-7 col-md-12">
                            <div class="rbt-sorting-list d-flex flex-wrap align-items-center justify-content-start justify-content-lg-end">
                                <div class="rbt-short-item">
                                    <form wire:submit.prevent class="rbt-search-style me-0">
                                        <input type="text" placeholder="Tìm kiếm khóa học..." wire:model.live.debounce.300ms="search">
                                        <button type="submit" class="rbt-search-btn rbt-round-btn">
                                            <i class="feather-search"></i>
                                        </button>
                                    </form>
                                </div>
                                
    
                                <div class="rbt-short-item">
                                    <div class="view-more-btn text-start text-sm-end">
                                        <button class="discover-filter-button discover-filter-activation rbt-btn btn-white btn-md radius-round">Bộ Lọc<i class="feather-filter"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <!-- Start Filter Toggle -->
                    <div class="default-exp-wrapper default-exp-expand">
                        <div class="filter-inner">
                            <div class="filter-select-option">
                                <div class="filter-select rbt-modern-select">
                                    <span class="select-label d-block">Sắp Xếp Theo</span>
                                    <select>
                                        <option>Mặc định</option>
                                        <option>Mới Nhất</option>
                                        <option>Phổ Biến</option>
                                        <option>Xu Hướng</option>
                                        <option>Giá: thấp đến cao</option>
                                        <option>Giá: cao đến thấp</option>
                                    </select>
                                </div>
                            </div>
    
                        
                        </div>
                    </div>
                    <!-- End Filter Toggle -->
                </div>
            </div>
            <!-- End Course Top -->
        </div>
    </div>
    


    <div class="rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="inner">
            <div class="container">
                <div class="rbt-course-grid-column">

                    <!-- Start Single Card  -->
                    @foreach($courses as $course)
<div class="course-grid-3">
    <div class="rbt-card variation-01 rbt-hover">
        <div class="rbt-card-img">
            <a href="{{ route('courses.show', ['slug' => $course->slug]) }}">
                <img style="height: 200px; object-fit: cover;" src="{{ asset('storage/' .  $course->image) }}" alt="{{ $course->course_name }}">
            </a>
        </div>
        <div class="rbt-card-body">
            <div class="rbt-card-top">
                <div class="rbt-review">
                    <div class="rating">
                        @php $rating = 5; @endphp
                        @for ($i = 0; $i < 5; $i++)
                            <i class="fas fa-star {{ $i < $rating ? 'text-warning' : 'text-muted' }}"></i>
                        @endfor
                    </div>
                    <span class="rating-count">({{ $course->feedbacks_count }} Đánh giá)</span>
                </div>
                <div class="rbt-bookmark-btn">
                    <a class="rbt-round-btn" title="Bookmark" href="#"><i class="feather-bookmark"></i></a>
                </div>
            </div>

            <h4 class="rbt-card-title">
                <a href="{{ route('courses.show', ['slug' => $course->slug]) }}">{{ $course->course_name }}</a>
            </h4>

            <ul class="rbt-meta">
                <li><i class="feather-book"></i> {{ $course->materials()->count() }} Bài học</li>
                <li><i class="feather-users"></i> {{ $course->students_count }} Học viên</li>
            </ul>

            <p class="rbt-card-text"> {!! Str::limit(strip_tags($course->short_description), 100, '...') !!}</p>

            <div class="rbt-card-bottom">
                <a class="rbt-btn-link" href="{{ route('courses.show', ['slug' => $course->slug]) }}">
                    Xem chi tiết <i class="feather-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach

                  
                </div>
                <div class="row">
                    <div class="col-lg-12 mt--60">
                        <nav>
                            @if ($courses->hasPages())
                                <ul class="rbt-pagination">
                                    <!-- Nút Previous -->
                                    @if ($courses->onFirstPage())
                                        <li class="disabled"><span aria-hidden="true"><i class="feather-chevron-left"></i></span></li>
                                    @else
                                        <li>
                                            <a href="#" wire:click.prevent="previousPage" aria-label="Previous">
                                                <i class="feather-chevron-left"></i>
                                            </a>
                                        </li>
                                    @endif
                
                                    <!-- Hiển thị số trang -->
                                    @foreach ($courses->links()->elements[0] as $page => $url)
                                        <li class="{{ $page == $courses->currentPage() ? 'active' : '' }}">
                                            <a href="#" wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                                        </li>
                                    @endforeach
                
                                    <!-- Nút Next -->
                                    @if ($courses->hasMorePages())
                                        <li>
                                            <a href="#" wire:click.prevent="nextPage" aria-label="Next">
                                                <i class="feather-chevron-right"></i>
                                            </a>
                                        </li>
                                    @else
                                        <li class="disabled">
                                            <span aria-hidden="true"><i class="feather-chevron-right"></i></span>
                                        </li>
                                    @endif
                                </ul>
                            @endif
                        </nav>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
    <!-- Start Footer aera -->
     
    <!-- End Footer aera -->
    <div class="rbt-progress-parent">
        <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    
</body>
</div>
