@extends('layouts.master')

@section('custom_head')
    <link href="{{ asset('css/consultant/newReq.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title', 'HyPCS')

@section('navbar')
    @include('layouts.navbarConsultant')
@endsection

@section('content')
    <br> <br> <br>
    <h3><span class="label label-default" id="firstAdd">Nuevas Solicitudes</span></h3>
    <div class="table-responsive">
        <table class="table">
            <tr class="tableRow">
                <td> Cliente </td>
                <td> Codigo </td>
                <td> Fecha Req. </td>
                <td> Asunto </td>
                <td> Descr. </td>
                <td> ¿Agendada? </td>
            </tr>
            @foreach($requests as $request)
                <tr>
                <form action="{{ route('schedReq') }}" method="GET">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_request" value="{{$request->id_request}}" />
                    <td>{{ $request->name }}</td>
                    <td>{{ $request->code }}</td>
                    <td>{{ substr($request->created_at, 0, 10) }}</td>
                    <td>{{ $request->subject }}</td>
                    <td>{{ $request->description }}</td>
                    <td><button type="submit" class="btn btn-default">Agendar Visita</button></td>
                </form>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
