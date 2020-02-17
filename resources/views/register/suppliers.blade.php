@extends('layouts.app')

@section('content')

<div class="container py-5">
    <h4 class="text-center">Cadastrar</h4>

    @include('alerts.messages')

    <form method="post" action="{{ route('suppliers.store') }}">
        @csrf
        <div class="form-group">
            <label for="Input1">Nome</label>
            <input type="text" class="form-control" id="Input1" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="Input2">Telefone</label>
            <input type="text" class="form-control phone" id="Input2" name="phone" value="{{ old('phone') }}">
        </div>

        <div class="form-group">
            <label for="Input3">E-mail</label>
            <input type="email" class="form-control" id="Input3" name="email" value="{{ old('email') }}">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-info">Salvar</button>
        </div>
    </form>
</div>

<hr>

<h4 class="text-center py-5">Fornecedores</h4>

<div class="table-responsive pb-5">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($suppliers as $supplier)
            <tr>
                <td>{{ $supplier->id }}</td>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->phone }}</td>
                <td>{{ $supplier->email }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('supplier.edit', $supplier->id) }}" type="button" class="btn btn-outline-dark btn-sm mr-1"><span data-feather="edit"></span></a>

                        <form method="post" action="{{ route('supplier.destroy', $supplier->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-dark btn-sm" onclick="return confirm('Tem certeza que deseja excluir este fornecedor?')"><span data-feather="trash-2"></span></button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Nenhum fornecedor encontrado...</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex">
        <div class="mx-auto py-2">
            {{ $suppliers->links() }}
        </div>
    </div>
</div>

@endsection