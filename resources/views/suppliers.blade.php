@extends('dashboard.app')

@section('content')

<div class="container py-5">
    <h2 class="text-center">Cadastrar fornecedor</h2>

    @include('alerts.messages')

    <form method="post" action="{{ route('suppliers.store') }}">
        @csrf
        <div class="form-group">
            <label for="Input1">Nome</label>
            <input type="text" class="form-control" id="Input1" name="name" value="">
        </div>

        <div class="form-group">
            <label for="Input2">Telefone</label>
            <input type="text" class="form-control" id="Input2" name="phone" value="">
        </div>

        <div class="form-group">
            <label for="Input2">E-mail</label>
            <input type="email" class="form-control" id="Input2" name="email" value="">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </form>
</div>

<hr>

<h2 class="text-center py-5">Fornecedores cadastrados</h2>

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
                        <a href="" type="button" class="btn btn-outline-dark btn-sm mr-1"><span data-feather="edit"></span></a>

                        <form method="post" action="">
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