@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 border-bottom">
    <h1 class="h2">Olá, {{ $user->name }}!</h1>

    <div class="btn-toolbar mb-2 mb-md-0">
        <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
    </div>
</div>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-3 border-bottom">
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
        <div class="mx-auto py-2">
            {{ $inventories->links() }}
        </div>
    </div>
</div>

@endsection

@section('scripts')
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
                    backgroundColor: '#B22222'
                },
                {
                    data: <?= json_encode($customerorder_values); ?>,
                    label: 'Vendas',
                    backgroundColor: '#1E90FF'
                }
            ]
        },
        options: {
            responsive: true
        }
    });
</script>
@endsection