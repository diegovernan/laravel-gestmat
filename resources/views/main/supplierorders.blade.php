@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h2 class="text-center">Solicitar produto</h2>

    @include('alerts.messages')

    <form method="post" action="">
        @csrf
        <div class="form-group">
            <label for="inputProd">Fornecedor</label>
            <select id="inputProd" class="form-control" name="product_id">
                <option value="none" selected disabled hidden>Selecionar...</option>
                @foreach ($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                @endforeach
            </select>
        </div>

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
            <label for="Input1">Quantidade desejada</label>
            <input type="number" class="form-control" id="Input1" name="quantity" value="">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Enviar</button>
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
                <th>Recebido</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($supplierorders as $supplierorder)
            <tr>
                <td>{{ $supplierorders->id }}</td>
                <td>{{ $supplierorder->product->name }}</td>
                <td>{{ $supplierorder->supplier->name }}</td>
                <td>{{ $supplierorder->quantity }}</td>
                <td>{{ $supplierorder->arrived }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Nenhuma solicitação encontrada...</td>
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