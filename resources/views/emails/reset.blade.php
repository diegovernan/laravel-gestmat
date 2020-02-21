@component('mail::message')


<h1>Olá!</h1>

<p>Você está recebendo este e-mail porque nós recebemos uma solicitação de redefinição de senha da sua conta.</p>

@component('mail::button')
Redefinir senha
@endcomponent

<p>Este link de redefinição de senha expirará em 60 minutos.</p>

<p>Caso você não tenha feito esta solicitação, basta ignorar este e-mail.</p>

Atenciosamente,<br>
{{ config('app.name') }}

@endcomponent