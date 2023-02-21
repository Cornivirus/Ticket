@extends('adminlte::page')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Ticket Update</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Ticket Update</li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Actualiza de Ticket</h3>
    </div>
    <div class="card-body">
        @foreach($data as $ticket)
            @foreach ($ticket as $item)
                <form method="POST" action="{{ route('ticket.update') }}" aria-label="{{ __('Editar Registro') }}">
                    <input type="hidden" value="{{$item['no_ticket']}}" name="no_ticket" id="no_ticket">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputBorder">Username</label>
                        <input type="text" class="form-control form-control-border" id="user_name" name="user_name" placeholder="username" value="{{$item['user_name']}}">
                    </div>
                    <div class="form-group">
                        <label for="system_name">System Name</label>
                        <select class="custom-select form-control-border border-width-2" id="system_name" name="system_name">
                            <option value="{{$item['system_name']}}">{{$item['system_name']}}</option>
                            <option value="AMX_CONVERTOR_GPRS">AMX_CONVERTOR_GPRS</option>
                            <option value="AMX_GEOLOCATION">AMX_GEOLOCATION</option>
                            <option value="AMX_TAP_CONVERTORCDR">AMX_TAP_CONVERTORCDR</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <select class="custom-select form-control-border border-width-2" id="priority" name="priority">
                            <option value="{{$item['priority']}}" selected >{{$item['priority']}}</option>
                            <option value="1">Alto</option>
                            <option value="2">Medio</option>
                            <option value="3">Bajo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="custom-select form-control-border border-width-2" id="status" name="status">
                            <option value="{{$item['status']}}" selected>{{$item['status']}}</option>
                            <option value="1">Pendiente</option>
                            <option value="2">En Trámite</option>
                            <option value="3">Atendido</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" id="description" name="description" rows="6" placeholder="Enter ...">{{$item['description']}}</textarea>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-block btn-success">Update</button>
                    </div>
                </form>
            @endforeach
        @endforeach

    </div>
</div>
@endsection
