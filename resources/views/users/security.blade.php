@extends('dashboard.app')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

@endsection