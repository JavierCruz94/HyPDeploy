@extends('layouts.master')

@section('custom_head')
    <link href="{{ asset('css/admin/assignReq.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title', 'HyPCS')

@section('navbar')
    @include('layouts.navbarAdmin')
@endsection

@section('content')
    <br> <br> <br>
    <h3><span class="label label-default" id="firstAdd">Asignar Solicitudes</span></h3>
    <div class="table-responsive">
        <table class="table">
            <tr class = "tableRow">
                <td> Cliente </td>
                <td> Fecha Req. </td>
                <td> Asunto </td>
                <td> Descr. </td>
                <td> Gravedad </td>
                <td> Limite</td>
                <td> Consultor </td>
                <td> Asignar </td>
            </tr>
            @foreach($requests as $request)
                <tr>
                    <form action="{{ route('assignRequestToConsultant') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_request" value="{{$request->id_request}}" />
                        <td>{{ $request->name }}</td>
                        <td>{{ substr($request->created_at, 0, 10) }}</td>
                        <td>{{ $request->subject }}</td>
                        <td>{{ $request->description }}</td>
                        <td>{{ $request->importance }}</td>
                        <td>{{$request->deadline}}</td>
                        <td>
                            <select class="form-control" id="selectConsId" name="selectCons" style="max-width: 180px">
                                @foreach($consultants as $consultant)
                                    <option value="{{$consultant->id_consultant}}">{{$consultant->firstname}} {{$consultant->lastname}} ({{$consultant->cantidad}})</option>
                                @endforeach
                            </select>
                        </td>
                        <td><button type="submit" class="btn btn-default">Asignar</button></td>
                    </form>
                </tr>
            @endforeach
        </table>
    </div>

    <h3><span class="label label-default" id="firstAdd">Solicitudes con Consultor</span></h3>
    <div class="table-responsive">
        <table class="table">
            <tr class = "tableRow">
                <td> Cliente </td>
                <td> Codigo </td>
                <td> Fecha Req. </td>
                <td> Asunto </td>
                <td> Descr. </td>
                <td>Gravedad</td>
                <td> Consultor </td>
                <td> Cambiar Consultor </td>
            </tr>
            @foreach($requestsAssigned as $requestAssign)
                <tr>
                    <form action="{{ route('changeConsultant') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_request" value="{{$requestAssign->id_request}}" />
                        <td>{{ $requestAssign->name }}</td>
                        <td>{{ $requestAssign->code }}</td>
                        <td>{{ substr($requestAssign->created_at, 0, 10) }}</td>
                        <td>{{ $requestAssign->subject }}</td>
                        <td>{{ $requestAssign->description }}</td>
                        <td>{{ $requestAssign->importance }}</td>
                        <td>{{ $requestAssign->firstname }} {{$requestAssign->lastname}}</td>
                        <td><button type="submit" class="btn btn-default">Cambiar</button></td>
                    </form>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
