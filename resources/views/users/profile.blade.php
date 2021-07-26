@extends('layouts.app')

@section('content')

<h3 class="py-3">Atualizar perfil</h3>

@include('alerts.messages')

<form method="post" action="{{ route('profile.update', $user->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="Input1">Nome</label>
        <input type="text" class="form-control" id="Input1" name="name" value="{{ old('name') ?? $user->name }}">
    </div>

    <div class="text-center pb-5">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>

@endsection