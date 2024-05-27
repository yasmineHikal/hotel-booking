<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

use Illuminate\View\View;

class RoomController extends Controller
{
    /**
     * Display rooms listing.
     */
    public function index(): View
    {
        $rooms =  Room::paginate(10);
        return view('rooms.index', [
            'rooms' => $rooms,
        ]);
    }



}
