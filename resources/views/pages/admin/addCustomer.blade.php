@extends('layouts.master')

@section('custom_head')
    <link href="{{ asset('css/admin/addCustomer.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('title', 'HyPCS')

@section('navbar')
    @include('layouts.navbarAdmin')
@endsection

@section('content')
    <br> <br> <br>
    <div>
        <div>
            <form action="{{ route('addCustomerDB') }}" method="POST">
                {{ csrf_field() }}
                <div class="pull-left nuevoCliente">
                    <h3><span class="label label-default" id="firstAdd">Nuevo Cliente</span></h3>
                    <h5 class="adminMarginAdd">Nombre: </h5>
                    <div class="input-group">
                        <input name="nombre" type="text" class="form-control inputBox" placeholder="Nombre del Cliente" aria-describedby="basic-addon2">
                    </div>
                    <h5 class="adminMarginAdd">Código Cliente: </h5>
                    <div class="input-group">
                        <input name="code" type="text" class="form-control inputBox" placeholder="Código del Cliente" aria-describedby="basic-addon2">
                    </div>
                    <h5 class="adminMarginAdd">Email: </h5>
                    <div class="input-group">
                        <input name="email" type="text" class="form-control inputBox" placeholder="Direccion" aria-describedby="basic-addon2">
                    </div>
                </div>
                <div class="pull-right detallesCuenta">
                    <h3><span class="label label-default" id="firstAdd">Detalles de la cuenta</span></h3>
                    <h5 class="adminMarginAdd">Usuario: </h5>
                    <div class="input-group">
                        <input name="username" type="text" class="form-control inputBox" placeholder="User" aria-describedby="basic-addon2">
                    </div>
                    <h5 class="adminMarginAdd">Password: </h5>
                    <div class="input-group">
                        <input name="password" type="text" class="form-control inputBox" placeholder="Password" aria-describedby="basic-addon2">
                    </div>
                    <button type="submit" class="btn btn-default button" >Agregar</button></td>
                </div>
             </form>
        </div>
    </div>
@endsection
