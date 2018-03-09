@extends('layouts.master')

@section('custom_head')
    <link href="{{ asset('css/customer/calendar.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title', 'HyPCS')

@section('navbar')
    @include('layouts.navbarCustomer')
@endsection

@section('content')
    <br> <br> <br>
    <h3><span class="label label-default" id="firstAdd">Citas agendadas</span></h3>
    <div class="table-responsive">
        <table class="table">
            <tr class = "tableRow">
                <td> Consultor </td>
                <td> Codigo </td>
                <td> Asunto </td>
                <td> Descr. </td>
                <td> Cita </td>
            </tr>
            @foreach($appointments as $appointment)
                <tr>
                    <form action="{{ route('schedReq') }}" method="GET">
                        {{ csrf_field() }}
                        <input type="hidden" name="id_request" value="{{$appointment->id_request}}" />
                        <td>{{ $appointment->firstname }} {{$appointment->lastname}}</td>
                        <td>{{ $appointment->code }}</td>
                        <td>{{ $appointment->subject }}</td>
                        <td>{{ $appointment->description }}</td>
                        <td>{{ $appointment->date_scheduled }} {{"   "}} {{substr($appointment->time_scheduled,0,5)}}</td>
                    </form>
                </tr>
            @endforeach
        </table>
    </div>@endsection
