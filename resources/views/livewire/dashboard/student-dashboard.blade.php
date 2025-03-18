<div>
    <body>
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
            <!-- Start Banner BG Image  -->
            <div class="rbt-banner-image"></div>
            <!-- End Banner BG Image  -->
        </div>
        <!-- Start Card Style -->
        <div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Start Dashboard Top  -->
                        <livewire:dashboard.student-info />
                        <!-- End Dashboard Top  -->
    
                        <div class="row g-5">
                            <div class="col-lg-3">
                                <livewire:dashboard.student-sidebar />
                            </div>
    
                            <div class="col-lg-9">
                                <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
                                    <div class="content">
                                        <div class="section-title">
                                            <h4 class="rbt-title-style-3">Dashboard</h4>
                                        </div>
                                        <div class="row g-5">
    
                                            <!-- Start Single Card  -->
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-primary-opacity">
                                                    <div class="inner">
                                                        <div class="rbt-round-icon bg-primary-opacity">
                                                            <i class="feather-book-open"></i>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="counter without-icon color-primary">
                                                                <span class="odometer">{{ $totalCourses }}</span>
                                                            </h3>
                                                            <span class="rbt-title-style-2 d-block">Khóa học đã tham gia</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Card  -->
    
                                            <!-- Start Single Card  -->
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-secondary-opacity">
                                                    <div class="inner">
                                                        <div class="rbt-round-icon bg-secondary-opacity">
                                                            <i class="feather-monitor"></i>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="counter without-icon color-secondary">
                                                                <span class="odometer">{{ $totalLessons }}</span>
                                                            </h3>
                                                            <span class="rbt-title-style-2 d-block">Bài học đã hoàn thành</span>
                                                        </div>
                                                    </div>
                                                </div>
    
                                            </div>
                                            <!-- End Single Card  -->
    
                                            <!-- Start Single Card  -->
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                                <div class="rbt-counterup variation-01 rbt-hover-03 rbt-border-dashed bg-violet-opacity">
                                                    <div class="inner">
                                                        <div class="rbt-round-icon bg-violet-opacity">
                                                            <i class="feather-award"></i>
                                                        </div>
                                                        <div class="content">
                                                            <h3 class="counter without-icon color-violet">
                                                                <span class="odometer">{{ $totalAttendance }}</span>
                                                            </h3>
                                                            <span class="rbt-title-style-2 d-block">Lần điểm danh</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Card  -->
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card Style -->
        <div class="rbt-separator-mid">
            <div class="container">
                <hr class="rbt-separator m-0">
            </div>
        </div>
       
        <!-- End Footer aera -->
        <div class="rbt-progress-parent">
            <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
    
  
    </body>
</div>
