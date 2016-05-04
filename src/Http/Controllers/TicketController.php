<?php

namespace Sparkie\Support\Http\Controllers;

use Sparkie\Support\Models\Ticket;
use Illuminate\Http\Request;

use App\Http\Requests;
use Laravel\Spark\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('dev');
    }

    public function index()
    {
        return Ticket::all();
    }
}
