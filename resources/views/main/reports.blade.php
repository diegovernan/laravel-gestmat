@extends('layouts.app')

@section('content')

<div class="text-center py-3 d-print-none">
    <button type="button" class="btn btn-primary" onclick="window.print()">Imprimir</button>
</div>

<h4 class="text-center py-3">Relatório {{ date('Y') }}</h4>

<div class="d-flex justify-content-center py-3">
    <div class="card" style="width: 18rem;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Despesa: R$ {{ number_format($income, 2, ',', '.') }}</li>
            <li class="list-group-item">Receita: R$ {{ number_format($expense, 2, ',', '.') }}</li>
            <li class="list-group-item">Resultado: R$ {{ number_format($difference, 2, ',', '.') }}</li>
        </ul>
    </div>
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