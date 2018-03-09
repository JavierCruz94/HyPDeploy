@extends('layouts.navbar')

@section('navTitle')
    <a class="navbar-brand" href="#">Administrador</a>
@endsection

@section('navbarType')
    <ul class="nav navbar-nav navbar-right">
        <li ><a href="/adminWatch">Ver clientes</a></li>
        <li ><a href="/adminAddCustomer">Nuevo Cliente</a></li>
        <li><a href="/adminAddConsultant">Nuevo Consultor</a></li>
        <li><a href="/adminAssignReq">Asignacion Req</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-default" style="margin-top: .60em">Logout</button>
            </form>
        </li>
    </ul>
@endsection