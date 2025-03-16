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
    
        <!-- Start breadcrumb Area -->
        <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-inner text-center">
                            <h2 class="title">Đăng nhập & Đăng ký</h2>
                            <ul class="page-list">
                                <li class="rbt-breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                                <li>
                                    <div class="icon-right"><i class="feather-chevron-right"></i></div>
                                </li>
                                <li class="rbt-breadcrumb-item active">Đăng nhập & Đăng ký</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- End Breadcrumb Area -->
    
        <div class="rbt-elements-area bg-color-white rbt-section-gap">
            <div class="container">
                <div class="row gy-5 row--30">
    
                    <div class="col-lg-6">
                        <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                            <h3 class="title">Đăng nhập</h3>
                            <form wire:submit.prevent="login">
                                <div class="form-group">
                                    <input type="email" wire:model="login_email" placeholder="Email *">
                                    <span class="focus-border"></span>
                                </div>
                                <div class="form-group">
                                    <input type="password" wire:model="login_password" placeholder="Mật khẩu *">
                                    <span class="focus-border"></span>
                                </div>
                    
                                <div class="row mb--30">
                                    <div class="col-lg-6">
                                        <div class="rbt-checkbox">
                                            <input type="checkbox" id="rememberme" wire:model="remember_me">
                                            <label for="rememberme">Ghi nhớ đăng nhập</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-end">
                                        <a class="rbt-btn-link" href="#">Quên mật khẩu?</a>
                                    </div>
                                </div>
                    
                                <div class="form-submit-group">
                                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">
                                                <span wire:loading.remove wire:target="login">Đăng nhập</span>
                                                <span wire:loading wire:target="login">Đang xử lý...</span>
                                            </span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </button>
                                </div>
                            </form>
                    
                            @if(session()->has('message'))
                                <div class="alert alert-success mt-3">{{ session('message') }}</div>
                            @endif
                    
                            @if(session()->has('error'))
                                <div class="alert alert-danger mt-3">{{ session('error') }}</div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-lg-6">
                        <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                            <h3 class="title">Đăng Ký</h3>
                            @if(session()->has('message'))
                            <div class="text-success mt-3">{{ session('message') }}</div>
                        @endif
                            <form wire:submit.prevent="register" class="max-width-auto">
                                <div class="form-group">
                                    <input type="email" wire:model="email" placeholder="Địa chỉ Email *">
                                    <span class="focus-border"></span>
                                    @error('email') <span class="text-danger">Email không hợp lệ hoặc đã được sử dụng.</span> @enderror
                                </div>
                        
                                <div class="form-group">
                                    <input type="text" wire:model="full_name" placeholder="Họ và Tên *">
                                    <span class="focus-border"></span>
                                    @error('full_name') <span class="text-danger">Họ và tên không được để trống.</span> @enderror
                                </div>
                        
                                <div class="form-group">
                                    <input type="text" wire:model="student_id" placeholder="Mã Sinh Viên *">
                                    <span class="focus-border"></span>
                                    @error('student_id') <span class="text-danger">Mã sinh viên đã tồn tại.</span> @enderror
                                </div>
                        
                                <div class="form-group">
                                    <input type="password" wire:model="password" placeholder="Mật khẩu *">
                                    <span class="focus-border"></span>
                                    @error('password') <span class="text-danger">Mật khẩu tối thiểu 8 ký tự.</span> @enderror
                                </div>
                        
                                <div class="form-group">
                                    <input type="password" wire:model="password_confirmation" placeholder="Xác nhận mật khẩu *">
                                    <span class="focus-border"></span>
                                </div>
                                <div class="form-submit-group">
                                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100" wire:loading.attr="disabled">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">
                                                <span wire:loading.remove wire:target="register">Đăng Ký</span>
                                                <span wire:loading wire:target="register" id="IsregisterLoading">Đang xử lý...</span>
                                            </span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </button>
                                </div>
                                
                            </form>
                        
                        
                        </div>
                        
                    </div>
                    
    
                </div>
            </div>
        </div>
    
    
    
    
    
        <!-- Start Footer aera -->
       
        <!-- End Footer aera -->
        <div class="rbt-separator-mid">
            <div class="container">
                <hr class="rbt-separator m-0">
            </div>
        </div>
        <!-- Start Copyright Area  -->
       
        <!-- End Copyright Area  -->
        <div class="rbt-progress-parent">
            <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
    
      
    </body>
</div>
