<div>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Quên mật khẩu - {{ config('app.name') }}</title>
        <meta name="description" content="Đặt lại mật khẩu cho tài khoản của bạn. Nhập email để nhận link đặt lại mật khẩu.">
        <meta name="keywords" content="quên mật khẩu, đặt lại mật khẩu, khôi phục mật khẩu">
    </head>
    <body class="rbt-header-sticky">
        <!-- Start breadcrumb Area -->
        <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-inner text-center">
                            <h2 class="title">Quên mật khẩu</h2>
                            <ul class="page-list">
                                <li class="rbt-breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                                <li>
                                    <div class="icon-right"><i class="feather-chevron-right"></i></div>
                                </li>
                                <li class="rbt-breadcrumb-item active">Quên mật khẩu</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area -->

        <div class="rbt-elements-area bg-color-white rbt-section-gap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                            <h3 class="title">Quên mật khẩu</h3>
                            <p class="description">Nhập email của bạn để nhận link đặt lại mật khẩu.</p>

                            @if(session()->has('message'))
                                <div class="alert alert-success mt-3">{{ session('message') }}</div>
                            @endif

                            <form wire:submit.prevent="sendResetLink">
                                <div class="form-group">
                                    <input type="email" wire:model="email" placeholder="Email *">
                                    <span class="focus-border"></span>
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="form-submit-group">
                                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">
                                                <span wire:loading.remove wire:target="sendResetLink">Gửi link đặt lại mật khẩu</span>
                                                <span wire:loading wire:target="sendResetLink">Đang xử lý...</span>
                                            </span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </button>
                                </div>

                                <div class="mt-4 text-center">
                                    <a href="{{ route('auth') }}" class="rbt-btn-link">Quay lại đăng nhập</a>
                                </div>
                            </form>
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

        <div class="rbt-progress-parent">
            <svg class="rbt-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
    </body>
</div> 