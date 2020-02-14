@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Olá, {{ $user->name }}!</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
        <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
    </div>
</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header d-flex justify-content-between">
                Fornecedores
                <span data-feather="truck"></span>
            </div>
            <div class="card-body text-center">
                <h3 class="card-title">{{ $suppliercount }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-header d-flex justify-content-between">
                Produtos
                <span data-feather="package"></span>
            </div>
            <div class="card-body text-center">
                <h3 class="card-title">{{ $productcount }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-header d-flex justify-content-between">
                Estoque
                <span data-feather="archive"></span>
            </div>
            <div class="card-body text-center">
                <h3 class="card-title">{{ $inventorycount }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white bg-danger mb-3">
            <div class="card-header d-flex justify-content-between">
                Clientes
                <span data-feather="users"></span>
            </div>
            <div class="card-body text-center">
                <h3 class="card-title">{{ $customercount }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="col-md-6">
        <canvas class="my-4 w-100" id="myChart1"></canvas>
    </div>

    <div class="col-md-6">
        <canvas class="my-4 w-100" id="myChart2"></canvas>
    </div>
</div>

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
                <td>{{ $inventory->sold_quantity }}</td>
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

@section('scripts')
<script>
    // Graphs myChart1
    var ctx = document.getElementById('myChart1')
    // eslint-disable-next-line no-unused-vars
    var myChart1 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'Janeiro',
                'Fevereiro',
                'Março',
                'Abril',
                'Maio',
                'Junho',
                'Julho',
                'Agosto',
                'Setembro',
                'Outubro',
                'Novembro',
                'Dezembro'
            ],
            datasets: [{
                data: [
                    10,
                    13,
                    21,
                    18,
                    25,
                    15,
                    17,
                    27,
                    28,
                    20,
                    22,
                    29
                ],
                lineTension: 0,
                backgroundColor: '#1E90FF',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                pointBackgroundColor: '#007bff'
            }]
        },
        options: {
            responsive: true
        }
    });

    // Graphs myChart2
    var ctx = document.getElementById('myChart2')
    // eslint-disable-next-line no-unused-vars
    var myChart2 = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [
                'Vermelho',
                'Verde',
                'Blue'
            ],
            datasets: [{
                data: [
                    50,
                    30,
                    20
                ],
                backgroundColor: ['#B22222', '#228B22', '#007bff'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    })
</script>
@endsection