@extends('adminlte::page')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Tickets List</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Ticket List</li>
            </ol>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
    <h3 class="card-title">Ticket List</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th style="width: 10px">#</th>
                <th>User name</th>
                <th>System name</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Comments</th>
                <th>Start date</th>
                <th>End date</th> 
                </tr>
            </thead>
            <tbody>

                @foreach($data as $ticket)
                    @foreach ($ticket as $item)
                    <tr>
                        <td>{{$item['no_ticket']}}</td>
                        <td>{{$item['user_name']}}</td>
                        <td>{{$item['system_name']}}</td>
                        <td>{{$item['description']}}</td>
                        <td>
                            @if ($item['priority']==1)
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-danger" style="width: 100px">{{$item['priority']}}</div>
                            </div>                                                        
                            @elseif($item['priority']==2)
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-warning" style="width: 100px">{{$item['priority']}}</div>
                            </div>                        
                            @else
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-success" style="width: 100px">{{$item['priority']}}</div>
                            </div>
                            @endif
                            
                        </td>
                        <td>{{$item['status']}}</td>
                        <td>{{$item['comments']}}</td>
                        <td>{{$item['startdate']}}</td>
                        <td>{{$item['enddate']}}</td>
                        <td>
                            <form action="{{ route('ticket.delete',$item['no_ticket']) }}" method="Post">
                                <input type="hidden" value="{{$item['no_ticket']}}" name="no_ticket" id="no_ticket">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            
                        </td>  
                        <td>
                            <form action="{{ route('ticket.editar',$item['no_ticket']) }}" method="Post">
                                <input type="hidden" value="{{$item['no_ticket']}}" name="no_ticket" id="no_ticket">
                                @csrf
                                <button type="submit" class="btn btn-warning">Edit</button>
                            </form>
                        </td>                     
                                                
                    </tr> 
                    @endforeach                   

                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
    </div>
</div>
@endsection