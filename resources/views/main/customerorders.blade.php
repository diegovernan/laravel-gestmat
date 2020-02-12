@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h2 class="text-center">Vender produto</h2>

    @include('alerts.messages')

    <form method="post" action="">
        @csrf
        <div class="form-group">
            <label for="inputProd">Produto</label>
            <select id="inputProd" class="form-control" name="product_id">
                <option value="none" selected disabled hidden>Selecionar...</option>
                @foreach ($products as $product)
                <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

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
            <label for="Input1">Quantidade vendida</label>
            <input type="number" class="form-control" id="Input1" name="quantity" value="">
        </div>

        <div class="form-group">
            <label for="Input2">Data da venda</label>
            <input type="date" class="form-control" id="Input2" name="order_at" value="">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Concluir</button>
        </div>
    </form>
</div>

<hr>

<h2 class="text-center py-5">Produtos vendidos</h2>

<div class="table-responsive pb-5">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Produto</th>
                <th>Cliente</th>
                <th>Quantidade</th>
                <th>Venda</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($customerorders as $customerorder)
            <tr>
                <td>{{ $customerorder->id }}</td>
                <td>{{ $customerorder->product->name }}</td>
                <td>{{ $customerorder->customer->name }}</td>
                <td>{{ $supplierorder->quantity }}</td>
                <td class="{{ $customerorder->order_at >= date('Y-m-d') ? 'text-success' : 'text-danger' }}">
                    {{ $customerorder->order_at->format('d/m/Y') }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Nenhuma venda encontrada...</td>
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