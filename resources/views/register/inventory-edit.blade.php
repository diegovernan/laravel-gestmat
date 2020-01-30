@extends('dashboard.app')

@section('content')

<div class="container py-5">
    <h2 class="text-center">Atualizar estoque</h2>

    @include('alerts.messages')

    <form method="post" action="{{ route('inventory.update', $inventory->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="inputProd">Produto</label>
            <select id="inputProd" class="form-control" name="product_id">
                <option value="none" selected disabled hidden>Selecionar...</option>
                @foreach ($products as $product)
                <option value="{{ $product->id }}" {{ $product->id == $inventory->product_id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="Input1">Quantidade disponível</label>
            <input type="number" class="form-control" id="Input1" name="available_quantity" value="{{ old('available_quantity') ?? $inventory->available_quantity }}">
        </div>

        <div class="form-group">
            <label for="Input2">Quantidade mínima</label>
            <input type="number" class="form-control" id="Input2" name="minimum_quantity" value="{{ old('minimum_quantity') ?? $inventory->minimum_quantity }}">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
</div>

<hr>

<h2 class="text-center py-5">Informações do item</h2>

<div class="pb-5">
    <p>ID: {{ $inventory->id }}</p>
    <p>Nome: {{ $inventory->product->name }}</p>
    <p>Quantidade disponível: {{ $inventory->available_quantity }}</p>
    <p>Quantidade mínima: {{ $inventory->minimum_quantity }}</p>

    <a href="{{ route('inventory') }}" type="button" class="btn btn-dark">Voltar</a>
</div>

@endsection