<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
class TicketController extends Controller
{
    public function index()
    {
        $url = env('URL_SERVER_API_MZ','http://localhost');

        $response = Http::get('http://192.168.193.33:8080/gettickets');
        $data     = $response->json();
        return view('tickets', compact('data'));
    }
    public function create(){
        return view('ticket');
    }
    public function store(Request $request)
    {
        $url = env('URL_SERVER_API_MZ','http://192.168.193.35:8080/');
        $date = date('Y-m-d H:i:s');
        $response = Http::post('http://192.168.193.33:8080/addticket', [ 
            'user_name'      => $request->user_name, 
            'system_name'    => $request->system_name, 
            'description'    => $request->description, 
            'priority'       => $request->priority, 
            'status'         => $request->status, 
            'comments'       => '', 
            'startdate'      => $date, 
            'enddate'        => $date,          
        ]);
        $response = $response->json();
        //dd( $response);
        //return Http::dd()->get('http://192.168.193.35:8080/index');
        $this->index();
        return redirect('/tickets');
    }
    public function editar(Request $request)
    {
        $this->index();
        $response = Http::post('http://192.168.193.33:8080/edittickets',[
            'no_ticket'  => $request->no_ticket, 
        ]);
        $data     = $response->json();
        
        return view('edit', compact('data'));
    }
    public function delete(Request $request)
    {
        
        $response = Http::post('http://192.168.193.33:8080/deleteticket',[
            'no_ticket'  => $request->no_ticket, 
        ]);
        $data     = $response->json();
        $this->index();
        return redirect('/tickets');
    }
    public function update(Request $request)
    {
        $url = env('URL_SERVER_API_MZ','http://192.168.193.35:8080/');
        $date = date('Y-m-d H:i:s');
        $response = Http::post('http://192.168.193.33:8080/updateticket', [ 
            'no_ticket'      => $request->no_ticket, 
            'user_name'      => $request->user_name, 
            'system_name'    => $request->system_name, 
            'description'    => $request->description, 
            'priority'       => $request->priority, 
            'status'         => $request->status, 
            'comments'       => '', 
            'startdate'      => $date, 
            'enddate'        => $date,          
        ]);
        $response = $response->json();
        $this->index();
        return redirect()->to('/tickets');
        //return redirect()->route('/tickets');
        
    }

}
