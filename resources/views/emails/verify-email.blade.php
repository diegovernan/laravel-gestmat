@component('mail::message')


<h1>Olá!</h1>

<p>Por favor, clique no botão abaixo para verificar seu e-mail.</p>

@component('mail::button', ['url' => $url])
Verify Email
@endcomponent

Caso você não tenha criado uma conta, basta ignorar este esta mensagem.

Atenciosamente,<br>
{{ config('app.name') }}

@endcomponent