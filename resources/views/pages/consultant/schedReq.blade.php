@extends('layouts.master')

@section('custom_head')
    <link href="{{ asset('css/consultant/schedReq.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title', 'HyPCS')

@section('navbar')
    @include('layouts.navbarConsultant')
@endsection

@section('content')
    <br> <br> <br>
    <form action="{{ route('schedInDB') }}" method="POST">
        {{ csrf_field() }}
        <h3><span class="label label-default" id="firstAdd">Agendar Cita</span></h3>
        @foreach($requisitions as $requisition)
            <input type="hidden" name="id_request" value="{{$requisition->id_request}}" />
            <h5 class="adminMarginAdd">Asunto: {{$requisition->subject}}</h5>
            <h5 class="adminMarginAdd">Descripción: {{$requisition->description}}</h5>
        @endforeach
        <h5 class="adminMarginAdd">Hora asignada:</h5>
        <input name="timeSched" type="time"  value="12:00">
        <br><br>
        <input name="daySched" id="entryDate" type="date" name="entryDate" value="{{Carbon\Carbon::now()}}"><br>
        <button type="submit" class="btn btn-default button">Asignar Cita</button></td>
    </form>
@endsection
