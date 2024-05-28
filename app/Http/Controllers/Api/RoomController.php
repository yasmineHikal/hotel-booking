<?php

namespace App\Http\Controllers\Api;

use App\Enums\RoomStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\BaseController as BaseController;
use App\Models\Room;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\RoomResource;
use Illuminate\Http\JsonResponse;

class RoomController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): JsonResponse
    {
        $rooms = Room::where('status', RoomStatus::Available)->get();

        return $this->sendResponse(RoomResource::collection($rooms), 'Rooms retrieved successfully.');
    }


    public function book(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'room_id' => 'required|exists:rooms,id',
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            }
            $room = Room::find($request->room_id);
            if ($room->status != RoomStatus::Available) {
                return $this->sendError('Room is already booked.');
            }
            $room->update([
                'status' => RoomStatus::Pending
            ]);
            $room->request()->create([
               'status' => RoomStatus::Pending,
               'user_id' => $request->user()->id,
               'room_id' => $room->id
           ]);

            return $this->sendResponse( [],'Room book request sent successfully.');

        }Catch (\Exception $e) {
            return $this->sendError('Something went wrong.', ['error' => $e->getMessage()]);
        }
    }

}
