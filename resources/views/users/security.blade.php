@extends('layouts.app')

@section('content')

<h3 class="py-3">Atualizar senha</h3>

@include('alerts.messages')

<form method="post" action="{{ route('security.update', $user->id) }}">
    @csrf
    @method('PATCH')
    <div class="form-group">
        <label for="Input2">Senha atual</label>
        <input type="password" class="form-control" id="Input2" name="old_password">
    </div>

    <div class="form-group">
        <label for="Input3">Nova senha</label>
        <input type="password" class="form-control" id="Input3" name="new_password">
    </div>

    <div class="form-group">
        <label for="Input4">Confirmação da nova senha</label>
        <input type="password" class="form-control" id="Input4" name="password_confirm">
    </div>

    <div class="text-center pb-5">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>

@endsection