<div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Xác Thực Tài Khoản | Quản lý môn học Khoa Máy tàu biển</title>
        <meta name="description" content="Xác thực tài khoản sinh viên - Kích hoạt tài khoản mới đăng ký để truy cập Quản lý môn học Khoa Máy tàu biển">
        <meta name="keywords" content="xác thực tài khoản, kích hoạt tài khoản, xác nhận email, quản lý môn học, môn học mkt">
        <meta name="author" content="MKT Subject Management">
        <meta property="og:title" content="Xác Thực Tài Khoản | Quản lý môn học Khoa Máy tàu biển">
        <meta property="og:description" content="Xác thực tài khoản sinh viên - Kích hoạt tài khoản mới đăng ký để truy cập Quản lý môn học Khoa Máy tàu biển">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta name="robots" content="noindex, nofollow">
        <link rel="canonical" href="{{ url()->current() }}" />
    </head>
    <div class="container">
        <div class="rbt-contact-form contact-form-style-1 max-width-auto mt-5 mb-5">
            <h3 class="title">Xác Thực Tài Khoản</h3>
            <form wire:submit.prevent="verify">
                <div class="form-group">
                    <input type="email" wire:model="email" placeholder="Nhập email *">
                    <span class="focus-border"></span>
                </div>
        
                <div class="form-group">
                    <input type="text" wire:model="code_input" placeholder="Nhập mã xác thực *">
                    <span class="focus-border"></span>
                </div>
        
                <div class="form-submit-group">
                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                        <span class="icon-reverse-wrapper">
                            <span class="btn-text">Xác Thực</span>
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
    
</div>
