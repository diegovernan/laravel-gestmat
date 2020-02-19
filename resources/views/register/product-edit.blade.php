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
            <label for="Input2">Preço de custo</label>
            <input type="text" class="form-control money" id="Input2" name="cost_price" value="{{ old('cost_price') ?? $product->cost_price }}">
        </div>

        <div class="form-group">
            <label for="Input3">Preço de venda</label>
            <input type="text" class="form-control money" id="Input3" name="sale_price" value="{{ old('sale_price') ?? $product->sale_price }}">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>

<hr>

<h4 class="text-center py-5">Informações do produto</h4>

<div class="pb-5">
    <p>ID: {{ $product->id }}</p>
    <p>Nome: {{ $product->name }}</p>
    <p>Preço de custo: R$ {{ number_format($product->cost_price, 2, ',', '.') }}</p>
    <p>Preço de venda: R$ {{ number_format($product->sale_price, 2, ',', '.') }}</p>

    <a href="{{ route('products') }}" type="button" class="btn btn-dark">Voltar</a>
</div>

@endsection