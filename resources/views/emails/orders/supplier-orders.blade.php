@component('mail::message')
Solicitação para {{ $supplierorder->supplier->name }}

Produto: {{ $supplierorder->product->name }}

Quantidade: {{ $supplierorder->quantity }}

Att, {{ $supplierorder->user->name }}
@endcomponent