@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h2 class="text-center">Cadastrar produto</h2>

    @include('alerts.messages')

    <form method="post" action="{{ route('products.store') }}">
        @csrf
        <div class="form-group">
            <label for="Input1">Nome</label>
            <input type="text" class="form-control" id="Input1" name="name" value="">
        </div>

        <div class="form-group">
            <label for="Input2">Preço</label>
            <input type="text" class="form-control" id="Input2" name="price" value="">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-info">Salvar</button>
        </div>
    </form>
</div>

<hr>

<h2 class="text-center py-5">Produtos cadastrados</h2>

<div class="table-responsive pb-5">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>R$ {{ $product->price }}</td>
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
                <td colspan="4" class="text-center">Nenhum produto encontrado...</td>
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