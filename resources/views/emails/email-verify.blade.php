@component('mail::message')

    <h4>Merhaba, {{ $user->name }}!</h4>

    İşlerini kolaylaştırmaya son bir adım.
    Doğrula butonuna tıklayarak e-posta adresini doğrulayabilirsin.
    Doğrulama işleminden sonra {{env('APP_URL')}}'e istediğiniz zaman giriş yaparak kullanabilirsiniz.

    @component('mail::button', ['url' => route('verification.verify', $user->remember_token)])
        Doğrula
    @endcomponent
@endcomponent
