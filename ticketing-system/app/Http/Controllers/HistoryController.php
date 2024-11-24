<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        // $histories = Ticket::where('status', 'completed')
        //     ->latest()
        //     ->paginate(10);
        return view('adminHistory');
    }
}
