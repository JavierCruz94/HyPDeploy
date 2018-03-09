@extends('layouts.navbar')

@section('navTitle')
    <a class="navbar-brand" href="#">Consultor</a>
@endsection

@section('navbarType')
    <ul class="nav navbar-nav navbar-right">
        <li ><a href="/newReq">Nuevas Solicitudes</a></li>
        <li><a href="/regVisit">Registrar Visita</a></li>
        <li><a href="/calendarCons">Calendario</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-default" style="margin-top: .60em">Logout</button>
            </form>
        </li>
    </ul>
@endsection