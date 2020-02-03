@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Olá, {{ $user->name }}!</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
        <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
    </div>
</div>

<canvas class="my-4 w-100" id="myChart" width="1000" height="250"></canvas>

<hr>

<h2 class="text-center py-5">Produtos disponíveis</h2>

<div class="table-responsive pb-5">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Vendidos</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($inventories as $inventory)
            <tr>
                <td>{{ $inventory->id }}</td>
                <td>{{ $inventory->product->name }}</td>
                <td>R$ {{ $inventory->product->price }}</td>
                <td>{{ $inventory->available_quantity }}</td>
                <td>x</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Nenhum produto encontrado...</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex">
        <div class="mx-auto py-2">
            {{ $inventories->links() }}
        </div>
    </div>
</div>

@endsection
