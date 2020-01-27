<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    <span data-feather="home"></span>
                    Home
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="shopping-cart"></span>
                    Vendas
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="truck"></span>
                    Fornecedores
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::is('products') ? 'active' : '' }}" href="{{ route('products') }}">
                    <span data-feather="package"></span>
                    Produtos
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::is('inventory') ? 'active' : '' }}" href="{{ route('inventory') }}">
                    <span data-feather="archive"></span>
                    Estoque
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::is('customers') ? 'active' : '' }}" href="{{ route('customers') }}">
                    <span data-feather="users"></span>
                    Clientes
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Relatórios
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Usuário</span>
        </h6>

        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ Route::is('users.profile') ? 'active' : '' }}" href="{{ route('users.profile') }}">
                    <span data-feather="user"></span>
                    Perfil
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Route::is('users.security') ? 'active' : '' }}" href="{{ route('users.security') }}">
                    <span data-feather="lock"></span>
                    Segurança
                </a>
            </li>
        </ul>
    </div>
</nav>