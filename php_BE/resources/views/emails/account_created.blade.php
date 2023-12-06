<x-mail::message>
# Chúc mừng bạn dã đăng ký tài khoản thành công.
Xin chào, {{$user->name}} đã đến với chúng tôi chúc bạn có một trải nghiệm thú vị.

<x-mail::button :url="'http://localhost:5173/login'">
Đăng nhập
</x-mail::button>

Thanks,{{$user->name}}<br>
{{ config('app.name') }}
</x-mail::message>
