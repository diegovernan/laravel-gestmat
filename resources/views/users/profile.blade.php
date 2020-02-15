@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h2 class="text-center">Atualizar perfil</h2>

    @include('alerts.messages')

    <form method="post" action="{{ route('profile.update', $user->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="Input1">Nome</label>
            <input type="text" class="form-control" id="Input1" name="name" value="{{ old('name') ?? $user->name }}">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-info">Salvar</button>
        </div>
    </form>
</div>

@endsection