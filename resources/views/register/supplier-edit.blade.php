@extends('layouts.app')

@section('content')

<h3 class="text-center py-3">Atualizar</h3>

@include('alerts.messages')

<form method="post" action="{{ route('supplier.update', $supplier->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="Input1">Nome</label>
        <input type="text" class="form-control" id="Input1" name="name" value="{{ old('name') ?? $supplier->name }}">
    </div>

    <div class="form-group">
        <label for="Input2">Telefone</label>
        <input type="text" class="form-control phone" id="Input2" name="phone" value="{{ old('phone') ?? $supplier->phone }}">
    </div>

    <div class="form-group">
        <label for="Input3">E-mail</label>
        <input type="email" class="form-control" id="Input3" name="email" value="{{ old('email') ?? $supplier->email }}">
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>

<hr>

<h3 class="text-center py-3">Informações do fornecedor</h3>

<div class="pb-5">
    <p>ID: {{ $supplier->id }}</p>
    <p>Nome: {{ $supplier->name }}</p>
    <p>Telefone: {{ $supplier->phone }}</p>
    <p>E-mail: {{ $supplier->email }}</p>

    <div class="text-center">
        <a href="{{ route('suppliers') }}" type="button" class="btn btn-dark">Voltar</a>
    </div>
</div>

@endsection