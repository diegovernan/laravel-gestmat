@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h4 class="text-center">Cadastrar</h4>

    @include('alerts.messages')

    <form method="post" action="{{ route('inventory.store') }}">
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
            <label for="Input1">Quantidade mínima</label>
            <input type="number" class="form-control" id="Input1" name="minimum_quantity" value="{{ old('minimum_quantity') }}">
        </div>

        <div class="form-group">
            <label for="Input2">Quantidade disponível</label>
            <input type="number" class="form-control" id="Input2" name="available_quantity" value="{{ old('available_quantity') }}">
        </div>

        <div class="form-group">
            <label for="Input3">Quantidade vendida</label>
            <input type="number" class="form-control" id="Input3" name="sold_quantity" value="{{ old('sold_quantity') }}">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-info">Salvar</button>
        </div>
    </form>
</div>

<hr>

<h4 class="text-center py-5">Estoque</h4>

<div class="table-responsive pb-5">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Item</th>
                <th>Quantidade mínima</th>
                <th>Quantidade disponível</th>
                <th>Quantidade vendida</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($inventories as $inventory)
            <tr>
                <td>{{ $inventory->id }}</td>
                <td>{{ $inventory->product->name }}</td>
                <td>{{ $inventory->minimum_quantity }}</td>
                <td class="{{ $inventory->available_quantity > $inventory->minimum_quantity ? 'text-success' : 'text-danger' }}">{{ $inventory->available_quantity }}</td>
                <td>{{ $inventory->sold_quantity }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('inventory.edit', $inventory->id) }}" type="button" class="btn btn-outline-dark btn-sm mr-1"><span data-feather="edit"></span></a>

                        <form method="post" action="{{ route('inventory.destroy', $inventory->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-dark btn-sm" onclick="return confirm('Tem certeza que deseja excluir este item?')"><span data-feather="trash-2"></span></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Nenhum item em estoque...</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex">
        <div class="mx-auto py-2">
            {{ $inventories->links() }}
        </div>
    </div>
</div>

@endsection