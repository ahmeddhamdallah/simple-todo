<?php

namespace App\Services;


use App\Enums\CategoryTypeEnum;
use App\Models\Board;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Inertia\Response;
use Inertia\Inertia;

class AdminServices
{

    public function role() {
        return auth()->user()->admin();
    }

    public function getUserMostBoards(): User {

        return User::withCount('boards')->orderBy('boards_count', 'desc')->first();
    }


    public function mostBoardHasTickets(): Collection {

        return DB::table('tickets')
            ->join('boards', 'tickets.board_id', '=', 'boards.id')
            ->select('tickets.board_id', 'boards.title', DB::raw('count(*) as total'))
            ->groupBy('board_id')
            ->orderBy('total', 'desc')
            ->limit(3)
            ->get();
    }

    public function BoardHasDoneTickets() {

        return DB::table('tickets')
            ->join('boards', 'tickets.board_id', '=', 'boards.id')
            ->select('tickets.board_id', 'boards.title', DB::raw('count(*) as total'))
            ->where('tickets.category', 2)
            ->groupBy('board_id')
            ->orderBy('total', 'desc')
            ->first();
    }

}
