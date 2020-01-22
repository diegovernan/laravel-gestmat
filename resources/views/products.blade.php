@extends('dashboard.app')

@section('content')

<div class="container py-5">
    <h2 class="text-center">Cadastrar produto</h2>

    @include('alerts.messages')

    <form method="post">
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

<h2 class="text-center py-5">Produtos cadastrados</h2>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1,001</td>
                <td>Lorem</td>
                <td>ipsum</td>
                <td>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></button>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="trash-2"></span></button>
                </td>
            </tr>
            <tr>
                <td>1,002</td>
                <td>amet</td>
                <td>consectetur</td>
                <td>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></button>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="trash-2"></span></button>
                </td>
            </tr>
            <tr>
                <td>1,003</td>
                <td>Integer</td>
                <td>nec</td>
                <td>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></button>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="trash-2"></span></button>
                </td>
            </tr>
            <tr>
                <td>1,003</td>
                <td>libero</td>
                <td>Sed</td>
                <td>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></button>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="trash-2"></span></button>
                </td>
            </tr>
            <tr>
                <td>1,004</td>
                <td>dapibus</td>
                <td>diam</td>
                <td>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></button>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="trash-2"></span></button>
                </td>
            </tr>
            <tr>
                <td>1,005</td>
                <td>Nulla</td>
                <td>quis</td>
                <td>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></button>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="trash-2"></span></button>
                </td>
            </tr>
            <tr>
                <td>1,006</td>
                <td>nibh</td>
                <td>elementum</td>
                <td>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></button>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="trash-2"></span></button>
                </td>
            </tr>
            <tr>
                <td>1,007</td>
                <td>sagittis</td>
                <td>ipsum</td>
                <td>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></button>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="trash-2"></span></button>
                </td>
            </tr>
            <tr>
                <td>1,008</td>
                <td>Fusce</td>
                <td>nec</td>
                <td>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></button>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="trash-2"></span></button>
                </td>
            </tr>
            <tr>
                <td>1,009</td>
                <td>augue</td>
                <td>semper</td>
                <td>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></button>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="trash-2"></span></button>
                </td>
            </tr>
            <tr>
                <td>1,010</td>
                <td>massa</td>
                <td>Vestibulum</td>
                <td>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></button>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="trash-2"></span></button>
                </td>
            </tr>
            <tr>
                <td>1,011</td>
                <td>eget</td>
                <td>nulla</td>
                <td>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></button>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="trash-2"></span></button>
                </td>
            </tr>
            <tr>
                <td>1,012</td>
                <td>taciti</td>
                <td>sociosqu</td>
                <td>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></button>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="trash-2"></span></button>
                </td>
            </tr>
            <tr>
                <td>1,013</td>
                <td>torquent</td>
                <td>per</td>
                <td>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></button>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="trash-2"></span></button>
                </td>
            </tr>
            <tr>
                <td>1,014</td>
                <td>per</td>
                <td>inceptos</td>
                <td>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></button>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="trash-2"></span></button>
                </td>
            </tr>
            <tr>
                <td>1,015</td>
                <td>sodales</td>
                <td>ligula</td>
                <td>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="edit"></span></button>
                    <button type="button" class="btn btn-outline-dark btn-sm"><span data-feather="trash-2"></span></button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection