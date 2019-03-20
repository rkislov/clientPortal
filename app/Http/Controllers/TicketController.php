<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mailers\AppMailer;
use App\Priority;
use App\Status;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function userTickets()
    {

        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(20);
        //$categories = Category::all();
        //$priorities = Priority::all();
        //$statuses = Status::all();

        return view('tickets.user_tickets', compact('tickets'));

    }
    public function create()
    {
        $categories = Category::all();
        $priorities = Priority::all();


        return view('tickets.create', compact('categories','priorities'));
    }

   //public function store(Request $request, AppMailer $mailer)
    public function store(Request $request)
    {
        $this->validate($request,[
           'title' => 'required',
           'category'=> 'required',
           'priority'=>'required',
           'message'=> 'required'
        ]);
        $status = '1';
        $ticket = new Ticket([
           'title' => $request->input('title'),
           'user_id' => Auth::user()->id,
            'ticket_id'=> strtoupper(str_random(10)),
            'category_id'=> $request->input('category'),
            'priority_id'=> $request->input('priority'),
            'message'=>$request->input('message'),
            'status_id' => $status
        ]);

        $ticket->save();
      //  $mailer->sendTicketInformation(Auth::user(), $ticket);
        return redirect()->back()->with("status","Заявка #$ticket->ticket_id добавлена");
    }
    public function show($ticket_id)
    {
        $ticket=Ticket::where('ticket_id',$ticket_id)->firstOrFail();

        return view('tickets.show', compact('ticket'));
    }

}
