@extends('layouts.master')

@section('custom_head')
    <link href="{{ asset('css/customer/customerReq.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title', 'HyPCS')

@section('navbar')
    @include('layouts.navbarCustomer')
@endsection


@section('content')
    <div class="container">
        <form action="{{ route('addReqDB') }}" method="POST" id="formId">
            {{ csrf_field() }}
            <h3><span class="label label-default" id="firstAdd">Nueva Solicitud</span></h3>

            <div class="form-group">
                <label for="subjectId">Asunto:</label>
                <input id="subjectId" name= "subject" type="text" class="form-control" placeholder="Asunto" >
            </div>

            <div class="form-group">
                <label for="descId">Descripcion:</label>
                <textarea id="descId" name = "description" class="form-control" placeholder="Comentarios" aria-describedby="basic-addon2" > </textarea>
            </div>

            <div class="form-group">
                <label for="deadlineId">Fecha límite:</label>
                <input id="deadlineId" name = "deadline" id="entryDate" class="form-control" type="date" name="entryDate" value="{{Carbon\Carbon::now()}}">
            </div>

            <div class="form-group">
                <label for="importance">Importancia:</label>
                <select class="form-control" id="importance" name="importancia">
                    <option value="Baja">Baja</option>
                    <option value="Media">Media</option>
                    <option value="Alta">Alta</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default" style="margin-top: 1em">Solicitar</button></td>
        </form>
    </div>
@endsection
