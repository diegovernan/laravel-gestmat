@extends('layouts.app')

@section('content')

<h3 class="text-center py-3">Estoque</h3>

<div class="table-responsive pb-5">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Item</th>
                <th>Quantidade mínima</th>
                <th>Quantidade disponível</th>
                <th>Quantidade vendida</th>
                <th>Editar</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($inventories as $inventory)
            <tr>
                <td>{{ $inventory->id }}</td>
                <td>{{ $inventory->product->name }}</td>
                <td>{{ $inventory->minimum_quantity }}</td>
                <td class="{{ $inventory->available_quantity > $inventory->minimum_quantity ? 'text-success' : 'text-danger' }}">{{ $inventory->available_quantity }}</td>
                <td>{{ $inventory->sold_quantity }}</td>
                <td>
                    <a href="{{ route('inventory.edit', $inventory->id) }}" type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Nenhum item em estoque...</td>
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