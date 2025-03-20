<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác thực email</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.8;
            color: #333;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #00c6ff, #0072ff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 600px;
            width: 100%;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            padding: 40px;
            text-align: center;
        }
        .logo img {
            max-width: 150px;
            height: auto;
            margin-bottom: 20px;
        }
        .content h2 {
            color: #0072ff;
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .content p {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 15px 40px;
            background: linear-gradient(135deg, #ff7eb3, #ff758c);
            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 30px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 4px 10px rgba(255, 117, 140, 0.3);
        }
        .button:hover {
            background: linear-gradient(135deg, #ff758c, #ff5e7d);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 94, 125, 0.4);
        }
        .verification-link {
            word-break: break-word;
            color: #444;
            font-size: 16px;
            background: #f8f8f8;
            padding: 12px;
            border-radius: 6px;
            display: inline-block;
            max-width: 90%;
            margin-top: 10px;
        }
        .footer {
            font-size: 14px;
            color: #777;
            margin-top: 30px;
        }
        .social-links {
            margin-top: 20px;
        }
        .social-links a {
            margin: 0 10px;
            color: #0072ff;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            transition: color 0.3s;
        }
        .social-links a:hover {
            color: #0056b3;
        }
        .divider {
            height: 2px;
            background: #0072ff;
            margin: 25px auto;
            width: 80px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="{{ asset('assets/z6412708570639_fda089e9c877e665675909e9d412c04a.jpg') }}" alt="Logo">
        </div>
        
        <div class="content">
            <h2>Xác thực địa chỉ email của bạn</h2>
            <p>Xin chào <strong>{{ $user->name }}</strong>,</p>
            
            <p>Cảm ơn bạn đã đăng ký tài khoản tại <strong>MKT Subject</strong>. Để hoàn tất quá trình đăng ký, vui lòng xác thực địa chỉ email của bạn bằng cách nhấp vào nút bên dưới:</p>
            
            <a href="{{ $verificationUrl }}" class="button">Xác thực email</a>
            
            <div class="divider"></div>

            <p>Nếu nút trên không hoạt động, bạn có thể sao chép và dán đường link sau vào trình duyệt:</p>
            <p class="verification-link">{{ $verificationUrl }}</p>
            
            <p><em>Link xác thực này sẽ hết hạn sau 24 giờ.</em></p>
            
            <p>Nếu bạn không tạo tài khoản này, vui lòng bỏ qua email này.</p>
        </div>
        
        <div class="footer">
            <div class="social-links">
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
                <a href="#">Instagram</a>
            </div>
            <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
