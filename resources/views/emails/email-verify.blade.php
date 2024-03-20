@component('mail::message')

    <h4>Merhaba, {{ $user->name }}!</h4>

    İşlerini kolaylaştırmaya son bir adım.
    Doğrula butonuna tıklayarak e-posta adresini doğrulayabilirsin.
    Doğrulama işleminden sonra {{env('APP_URL')}}'e istediğiniz zaman giriş yaparak kullanabilirsiniz.

    <a href="{{ route('verification.verify', $user->remember_token) }}" class="btn btn-primary">Doğrula</a>

@endcomponent
