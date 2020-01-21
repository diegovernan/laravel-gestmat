@extends('dashboard.app')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <form method="post"  action="{{ route('profile.update', $user->id) }}">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="Input1">Nome</label>
            <input type="text" class="form-control" id="Input1" name="name" value="{{ old('name') ?? $user->name }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

@endsection