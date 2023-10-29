<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\User;
use App\Services\AdminServices;
use App\Services\BoardServices;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Inertia\Response;

class AdminController extends Controller
{

    protected $admin;
    /**
     * BoardController constructor.
     */
    public function __construct(AdminServices $admin)
    {
        $this->admin = $admin;
    }

    /**
     * Display the specified resource.
     */
    public function mostUserHasBoard(): Response
    {
        return $this->admin->getUserMostBoards();
    }

}
