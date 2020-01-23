@extends('dashboard.app')

@section('content')

<div class="container py-5">
    <h2 class="text-center">Editar produto</h2>

    @include('alerts.messages')

    <form method="post" action="">
        @csrf
        <div class="form-group">
            <label for="Input1">Nome</label>
            <input type="text" class="form-control" id="Input1" name="name" value="">
        </div>

        <div class="form-group">
            <label for="Input2">Preço</label>
            <input type="text" class="form-control" id="Input2" name="price" value="">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>

<hr>

<h2 class="text-center py-5">Informações do produto</h2>

<p>ID: </p>
<p>Nome: </p>
<p>Preço: R$</p>
</div>

@endsection