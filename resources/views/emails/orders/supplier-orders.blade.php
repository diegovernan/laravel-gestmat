@component('mail::message')
Solicitação para {{ $supplierorder->supplier->name }}

Produto: {{ $supplierorder->product->name }}

Quantidade: {{ $supplierorder->quantity }}

Data de entrega: {{ $supplierorder->order_at->format('d/m/Y') }}

Att, {{ $supplierorder->user->name }}
@endcomponent