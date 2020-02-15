@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h4 class="text-center">Atualizar</h4>

    @include('alerts.messages')

    <form method="post" action="{{ route('product.update', $product->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="Input1">Nome</label>
            <input type="text" class="form-control" id="Input1" name="name" value="{{ old('name') ?? $product->name }}">
        </div>

        <div class="form-group">
            <label for="Input2">Preço</label>
            <input type="text" class="form-control" id="Input2" name="price" value="{{ old('price') ?? $product->price }}">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-info">Salvar</button>
        </div>
    </form>
</div>

<hr>

<h4 class="text-center py-5">Informações do produto</h4>

<div class="pb-5">
    <p>ID: {{ $product->id }}</p>
    <p>Nome: {{ $product->name }}</p>
    <p>Preço: R${{ $product->price }}</p>

    <a href="{{ route('products') }}" type="button" class="btn btn-dark">Voltar</a>
</div>

@endsection