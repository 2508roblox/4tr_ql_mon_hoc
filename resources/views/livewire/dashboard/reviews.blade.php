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
                                <!-- Start Enrole Course  -->
                                <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
                                    <div class="content">
                                        <div class="section-title">
                                            <h4 class="rbt-title-style-3">Đánh giá môn học</h4>
                                        </div>
    
                                        <div class="rbt-dashboard-table table-responsive mobile-table-750">
                                            <table class="rbt-table table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th>Môn học</th>
                                                        <th>Đánh giá</th>
                                                        <th>Mức độ hiểu bài</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($reviews as $review)
                                                    <tr>
                                                        <th>
                                                            <span class="b3"><a href="#">{{ $review->course->course_name }}</a></span>
                                                        </th>
                                                        <td>
                                                            <div class="rbt-review">
                                                                <div class="rating">
                                                                    @for($i = 1; $i <= 5; $i++)
                                                                        @if($i <= $review->rating)
                                                                            <i class="fas fa-star"></i>
                                                                        @else
                                                                            <i style="color: #ccc;" class="fas fa-star"></i>
                                                                        @endif
                                                                    @endfor
                                                                </div>
                                                                <span class="rating-count"> ({{ $review->created_at ? $review->created_at->format('d/m/Y') : '' }})</span>
                                                            </div>
                                                            <p class="b2">{{ $review->comment }}</p>
                                                        </td>
                                                        <td>
                                                            @if($review->understand)
                                                                <span class="badge bg-success">Đã hiểu bài</span>
                                                            @else
                                                                <span class="badge bg-warning">Chưa hiểu bài</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Enrole Course  -->
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
