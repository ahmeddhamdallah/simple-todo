<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\User;
use App\Services\BoardServices;
use Illuminate\Http\Request;
use Inertia\Response;

class InviteUserToBoardController extends Controller
{

    protected $board;
    /**
     * BoardController constructor.
     */
    public function __construct(BoardServices $board)
    {
        $this->board = $board;
    }

    /**
     * Display the specified resource.
     */
    public function __invoke(Board $board, Request $request)
    {
        User::query()->where('email', 'mzulauf@example.org')->first();
        return $this->board->inviteToBoard($board, $request);
    }

}
