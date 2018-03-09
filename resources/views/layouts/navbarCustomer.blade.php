@extends('layouts.navbar')

@section('navTitle')
    <a class="navbar-brand" href="#">Cliente</a>
@endsection

@section('navbarType')
    <ul class="nav navbar-nav navbar-right">
        <li ><a href="/customerReq">Crear solicitud</a></li>
        <li ><a href="/customerCalendar">Calendario</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-default" style="margin-top: .60em">Logout</button>
            </form>
        </li>
    </ul>
@endsection