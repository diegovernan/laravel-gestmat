@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifique o seu e-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Um novo link de verificação foi enviado para o seu e-mail.
                        </div>
                    @endif

                    Antes de prosseguir, por favor procure pelo link de verificação no seu e-mail.
                    Se você não recebeu o e-mail,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">clique aqui para solicitar outro</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
