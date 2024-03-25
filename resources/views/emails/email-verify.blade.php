@component('mail::message')
<pre>
<h4>Merhaba, {{ $user->name }}!</h4>
İşlerini kolaylaştırmaya son bir adım.
Doğrula butonuna tıklayarak e-posta adresini doğrulayabilirsin.
Doğrulama işleminden sonra {{env('APP_URL')}}'e istediğiniz zaman giriş yaparak kullanabilirsiniz.

<a href="{{ route('verification.verify', $user->remember_token) }}" class="button button-primary align-items-center">Doğrula</a>
</pre>
@endcomponent
