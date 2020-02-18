@extends('layouts.app')

@section('content')

<div class="text-center py-3 d-print-none">
    <button type="button" class="btn btn-primary" onclick="window.print()">Imprimir</button>
</div>
<div class="table-responsive py-3 d-print-block">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Vendidos</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($inventories as $inventory)
            <tr>
                <td>{{ $inventory->id }}</td>
                <td>{{ $inventory->product->name }}</td>
                <td>R$ {{ $inventory->product->price }}</td>
                <td>{{ $inventory->available_quantity }}</td>
                <td>{{ $inventory->sold_quantity }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Nenhum produto encontrado...</td>
            </tr>
            @endforelse

            <tr>
                <td colspan="4">Total</td>
                <td>x</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection