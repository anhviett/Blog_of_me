@component('mail::message')
    Xin chào **{{$user->firstname}}**,  {{-- use double space for line break --}}
    Chúng tôi nhận được yêu cầu đặt lại mật khẩu từ địa chỉ email này, nếu bạn không gửi yêu cầu thì hãy đổi mật khẩu ngay lập tức.


    Click vào đây để dặt lại mật khẩu của bạn
    @component('mail::button', ['url' => 'http://127.0.0.1/admin/reset-password/'.$user->email.'/'.$token])
        Click here !
    @endcomponent
    Trân trọng,

    Laravel team.

    Nếu bạn gặp vấn đề click vào liên kết, copy và dán link này vào url: 'http://127.0.0.1/resetPassword/?email={{$user->email}}
@endcomponent

