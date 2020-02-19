@extends('layouts.app')

@section('content')

<h4 class="text-center py-5">Estoque</h4>

<div class="table-responsive pb-5">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Item</th>
                <th>Quantidade mínima</th>
                <th>Quantidade disponível</th>
                <th>Quantidade vendida</th>
                <th>Ações</th>
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
                    <div class="d-flex">
                        <a href="{{ route('inventory.edit', $inventory->id) }}" type="button" class="btn btn-outline-dark btn-sm mr-1"><span data-feather="edit"></span></a>

                        <form method="post" action="{{ route('inventory.destroy', $inventory->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-dark btn-sm" onclick="return confirm('Tem certeza que deseja excluir este item?')"><span data-feather="trash-2"></span></button>
                        </form>
                    </div>
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