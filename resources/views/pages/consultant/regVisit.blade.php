@extends('layouts.master')

@section('custom_head')
    <link href="{{ asset('css/consultant/reqVisit.css') }}" rel="stylesheet" type="text/css">
    @if(isset($success))
        <meta http-equiv="refresh" content="1;url={{route('pdf')}}"/>
    @endif
@endsection

@section('title', 'HyPCS')

@section('navbar')
    @include('layouts.navbarConsultant')
@endsection

@section('content')
    <div class ="container">
        <h3><span class="label label-default" id="firstAdd">Registrar Visita</span></h3>
        <h5 class="adminMarginAdd">Cliente: </h5>
        <form action="{{ route('checkClientReq') }}" method="GET">
            {{ csrf_field() }}
            <div class="input-group">
                <input name="codigo" type="text" class="form-control nombreCliente" placeholder="Codigo/Nombre Cliente" aria-describedby="basic-addon2">
            </div>
        <button type="submit" class="btn btn-default button">Buscar solicitudes</button></td>
        </form>
        <div>
            <form action="{{ route('generateReport') }}" method="POST">
                {{ csrf_field() }}
                <h5 class="adminMarginAdd">Comentarios extra:</h5>
                <div class="input-group">
                    <textarea name="comentarios" class="form-control comentarios" placeholder="Comentarios" aria-describedby="basic-addon2"> {{$comments}}</textarea>
                </div>
                <h5 class="adminMarginAdd">Hora llegada:</h5>
                <div class="input-group">
                    <input name="arrivalHour" type="time"  value="{{$arrivalHour}}">
                </div>
                <h5 class="adminMarginAdd">Hora salida:</h5>
                <div class="input-group">
                    <input name="departureHour" type="time"  value="{{$departureHour}}">
                </div>
            </div>
        </div>
        <div class = "tableContainer">
            <h5 class="adminMarginAdd">Solicitudes</h5>
            <div class="table">
                <table class="table">
                    <tr class ="tableRow">
                        <td> Marcar </td>
                        <td> Asunto </td>
                    </tr>
                        @foreach($requests as $request)
                            <tr>
                                {{ csrf_field() }}
                                <input type="hidden" name="longitud" value="" />
                                <td><input name="requests[]" type="checkbox" value="{{$request->id_request}}"></td>
                                <td>{{ $request->subject }}</td>
                            </tr>
                        @endforeach
                </table>
                <button type="submit" class="btn btn-default button">Generar reporte</button>
            </form>
            </div>
        </div>

@endsection
