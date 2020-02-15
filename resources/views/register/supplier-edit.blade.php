@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h2 class="text-center">Atualizar fornecedor</h2>

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
            <input type="text" class="form-control" id="Input2" name="phone" value="{{ old('phone') ?? $supplier->phone }}">
        </div>

        <div class="form-group">
            <label for="Input3">E-mail</label>
            <input type="email" class="form-control" id="Input3" name="email" value="{{ old('email') ?? $supplier->email }}">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-info">Salvar</button>
        </div>
    </form>
</div>

<hr>

<h2 class="text-center py-5">Informações do fornecedor</h2>

<div class="pb-5">
    <p>ID: {{ $supplier->id }}</p>
    <p>Nome: {{ $supplier->name }}</p>
    <p>Telefone: {{ $supplier->phone }}</p>
    <p>E-mail: {{ $supplier->email }}</p>

    <a href="{{ route('suppliers') }}" type="button" class="btn btn-dark">Voltar</a>
</div>

@endsection