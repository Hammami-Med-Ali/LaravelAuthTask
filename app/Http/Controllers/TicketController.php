<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function create(Request $REQUEST)
    {
        $tickets = new Ticket();
        $tickets->id = $REQUEST->input('id');
        $tickets->category = $REQUEST->input('category');
        $tickets->subject = $REQUEST->input('subject');
        $tickets->description = $REQUEST->input('description');
      
        $tickets->save();
        return response()->json($tickets);
        

    }
    public function showbyid($id) 
    {
        $tickets = Ticket::find($id);
        return response()->json($tickets); 

    }
    public function update(Request $REQUEST,$id) 
    {
        $tickets = Ticket::find($id);
       /* var_dump($REQUEST);
       die(); */
       $tickets->category = $REQUEST->input('id');
        $tickets->category = $REQUEST->input('category');
        $tickets->subject = $REQUEST->input('subject');
        $tickets->description = $REQUEST->input('description');
        $tickets->save();
        return response()->json($REQUEST);
       
    }
}
