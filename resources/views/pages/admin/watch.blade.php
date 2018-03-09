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
    <h3><span class="label label-default" id="firstAdd">Clientes</span></h3>
    <div class="table-responsive">
        <table class="table">
            <tr class = "tableRow">
                <td> Cliente </td>
                <td> Codigo </td>
                <td> Fecha ini </td>
                <td> Cant. Req. </td>
                <td> Ultima Req. </td>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->code }}</td>
                    <td>{{ substr($customer->created_at, 0, 10) }}</td>
                    <td>{{$customer->cantReq}}</td>
                    <td>{{substr($customer->ultReq, 0, 10)}}</td>
                </tr>
                @endforeach</td>
            </tr>



        </table>
    </div>
@endsection
