@extends('layouts.app')

@section('content')

<h3 class="py-3">Cadastrar</h3>

@include('alerts.messages')

<form method="post" action="{{ route('products.store') }}">
    @csrf
    <div class="form-group">
        <label for="Input1">Nome</label>
        <input type="text" class="form-control" id="Input1" name="name" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label for="Input2">Preço de custo</label>
        <input type="text" class="form-control money" id="Input2" name="cost_price" value="{{ old('cost_price') }}">
    </div>

    <div class="form-group">
        <label for="Input3">Preço de venda</label>
        <input type="text" class="form-control money" id="Input3" name="sale_price" value="{{ old('sale_price') }}">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>

<hr>

<h3 class="py-3">Produtos</h3>

<div class="table-responsive pb-5">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço de custo</th>
                <th>Preço de venda</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>R$ {{ number_format($product->cost_price, 2, ',', '.') }}</td>
                <td>R$ {{ number_format($product->sale_price, 2, ',', '.') }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('product.edit', $product->id) }}" type="button" class="btn btn-outline-dark btn-sm mr-1"><span data-feather="edit"></span></a>

                        <form method="post" action="{{ route('product.destroy', $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-dark btn-sm" onclick="return confirm('Tem certeza que deseja excluir este produto?')"><span data-feather="trash-2"></span></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Nenhum produto encontrado...</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex">
        <div class="mx-auto py-2">
            {{ $products->links() }}
        </div>
    </div>
</div>

@endsection