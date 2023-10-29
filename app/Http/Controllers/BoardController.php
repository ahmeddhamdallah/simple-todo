<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Services\BoardServices;
use App\Http\Requests\Board\StoreBoardRequest;
use Inertia\Response;

class BoardController extends Controller
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
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return $this->board->getBoards();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBoardRequest $request)
    {
        $this->board->storeBoard($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Board $board): Response
    {
        return $this->board->showBoard($board);
    }

}
