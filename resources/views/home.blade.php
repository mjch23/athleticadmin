@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mensaje</div>

                <div class="card-body">
                    
                            @if(Auth::user()->hasRole('admin'))
                                <h3>Acceso como administrador</h3>

                            @else
                                <h3>Acceso usuario</h3>
                            @endif

                    <h4> Bienvenido al Sistema </h4>

            <form action="{{route('panel.index')}}" method="get">
            <div>
            <button type="submit" class="btn btn-primary btn-lg btn-block" > Ingresar </button>
            </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
