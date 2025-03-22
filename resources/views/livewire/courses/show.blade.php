<div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $course->course_name }} - Hệ Thống Quản Lý Môn Học MKT</title>
        <meta name="description" content="{{ Str::limit(strip_tags($course->short_description), 160) }} - Khám phá chi tiết môn học {{ $course->course_name }} tại MKT">
        <meta name="keywords" content="{{ $course->course_name }}, môn học mkt, học online, {{ $course->creator->name }}, quản lý môn học">
        <meta name="author" content="MKT Subject Management">
        <meta property="og:title" content="{{ $course->course_name }} - Hệ Thống Quản Lý Môn Học MKT">
        <meta property="og:description" content="{{ Str::limit(strip_tags($course->short_description), 160) }} - Khám phá chi tiết môn học {{ $course->course_name }} tại MKT">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ asset('storage/' . $course->image) }}">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{ url()->current() }}" />
    </head>
    <div>
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
            
                <!-- Start breadcrumb Area -->
                <div class="rbt-breadcrumb-default rbt-breadcrumb-style-3">
                    <div class="breadcrumb-inner breadcrumb-dark">
                        <img src="/assets/images/bg/bg-image-10.jpg" alt="Education Images">
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="content text-start">
                                    <ul class="page-list">
                                        <li class="rbt-breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                                        <li>
                                            <div class="icon-right"><i class="feather-chevron-right"></i></div>
                                        </li>
                                        <li class="rbt-breadcrumb-item active">{{ $course->category->name ?? 'Môn học' }}</li>
                                    </ul>
                                    <h2 class="title">{{ $course->course_name }}</h2>
                                    <p class="description">{!! $course->short_description !!}</p>
                    
                                    <div class="d-flex align-items-center mb--20 flex-wrap rbt-course-details-feature">
                    
                                        <div class="feature-sin best-seller-badge">
                                            @if($course->is_best_seller)
                                                <span class="rbt-badge-2">
                                                    <span class="image">
                                                        <img src="/assets/images/icons/card-icon-1.png" alt="Best Seller Icon">
                                                    </span> Bestseller
                                                </span>
                                            @endif
                                        </div>
                    
                                        <div class="feature-sin rating">
                                            <a href="#">{{ number_format($averageRating, 1) }}</a>
                                            @for ($i = 0; $i < 5; $i++)
                                                <a href="#"><i class="fa fa-star {{ $i < $averageRating ? 'active' : '' }}"></i></a>
                                            @endfor
                                        </div>
                    
                                        <div class="feature-sin total-rating">
                                            <a class="rbt-badge-4" href="#">{{ $course->feedbacks->count() }} Đánh giá</a>
                                        </div>
                    
                                        <div class="feature-sin total-student">
                                            <span>{{ $course->students->count() }} Học sinh</span>
                                        </div>
                    
                                    </div>
                    
                                    <div class="rbt-author-meta mb--20">
                                        
                                        <div class="rbt-author-info">
                                            khóa học được tạo bởi <a href="#">{{ $course->creator->name }}</a> </a>
                                        </div>
                                    </div>
                    
                                    <ul class="rbt-meta">
                                        <li><i class="feather-calendar"></i>Cập nhật lần cuối {{ $course->updated_at->format('m/Y') }}</li>
                                    </ul>
                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- End Breadcrumb Area -->
            
                <div class="rbt-course-details-area ptb--60">
                    <div class="container">
                        <div class="row g-5">
            
                            <div class="col-lg-8">
                                <div class="course-details-content">
                                    <div class="rbt-course-feature-box rbt-shadow-box thuumbnail">
                                        <img class="w-100" src="{{ asset('storage/'.$course->image) }}" alt="{{ $course->course_name }}">
                                    </div>
                                    
            
                                    <div class="rbt-inner-onepage-navigation sticky-top mt--30">
                                        <nav class="mainmenu-nav onepagenav">
                                            <ul class="mainmenu">
                                                <li class="current">
                                                    <a href="#overview">Tổng quan</a>
                                                </li>
                                                <li>
                                                    <a href="#coursecontent">Nội dung khóa học</a>
                                                </li>
                                                <li>
                                                    <a href="#details">Bảng điểm</a>
                                                </li>
                                                <li>
                                                    <a href="#review">Đánh giá</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    
            
                                    <!-- Start Course Feature Box  -->
                                    <div class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30 has-show-more" id="overview">
                                        <div class="rbt-course-feature-inner has-show-more-inner-content">
                                            {!!$course->description!!}
                                        </div>
                                        <div class="rbt-show-more-btn">Xem thêm</div>
                                    </div>
                                    <!-- End Course Feature Box  -->
            
                                    <!-- Start Course Content  -->
                                    <div class="course-content rbt-shadow-box coursecontent-wrapper mt--30" id="coursecontent">
                                        <div class="rbt-course-feature-inner">
                                            <div class="section-title">
                                                <h4 class="rbt-title-style-3">Nội Dung Môn Học</h4>
                                            </div>
                                            <div class="rbt-accordion-style rbt-accordion-02 accordion">
                                                <div class="accordion" id="accordionExampleb2">
                                                    @foreach($lessons->sortBy('created_at') as $lesson)
                                                    <div class="accordion-item card">
                                                        <h2 class="accordion-header card-header" id="heading{{ $lesson->id }}">
                                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $lesson->id }}" aria-expanded="true" aria-controls="collapse{{ $lesson->id }}">
                                                                {{ $lesson->title }} 
                                                            </button>
                                                        </h2>
                                                        <div id="collapse{{ $lesson->id }}" class="accordion-collapse collapse show" aria-labelledby="heading{{ $lesson->id }}" data-bs-parent="#accordionExampleb2">
                                                            <div class="accordion-body card-body pr--0">
                                                                <ul class="rbt-course-main-content liststyle">
                                                                    @foreach($lesson->lessonResources as $resource)
                                                                    <li>
                                                                        @if($isEnrolled && $enrollmentStatus == 1)
                                                                            <a href="{{ route('lessons.show', ['lesson' => $lesson->id]) }}">
                                                                                <div class="course-content-left">
                                                                                    @php
                                                                                    $extension = pathinfo($resource->file_path, PATHINFO_EXTENSION);
                                                                                    @endphp
                                                                                
                                                                                    @if(in_array($extension, ['pdf', 'doc', 'docx', 'txt']))
                                                                                        <i class="feather-file-text"></i>
                                                                                    @elseif(in_array($extension, ['jpg', 'png', 'gif', 'jpeg']))
                                                                                        <i class="feather-image"></i>
                                                                                    @elseif(in_array($extension, ['mp4', 'mkv', 'avi']))
                                                                                        <i class="feather-play-circle"></i>
                                                                                    @elseif(in_array($extension, ['zip', 'rar']))
                                                                                        <i class="feather-archive"></i>
                                                                                    @else
                                                                                        <i class="feather-file"></i>
                                                                                    @endif
                                                                                    <span class="text"> {{ $resource->name }}</span>
                                                                                </div>
                                                                            </a>
                                                                        @else
                                                                            <div class="course-content-left">
                                                                                @php
                                                                                $extension = pathinfo($resource->file_path, PATHINFO_EXTENSION);
                                                                                @endphp
                                                                            
                                                                                @if(in_array($extension, ['pdf', 'doc', 'docx', 'txt']))
                                                                                    <i class="feather-file-text"></i>
                                                                                @elseif(in_array($extension, ['jpg', 'png', 'gif', 'jpeg']))
                                                                                    <i class="feather-image"></i>
                                                                                @elseif(in_array($extension, ['mp4', 'mkv', 'avi']))
                                                                                    <i class="feather-play-circle"></i>
                                                                                @elseif(in_array($extension, ['zip', 'rar']))
                                                                                    <i class="feather-archive"></i>
                                                                                @else
                                                                                    <i class="feather-file"></i>
                                                                                @endif
                                                                                <span class="text"> {{ $resource->name }}</span>
                                                                            </div>
                                                                        @endif
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Course Content  -->
            
                                    <!-- Start Grades Section -->
                                    <div class="course-content rbt-shadow-box coursecontent-wrapper mt--30" id="details">
                                        <div class=" ">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="course-details-content">
                                                        <div class="section-title">
                                                            <h4 class="rbt-title-style-3">Bảng điểm</h4>
                                                        </div>
                                                        <div class="rbt-accordion-style rbt-accordion-02 accordion">
                                                            <div class="accordion" id="accordionGrades">
                                                                @foreach($grades as $grade)
                                                                    <div class="accordion-item card">
                                                                        <h2 class="accordion-header card-header" id="headingGrade{{ $grade->id }}">
                                                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseGrade{{ $grade->id }}" aria-expanded="false" aria-controls="collapseGrade{{ $grade->id }}">
                                                                                {{ $grade->grade_name }}
                                                                                <span class="ms-2 text-muted small">({{ $grade->created_at->format('d/m/Y') }})</span>
                                                                            </button>
                                                                        </h2>
                                                                        <div id="collapseGrade{{ $grade->id }}" 
                                                                             class="accordion-collapse collapse" 
                                                                             aria-labelledby="headingGrade{{ $grade->id }}" 
                                                                             data-bs-parent="#accordionGrades">
                                                                            <div class="accordion-body card-body pr--0">
                                                                                <ul class="rbt-course-main-content liststyle">
                                                                                    <li>
                                                                                        <a href="{{ asset('storage/' . $grade->file_path) }}" download>
                                                                                            <div class="course-content-left">
                                                                                                <i class="feather-download"></i>
                                                                                                <span class="text">Tải xuống bảng điểm</span>
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Grades Section -->
            
                              
            
                                    <!-- Start Edu Review List  -->
                                    <div class="rbt-review-wrapper rbt-shadow-box review-wrapper mt--30" id="review">
                                        <div class="course-content">
                                            <div class="section-title">
                                                <h4 class="rbt-title-style-3">Đánh giá</h4>
                                            </div>
                                            <div class="row g-5 align-items-center">
                                                <div class="col-lg-3">
                                                    <div class="rating-box">
                                                        <div class="rating-number">{{ number_format($averageRating, 1) }}</div>
                                                        <div class="rating">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                            </svg>
                                                        </div>
                                                        <span class="sub-title">Đánh giá môn học</span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="review-wrapper">
                                                        <div class="single-progress-bar">
                                                         
                                                            <div class="rating-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                            </div>
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 63%" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <span class="value-text">{{$ratingPercentages[5]}}%</span>
                                                        </div>
            
                                                        <div class="single-progress-bar">
                                                            <div class="rating-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                                </svg>
                                                            </div>
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 29%" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <span class="value-text">{{$ratingPercentages[4]}}%</span>
                                                        </div>
            
                                                        <div class="single-progress-bar">
                                                            <div class="rating-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                                </svg>
                                                            </div>
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 1%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <span class="value-text">{{$ratingPercentages[2]}}%</span>
                                                        </div>
            
                                                        <div class="single-progress-bar">
                                                            <div class="rating-text">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                                </svg>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                                </svg>
                                                            </div>
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 1%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                            <span class="value-text">{{$ratingPercentages[1]}}%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Edu Review List  -->
                                    @if(auth('student')->check())
                                    <div class="feedback-form about-author-list rbt-shadow-box featured-wrapper mt--30 has-show-more">
                                        <h3>Đánh giá môn học</h3>
                                
                                        {{-- Hiển thị thông báo sau khi gửi --}}
                                        @if(session()->has('message'))
                                            <div class="alert alert-success">
                                                {{ session('message') }}
                                            </div>
                                        @endif
                                            <style>
                                             .rating-stars {
            display: flex;
            gap: 5px;
        }
        
        .rating-stars .fa-star {
            font-size: 24px;
            color: #ccc; /* Mặc định màu xám */
            transition: color 0.3s;
        }
        
        .rating-stars .fa-star.selected {
            color: gold; /* Khi được chọn, chuyển sang màu vàng */
        }
        
        .rating-stars .fa-star:hover {
            color: gold; /* Hiệu ứng hover để chọn sao */
        }
        
        
                                            </style>
                                        <form wire:submit.prevent="submitFeedback">
                                            <div class="form-group rating-stars">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i class="fa fa-star {{ $rating >= $i ? 'selected' : '' }}"
                                                       wire:click="setRating({{ $i }})"
                                                       style="cursor: pointer;"
                                                   ></i>
                                                @endfor
                                            </div>
                                        
                                            <div class="form-group">
                                                <input type="checkbox" id="understand" wire:model="understand">
                                                <label for="understand">Tôi đã hiểu bài</label>
                                            </div>
                                        
                                            <div class=" ">
                                                <textarea id="comment" cols="20" rows="5" wire:model="comment" placeholder="Bình luận:" class="form-control"></textarea>
                                           <style>
                                                textarea {
                                                    width: 100%;
            background-color: transparent;
            border: 2px solid var(--color-border);
            border-radius: 6px;
            line-height: 23px;
            padding: 10px 20px;
            font-size: 14px !important;
            color: var(--color-body);
            margin-bottom: 15px;
                                                }
                                            </style>
                                            
                                            </div>
                                        
                                            <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
                                        </form>
                                        
                                    </div>
                                @endif
                                    <div class="about-author-list rbt-shadow-box featured-wrapper mt--30 has-show-more">
                                        <div class="section-title">
                                            <h4 class="rbt-title-style-3">Đánh giá môn học</h4>
                                        </div>
                                        <div class="has-show-more-inner-content rbt-featured-review-list-wrapper">
                                            @foreach($feedbacks as $feedback)
                                            <div class="rbt-course-review about-author">
                                                <div class="media">
                                                    
                                                    <div class="media-body">
                                                        <div class="author-info">
                                                            <h5 class="title">
                                                                <a class="hover-flip-item-wrapper" href="#">
                                                                    {{ $feedback->student->email ?? 'Ẩn danh' }}
                                                                </a>
                                                            </h5>
                                                            <div class="rating">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $feedback->rating)
                                                                        <i class="fa fa-star text-warning"></i> {{-- Sao vàng nếu rating >= i --}}
                                                                    @else
                                                                        <i class="fa fa-star text-secondary"></i> {{-- Sao xám nếu rating < i --}}
                                                                    @endif
                                                                @endfor
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="content">
                                                            <p class="description">{!! $feedback->comment !!}</p>
                                                            <ul class="social-icon social-default transparent-with-border justify-content-start">
                                                              
                                                            </ul>
                                                            @if ($feedback->understand)
                                                            <span class="rbt-badge variation-02 bg-primary-opacity">Đã hiểu bài</span>
                                                            @else
                                                            <span style="background: rgba(255, 0, 0, 0.39)" class="rbt-badge variation-02    btn-pink">Chưa hiểu bài</span>
        
                                                            @endif
                                                        </div>
        
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                         
                                        </div>
                                        <div class="rbt-show-more-btn">Xem thêm</div>
                                    </div>
                                </div>
                         
                            </div>
            
                            <div class="col-lg-4">
                                <div class="course-sidebar sticky-top rbt-shadow-box course-sidebar-top rbt-gradient-border">
                                    <div class="inner">
            
                                        <!-- Start Viedo Wrapper  -->
                                       
                                        <!-- End Viedo Wrapper  -->
            
                                        <div class="content-item-content">
                                             
                                            <div class="rbt-widget-details has-show-more">
                                                <ul class="has-show-more-inner-content rbt-course-details-list-wrapper">
                                                    <li><span>Ngày tạo</span><span class="rbt-feature-value rbt-badge-5">{{ $course->created_at->format('d/m/Y') }}</span></li>
                                                
                                                    <li><span>Số bài học</span><span class="rbt-feature-value rbt-badge-5">{{ $course->materials->count() }}</span></li>
                                                
                                                    <li><span>Số lượng sinh viên</span><span class="rbt-feature-value rbt-badge-5">{{ $course->students->count() }}</span></li>
                                                    <li><span>Giảng viên</span><span class="rbt-feature-value rbt-badge-5">{{ $course->creator->name }}</span></li>
                                                
                                                    <li><span>Số lượng đánh giá</span><span class="rbt-feature-value rbt-badge-5">{{ $course->feedbacks->count() }}</span></li>
                                                
                                                    <li><span>Lần cập nhật cuối</span><span class="rbt-feature-value rbt-badge-5">{{ $course->updated_at->format('d/m/Y') }}</span></li>
                                                </ul>
                                                
                                                <div class="rbt-show-more-btn">Xem thêm</div>
                                            </div>
            
                                            <div class="social-share-wrapper mt--30 text-center">
                                                <div class="rbt-post-share d-flex align-items-center justify-content-center">
                                                    <ul class="social-icon social-default transparent-with-border justify-content-center">
                                                        <li><a href="https://www.facebook.com/">
                                                                <i class="feather-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li><a href="https://www.twitter.com">
                                                                <i class="feather-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li><a href="https://www.instagram.com/">
                                                                <i class="feather-instagram"></i>
                                                            </a>
                                                        </li>
                                                        <li><a href="https://www.linkdin.com/">
                                                                <i class="feather-linkedin"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <hr class="mt--20">
                                                <div class="contact-with-us text-center">
                                                 
            @if ($isEnrolled)
            <div class="d-flex flex-column gap-2">
                @if($enrollmentStatus == 0)
                    <button class="rbt-btn btn-border hover-icon-reverse w-100 rounded-pill" disabled>
                        Đang chờ duyệt
                    </button>
                @else
                    <button class="rbt-btn btn-gradient hover-icon-reverse w-100 rounded-pill" disabled>
                        Đã tham gia
                    </button>
                    
                    <button wire:click="$set('showAttendanceModal', true)" class="rbt-btn btn-gradient hover-icon-reverse w-100 rounded-pill">
                        <span class="icon-reverse-wrapper">
                            <span class="btn-text">Điểm danh</span>
                            <span class="btn-icon"><i class="feather-check-circle"></i></span>
                        </span>
                    </button>
                @endif
            </div>

            <!-- Modal Điểm danh -->
            @if($showAttendanceModal)
            <div class="modal fade show" style="display: block;" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content attendance-modal">
                        <div class="modal-header">
                            <h5 class="modal-title">Điểm danh {{ $course->course_name }}</h5>
                            <button type="button" class="btn-close" wire:click="$set('showAttendanceModal', false)"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">
                                @php
                                    $courseStartDate = \Carbon\Carbon::parse($course->created_at);
                                    $currentDate = \Carbon\Carbon::now();
                                @endphp

                                @for ($week = 1; $week <= 12; $week++)
                                    @php
                                        $weekStartDate = $courseStartDate->copy()->addWeeks($week - 1);
                                        $weekEndDate = $weekStartDate->copy()->addDays(6);
                                        $isCurrentWeek = $currentDate->between($weekStartDate, $weekEndDate);
                                        $isPastWeek = $currentDate->isAfter($weekEndDate);
                                        $isFutureWeek = $currentDate->isBefore($weekStartDate);
                                        
                                        // Kiểm tra trạng thái điểm danh
                                        $attendance = $attendances->where('week', $week)->first();
                                        $hasAttended = $attendance && $attendance->status == 1;
                                    @endphp

                                    <div class="col-md-3">
                                        <div class="card h-100 attendance-card">
                                            <div class="card-body text-center">
                                                <h6 class="card-title">Tuần {{ $week }}</h6>
                                                <p class="small text-muted mb-2">
                                                    {{ $weekStartDate->format('d/m/Y') }} - {{ $weekEndDate->format('d/m/Y') }}
                                                </p>

                                                @if($hasAttended)
                                                    <span class="badge bg-success">Đã điểm danh</span>
                                                @elseif($isCurrentWeek)
                                                    <button wire:click="markAttendance({{ $week }})" 
                                                            class="rbt-btn btn-sm btn-gradient">
                                                        Điểm danh
                                                    </button>
                                                @elseif($isPastWeek)
                                                    <span class="badge bg-danger">Vắng mặt</span>
                                                @else
                                                    <button class="rbt-btn btn-sm btn-gradient" disabled>
                                                        Chưa đến hạn
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-backdrop fade show"></div>

            <style>
                .attendance-modal {
                    border-radius: 15px;
                    border: none;
                    box-shadow: 0 0 20px rgba(0,0,0,0.1);
                }

                .attendance-modal .modal-header {
                    border-bottom: 1px solid var(--color-border);
                    padding: 1.5rem;
                }

                .attendance-modal .modal-title {
                    font-size: 1.25rem;
                    font-weight: 600;
                    color: var(--color-heading);
                }

                .attendance-modal .modal-body {
                    padding: 1.5rem;
                }

                .attendance-card {
                    border: 1px solid var(--color-border);
                    border-radius: 10px;
                    transition: all 0.3s ease;
                }

                .attendance-card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
                }

                .attendance-card .card-title {
                    color: var(--color-heading);
                    font-weight: 600;
                    margin-bottom: 0.5rem;
                }

                .attendance-card .text-muted {
                    color: var(--color-body) !important;
                }

                .attendance-card .badge {
                    padding: 0.5rem 1rem;
                    font-weight: 500;
                }

                .attendance-card .rbt-btn {
                    padding: 0.5rem 1.5rem;
                    font-weight: 500;
                }

                /* Dark Mode Styles */
                .active-dark-mode .attendance-modal {
                    background: var(--color-darker);
                    color: var(--color-white);
                }

                .active-dark-mode .attendance-modal .modal-header {
                    border-bottom-color: rgba(255,255,255,0.1);
                }

                .active-dark-mode .attendance-modal .modal-title {
                    color: var(--color-white);
                }

                .active-dark-mode .attendance-card {
                    background: var(--color-dark);
                    border-color: rgba(255,255,255,0.1);
                }

                .active-dark-mode .attendance-card .card-title {
                    color: var(--color-white);
                }

                .active-dark-mode .attendance-card .text-muted {
                    color: rgba(255,255,255,0.7) !important;
                }

                .active-dark-mode .modal-backdrop {
                    background-color: rgba(0,0,0,0.8);
                }

                .active-dark-mode .btn-close {
                    filter: invert(1) grayscale(100%) brightness(200%);
                }
            </style>
            @endif
        @else
            <button wire:click="enrollCourse" class="rbt-btn btn-gradient hover-icon-reverse w-100 rounded-pill">
                Tham gia môn học
            </button>
        @endif
      
                                                    
                                                    @if (session()->has('enrolled'))
                                                    <p class="text-success mt-2">{{ session('enrolled') }}</p>
                                                @endif
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
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
            
                <div class="rbt-related-course-area bg-color-white pt--60 rbt-section-gapBottom">
                    <div class="container">
                        <div class="section-title mb--30">
                            <span class="subtitle bg-primary-opacity">Khóa học liên quan</span>
                            <h4 class="title">Khóa học liên quan</h4>
                        </div>
                        <div class="row g-5">
            
                            @foreach($relatedCourses as $course)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="rbt-card variation-01 rbt-hover">
                                    <div class="rbt-card-img">
                                        <a href="{{ route('courses.show', ['slug' => $course->slug]) }}">
                                            <img style="height: 200px;object-fit: cover;" src="{{ asset('storage/' .  $course->image) }}" alt="{{ $course->course_name }}">
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
                                                <span class="rating-count">({{ $course->feedbacks->count() }} Đánh giá)</span>
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
                    </div>
                </div>
            
         
                <!-- End Course Action Bottom  -->
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
        
        <!-- Modal Bảng điểm -->
        <div x-data="{ show: true }" 
             x-show="show" 
             class="modal fade show" 
             style="display: none;"
             x-cloak>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bảng điểm môn {{ $course->course_name }}</h5>
                        <button type="button" class="btn-close" wire:click="closeGradesModal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tên bảng điểm</th>
                                        <th>Ngày tạo</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($grades as $grade)
                                    <tr>
                                        <td>{{ $grade->grade_name }}</td>
                                        <td>{{ $grade->created_at->format('d/m/Y H:i') }}</td>
                                        <td>
                                            <button wire:click="viewGrade({{ $grade->id }})" class="rbt-btn btn-sm btn-primary">
                                                <i class="feather-eye"></i> Xem
                                            </button>
                                            <a href="{{ asset('storage/' . $grade->file_path) }}" class="rbt-btn btn-sm btn-secondary" download>
                                                <i class="feather-download"></i> Tải
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal Xem Bảng điểm -->
        <div x-data="{ show: @entangle('showGradeViewer') }" 
             x-show="show" 
             class="modal fade show" 
             style="display: none;"
             x-cloak>
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $selectedGrade ? $selectedGrade->grade_name : '' }}</h5>
                        <button type="button" class="btn-close" wire:click="closeGradeViewer"></button>
                    </div>
                    <div class="modal-body">
                        @if($selectedGrade)
                            <div class="excel-viewer" style="width: 100%; height: 70vh; overflow: auto;">
                                @php
                                    $xlsx = new \Shuchkin\SimpleXLSX(storage_path('app/public/' . $selectedGrade->file_path));
                                    $rows = $xlsx->rows();
                                    $headers = array_shift($rows);
                                @endphp
                                <div class="excel-content" style="background: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
                                    <div style="overflow-x: auto;">
                                        <table style="min-width: 100%; border-collapse: collapse;">
                                            <thead>
                                                <tr>
                                                    @foreach($headers as $header)
                                                        <th style="white-space: nowrap; padding: 10px; border: 1px solid #dee2e6; background: #f8f9fa;">{{ $header }}</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($rows as $row)
                                                    <tr>
                                                        @foreach($row as $cell)
                                                            <td style="white-space: nowrap; padding: 10px; border: 1px solid #dee2e6;">{{ $cell }}</td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <!-- Start Bảng điểm Section -->
   <style>
.rating {
    display: flex;
    align-items: center;
    gap: 5px;
}

.rating .fa-star {
    color: #ddd;
    font-size: 16px;
    transition: color 0.3s ease;
}

.rating .fa-star.active {
    color: #ffc107;
}

/* Dark Mode */
.active-dark-mode .rating .fa-star {
    color: #444;
}

.active-dark-mode .rating .fa-star.active {
    color: #ffc107;
}
</style>
    <!-- End Bảng điểm Section -->
</div>
