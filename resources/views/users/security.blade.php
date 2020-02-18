@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h4 class="text-center">Atualizar senha</h4>

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

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>

@endsection