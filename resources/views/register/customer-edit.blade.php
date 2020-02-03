@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h2 class="text-center">Atualizar cliente</h2>

    @include('alerts.messages')

    <form method="post" action="{{ route('customer.update', $customer->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="Input1">Nome</label>
            <input type="text" class="form-control" id="Input1" name="name" value="{{ old('name') ?? $customer->name }}">
        </div>

        <div class="form-group">
            <label for="Input2">Telefone</label>
            <input type="text" class="form-control" id="Input2" name="phone" value="{{ old('phone') ?? $customer->phone }}">
        </div>

        <div class="form-group">
            <label for="Input2">E-mail</label>
            <input type="email" class="form-control" id="Input2" name="email" value="{{ old('email') ?? $customer->email }}">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
</div>

<hr>

<h2 class="text-center py-5">Informações do cliente</h2>

<div class="pb-5">
    <p>ID: {{ $customer->id }}</p>
    <p>Nome: {{ $customer->name }}</p>
    <p>Telefone: {{ $customer->phone }}</p>
    <p>E-mail: {{ $customer->email }}</p>

    <a href="{{ route('customers') }}" type="button" class="btn btn-dark">Voltar</a>
</div>

@endsection