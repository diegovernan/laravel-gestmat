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
                <th>Preço unitário</th>
                <th>Unidades disponíveis</th>
                <th>Unidades vendidas</th>
                <th>Valor total</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($inventories as $inventory)
            <tr>
                <td>{{ $inventory->id }}</td>
                <td>{{ $inventory->product->name }}</td>
                <td>R$ {{ number_format($inventory->product->price, 2, ',', '.') }}</td>
                <td>{{ $inventory->available_quantity }}</td>
                <td>{{ $inventory->sold_quantity }}</td>
                <td>R$ {{ number_format($inventory->product->price * $inventory->sold_quantity, 2, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Nenhum produto encontrado...</td>
            </tr>
            @endforelse

            <tr>
                <td colspan="5">Receita</td>
                <td>R$ {{ number_format($total_price, 2, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection