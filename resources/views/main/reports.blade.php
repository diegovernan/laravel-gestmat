@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between py-4">
    <h3>Relatório {{ date('Y') }}</h3>

    <button type="button" class="btn btn-primary d-print-none" onclick="window.print()">Imprimir</button>
</div>

<div class="py-3">
    <ul class="list-unstyled d-flex justify-content-around">
        <li class="d-inline">Despesa: <span class="text-danger">R$ {{ number_format($income, 2, ',', '.') }}</span></li>
        <li class="d-inline">Receita: <span class="text-success">R$ {{ number_format($expense, 2, ',', '.') }}</span></li>
        <li class="d-inline">Resultado: <span class="text-primary">R$ {{ number_format($difference, 2, ',', '.') }}</span></li>
    </ul>
</div>

<div class="table-responsive py-3 d-print-block">
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Produto</th>
                <th>Preço de custo</th>
                <th>Preço de venda</th>
                <th>Unidades disponíveis</th>
                <th>Unidades vendidas</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($inventories as $inventory)
            <tr>
                <td>{{ $inventory->id }}</td>
                <td>{{ $inventory->product->name }}</td>
                <td>R$ {{ number_format($inventory->product->cost_price, 2, ',', '.') }}</td>
                <td>R$ {{ number_format($inventory->product->sale_price, 2, ',', '.') }}</td>
                <td>{{ $inventory->available_quantity }}</td>
                <td>{{ $inventory->sold_quantity }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Nenhum produto encontrado...</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection