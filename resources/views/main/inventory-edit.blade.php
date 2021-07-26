@extends('layouts.app')

@section('content')

<h3 class="py-3">Atualizar</h3>

@include('alerts.messages')

<form method="post" action="{{ route('inventory.update', $inventory->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="Input1">Quantidade mínima</label>
        <input type="number" class="form-control" id="Input1" name="minimum_quantity" value="{{ old('minimum_quantity') ?? $inventory->minimum_quantity }}">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>

<hr>

<h3 class="py-3">Informações do item</h3>

<div class="pb-5">
    <p>ID: {{ $inventory->id }}</p>
    <p>Nome: {{ $inventory->product->name }}</p>
    <p>Quantidade mínima: {{ $inventory->minimum_quantity }}</p>
    <p>Quantidade disponível: {{ $inventory->available_quantity }}</p>
    <p>Quantidade vendida: {{ $inventory->sold_quantity }}</p>

    <a href="{{ route('inventory') }}" type="button" class="btn btn-dark">Voltar</a>
</div>

@endsection