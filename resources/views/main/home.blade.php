@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 top-home d-print-none">
    <h6>Olá, {{ $user->name }}!</h6>

    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.print()">Exportar</button>
</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 d-print-none">
    <div class="col-md-3">
        <div class="card text-white mb-2">
            <div class="card-header d-flex justify-content-between bg-dark">
                Estoque
                <span data-feather="archive"></span>
            </div>
            <div class="card-body text-center bg-secondary">
                <h3 class="card-title">{{ $inventorycount }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white mb-2">
            <div class="card-header d-flex justify-content-between bg-dark">
                Fornecedores
                <span data-feather="truck"></span>
            </div>
            <div class="card-body text-center bg-secondary">
                <h3 class="card-title">{{ $suppliercount }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white mb-2">
            <div class="card-header d-flex justify-content-between bg-dark">
                Produtos
                <span data-feather="package"></span>
            </div>
            <div class="card-body text-center bg-secondary">
                <h3 class="card-title">{{ $productcount }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card text-white mb-2">
            <div class="card-header d-flex justify-content-between bg-dark">
                Clientes
                <span data-feather="users"></span>
            </div>
            <div class="card-body text-center bg-secondary">
                <h3 class="card-title">{{ $customercount }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3">
    <div class="col-md-6 mb-2">
        <canvas class="w-100" id="myChart1"></canvas>
    </div>

    <div class="col-md-3 mb-2">
        <canvas class="w-100" id="myChart2"></canvas>
    </div>

    <div class="col-md-3 mb-2">
        <canvas class="w-100" id="myChart3"></canvas>
    </div>
</div>

<!-- <div class="py-3 d-print-block">
    <canvas class="my-4 w-100" id="myChart" height="380em"></canvas>
</div> -->

<div class="table-responsive py-3 d-print-block">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Produto</th>
                <th>Preço de custo</th>
                <th>Preço de venda</th>
                <th>Estoque</th>
                <th>Vendidos</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($inventories as $inventory)
            <tr>
                <td>{{ $inventory->id }}</td>
                <td>{{ $inventory->product->name }}</td>
                <td>R$ {{ $inventory->product->cost_price }}</td>
                <td>R$ {{ $inventory->product->sale_price }}</td>
                <td>{{ $inventory->available_quantity }}</td>
                <td>{{ $inventory->sold_quantity }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Nenhum produto encontrado...</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex">
        <div class="mx-auto py-3">
            {{ $inventories->links() }}
        </div>
    </div>
</div>

@endsection

@section('chartjs')
<script>
    var ctx1 = document.getElementById('myChart1')
    // Gráfico 1
    var myChart1 = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: <?= json_encode($months_values); ?>,
            datasets: [{
                    data: <?= json_encode($supplierorder_values); ?>,
                    label: 'Pedidos',
                    lineTension: 0,
                    backgroundColor: '#71c7ec',
                    borderColor: '#1e90ff',
                    borderWidth: 1

                },
                {
                    data: <?= json_encode($customerorder_values); ?>,
                    label: 'Vendas',
                    backgroundColor: '#005073',
                    borderColor: '#1e90ff',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true
        }
    });

    var ctx2 = document.getElementById('myChart2')
    // Gráfico 2
    var myChart2 = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ['Solicitado', 'Recebido'],
            datasets: [{
                data: [<?= json_encode($all_orders); ?>, <?= json_encode($arrived_orders); ?>],
                lineTension: 0,
                backgroundColor: ['#71c7ec', '#005073'],
                borderColor: '#1e90ff',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });

    var ctx3 = document.getElementById('myChart3')
    // Gráfico 3
    var myChart3 = new Chart(ctx3, {
        type: 'pie',
        data: {
            labels: ['Despesa', 'Receita'],
            datasets: [{
                data: [<?= json_encode($income); ?>, <?= json_encode($expense); ?>],
                lineTension: 0,
                backgroundColor: ['#71c7ec', '#005073'],
                borderColor: '#1e90ff',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true
        }
    });
</script>
@endsection