<?php

namespace App\Services;


use App\Enums\CategoryTypeEnum;
use App\Models\Board;
use App\Models\User;
use App\Notifications\InviteUserToBoard;
use Inertia\Inertia;
use Inertia\Response;

class BoardServices
{
    protected $admin;
    /**
     * BoardController constructor.
     */
    public function __construct(AdminServices $admin)
    {
        $this->admin = $admin;
    }

    public function getBoards(): Response {
        return Inertia::render('Board/Index', [
            'boards' => auth()->user()->boards()->get(),
            'mostUser' => $this->admin->getUserMostBoards(),
            'admin' =>   $this->admin->role(),
            'ticketBoard' => $this->admin->mostBoardHasTickets(),
            'mostDone' => $this->admin->BoardHasDoneTickets()
        ]);
    }

    public function storeBoard($request) {
        $data = $request->validated();
        $board = Board::create($data);
        $board->users()->attach(auth()->user()->id);
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

    public function inviteToBoardPage($board): Response {
        $userBoards = auth()->user()->boards->map(function ($board){
            return collect($board->toArray())
                ->only(['id', 'title'])
                ->all();
        });
        return Inertia::render('Board/Invite', [
            'board'      => $board,
            'user'       =>   auth()->user()->creator(),
            'userBoards' => $userBoards
        ]);
    }

    public function inviteToBoard($board, $request) {

        $user = User::query()->where('email', $request->email)->first();
        $board->users()->attach($user->id);
        $user->notify(new InviteUserToBoard($board));
    }
}
