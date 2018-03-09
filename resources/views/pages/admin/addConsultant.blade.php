@extends('layouts.master')

@section('custom_head')
    <link href="{{ asset('css/admin/addConsultant.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title', 'HyPCS')

@section('navbar')
    @include('layouts.navbarAdmin')
@endsection

@section('content')
    <br> <br> <br>
    <div>
        <form action="{{ route('addConsultantDB') }}" method="POST">
            {{ csrf_field() }}
            <div class="pull-left nuevoConsultor">
                <h3><span class="label label-default" id="firstAdd">Nuevo Consultor</span></h3>
                <h5 class="adminMarginAdd">Nombre: </h5>
                <div class="input-group">
                    <input name="firstname" type="text" class="form-control inputBox" placeholder="Nombre del Consultor" aria-describedby="basic-addon2">
                </div>
                <h5 class="adminMarginAdd">Apellido: </h5>
                <div class="input-group">
                    <input name="lastname" type="text" class="form-control inputBox" placeholder="Apellido del Consultor" aria-describedby="basic-addon2">
                </div>
                <h5 class="adminMarginAdd">E-mail: </h5>
                <div class="input-group">
                    <input name="email" type="text" class="form-control inputBox" placeholder="correo electronico" aria-describedby="basic-addon2">
                </div>
                <h5 class="adminMarginAdd">Nivel: </h5>
                <div class="input-group">
                    <select class="form-control" id="selectConsId" name="nivel">
                        <option value="Junior">Junior</option>
                        <option value="Senior">Senior</option>
                        <option value="Expertise">Expertise</option>
                    </select>
                </div>
            </div>
            <div class="pull-right detallesCuenta">
                <h3><span class="label label-default" id="firstAdd">Detalles de la cuenta</span></h3>
                <h5 class="adminMarginAdd">Usuario: </h5>
                <div class="input-group">
                    <input name="username" type="text" class="form-control inputBox" placeholder="User" aria-describedby="basic-addon2">
                </div>
                <h5 class="adminMarginAdd">Pasword: </h5>
                <div class="input-group">
                    <input name="password" type="text" class="form-control inputBox" placeholder="Password" aria-describedby="basic-addon2">
                </div>
                <button type="submit" class="btn btn-default">Agregar</button></td>
            </div>
        </form>
    </div>
@endsection
