<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

use Illuminate\View\View;

class RoomController extends Controller
{
    /**
     * Display rooms listing.
     */
    public function index(Request $request): View
    {
        $rooms =  Room::query()
            ->when(
                $request->q,
                function (Builder $builder) use ($request) {
                    $builder->where('name', 'like', "%{$request->q}%");
                }
            )->paginate(10);
        return view('rooms.index', [
            'rooms' => $rooms,
        ]);
    }



}
