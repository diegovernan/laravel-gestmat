@extends('layouts.app')

@section('content')

<h3 class="text-center py-3">Vender</h3>

@include('alerts.messages')

<form method="post" action="{{ route('customerorders.store') }}">
    @csrf
    <div class="form-group">
        <label for="inputCust">Cliente</label>
        <select id="inputCust" class="form-control" name="customer_id">
            <option value="none" selected disabled hidden>Selecionar...</option>
            @foreach ($customers as $customer)
            <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="inputProd">Produto</label>
        <select id="inputProd" class="form-control" name="product_id">
            <option value="none" selected disabled hidden>Selecionar...</option>
            @foreach ($inventory_products as $item)
            <option value="{{ $item->product->id }}" {{ old('product_id') == $item->product->id ? 'selected' : '' }}>{{ $item->product->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="Input1">Quantidade</label>
        <input type="number" class="form-control" id="Input1" name="quantity" value="{{ old('quantity') }}">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Concluir</button>
    </div>
</form>

<hr>

<h3 class="text-center py-3">Vendas</h3>

<div class="table-responsive pb-5">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Saída</th>
                <th>Preço</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($customerorders as $customerorder)
            <tr>
                <td>{{ $customerorder->id }}</td>
                <td>{{ $customerorder->customer->name }}</td>
                <td>{{ $customerorder->product->name }}</td>
                <td>{{ $customerorder->quantity }}</td>
                <td>{{ $customerorder->created_at->format('d/m/Y') }}</td>
                <td>R$ {{ number_format($customerorder->price, 2, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Nenhuma venda encontrada...</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex">
        <div class="mx-auto py-2">
            {{ $customerorders->links() }}
        </div>
    </div>
</div>

@endsection