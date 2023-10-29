<?php

namespace App\Services;


use App\Enums\CategoryTypeEnum;
use App\Models\Board;
use App\Models\Ticket;
use Inertia\Inertia;
use Inertia\Response;

class TicketServices
{


    public function storeTicket($request) {
        $data = $request->validated();
        Ticket::create($data);
    }

    public function updateTicket($request, $ticket) {
        $data = $request->validated();
        $ticket->update($data);
    }

    public function showBoard($board): Response {
        return Inertia::render('Board/Show', [
            'board' => $board,
            'tickets' => [
                'working' => $board->tickets()->where('category', CategoryTypeEnum::WORKING)->get(),
                'done' => $board->tickets()->where('category', CategoryTypeEnum::DONE)->get()
            ],
            'user' =>   auth()->user()->creator()
        ]);
    }
}
