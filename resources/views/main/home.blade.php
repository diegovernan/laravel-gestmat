@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3">
    <h6>Olá, {{ $user->name }}!</h6>

    <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3">
    <div class="col-md-3">
        <div class="card text-white mb-3">
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
        <div class="card text-white bg-info mb-3">
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
        <div class="card text-white bg-info mb-3">
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
        <div class="card text-white bg-info mb-3">
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

<div class="py-3">
    <canvas class="my-4 w-100" id="myChart" height="380em"></canvas>
</div>

<div class="table-responsive py-3">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Produto</th>
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
        <div class="mx-auto py-3">
            {{ $inventories->links() }}
        </div>
    </div>
</div>

@endsection

@section('chartjs')
<script>
    var ctx = document.getElementById('myChart')
    // Gráfico
    var myChart1 = new Chart(ctx, {
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
</script>
@endsection