@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h2 class="text-center">Solicitar produto</h2>

    @include('alerts.messages')

    <form method="post" action="{{ route('supplierorders.store') }}">
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
            <label for="inputSupp">Fornecedor</label>
            <select id="inputSupp" class="form-control" name="supplier_id">
                <option value="none" selected disabled hidden>Selecionar...</option>
                @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Input1">Quantidade desejada</label>
            <input type="number" class="form-control" id="Input1" name="quantity" value="">
        </div>

        <div class="form-group">
            <label for="Input2">Prazo para entrega</label>
            <input type="date" class="form-control" id="Input2" name="order_at" value="">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-info">Enviar</button>
        </div>
    </form>
</div>

<hr>

<h2 class="text-center py-5">Produtos solicitados</h2>

<div class="table-responsive pb-5">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Produto</th>
                <th>Fornecedor</th>
                <th>Quantidade</th>
                <th>Entrega</th>
                <th>Recebido</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($supplierorders as $supplierorder)
            <tr>
                <td>{{ $supplierorder->id }}</td>
                <td>{{ $supplierorder->product->name }}</td>
                <td>{{ $supplierorder->supplier->name }}</td>
                <td>{{ $supplierorder->quantity }}</td>
                <td class="{{ $supplierorder->order_at >= date('Y-m-d') ? 'text-success' : 'text-danger' }}">
                    {{ $supplierorder->order_at->format('d/m/Y') }}
                </td>
                <td>
                    <form method="post" action="{{ route('supplierorder.update', $supplierorder->id) }}">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn {{ $supplierorder->arrived == 1 ? 'btn-outline-success' : 'btn-outline-danger' }} btn-sm">
                            {{ $supplierorder->arrived == 1 ? 'Sim' : 'Não' }}
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Nenhuma solicitação encontrada...</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex">
        <div class="mx-auto py-2">
            {{ $supplierorders->links() }}
        </div>
    </div>
</div>

@endsection