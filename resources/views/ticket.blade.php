@extends('adminlte::page')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Ticket Create</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Ticket Create</li>
            </ol>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Alta de Ticket</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('ticket.store') }}" aria-label="{{ __('Register') }}">
        @csrf
            <div class="form-group">
                <label for="exampleInputBorder">Username</label>
                <input type="text" class="form-control form-control-border" id="user_name" name="user_name" placeholder="username">
            </div>
            <div class="form-group">
                <label for="system_name">System Name</label>
                <select class="custom-select form-control-border border-width-2" id="system_name" name="system_name">
                <option value="AMX_CONVERTOR_GPRS">AMX_CONVERTOR_GPRS</option>
                <option value="AMX_GEOLOCATION">AMX_GEOLOCATION</option>
                <option value="AMX_TAP_CONVERTORCDR">AMX_TAP_CONVERTORCDR</option>
                </select>
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <select class="custom-select form-control-border border-width-2" id="priority" name="priority">
                    <option value="1">Alto</option>
                    <option value="2">Medio</option>
                    <option value="3">Bajo</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="custom-select form-control-border border-width-2" id="status" name="status">
                    <option value="1" selected>Pendiente</option>
                    <option value="2">En Trámite</option>
                    <option value="3">Atendido</option>
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" id="description" name="description" rows="6" placeholder="Enter ..."></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-block btn-success">Success</button>
            </div>
        </form>

    </div>
</div>
@endsection
