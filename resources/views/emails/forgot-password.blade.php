<!DOCTYPE html>
<html>
<head>
    <title>Đặt lại mật khẩu</title>
</head>
<body>
    <h2>Xin chào {{ $student->full_name }},</h2>
    
    <p>Bạn nhận được email này vì chúng tôi đã nhận được yêu cầu đặt lại mật khẩu cho tài khoản của bạn.</p>
    
    <p>Vui lòng nhấp vào nút bên dưới để đặt lại mật khẩu của bạn:</p>
    
    <div style="text-align: center; margin: 30px 0;">
        <a href="{{ route('reset-password', ['token' => $token]) }}" 
           style="background-color: #2b70fa; color: white; padding: 12px 24px; text-decoration: none; border-radius: 4px;">
            Đặt lại mật khẩu
        </a>
    </div>
    
    <p>Link này sẽ hết hạn sau 60 phút.</p>
    
    <p>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này.</p>
    
    <p>Trân trọng,<br>{{ config('app.name') }}</p>
</body>
</html> 