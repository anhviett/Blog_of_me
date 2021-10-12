@component('mail::message')
    Xin chào **{{$user->firstname}}**,  {{-- use double space for line break --}}
    Cảm ơn bạn đã chọn E-Shopper.

    Click vào đây để kích hoạt tài khoản của bạn
    @component('mail::button', ['url' => 'http://127.0.0.1/admin/verifyEmailUser/'.$user->verifyUser->token])
        Click here !
    @endcomponent
    Trân trọng,

    Laravel team.

    Nếu bạn gặp vấn đề click vào liên kết, copy và dán link này vào url: 'http://127.0.0.1/verifyEmail'/{{$user->verifyUser->token}}
@endcomponent

