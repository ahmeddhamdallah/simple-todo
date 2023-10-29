<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\Ticket\StoreTicketRequest;
use App\Http\Requests\Ticket\UpdateTicketRequest;
use App\Services\TicketServices;

class TicketsController extends Controller
{

    protected $ticket;
    /**
     * TicketsController constructor.
     */
    public function __construct(TicketServices $ticket)
    {
        $this->ticket = $ticket;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $this->ticket->storeTicket($request);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $this->ticket->updateTicket($request, $ticket);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
    }
}
