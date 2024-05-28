<?php

namespace App\Livewire;

use App\Enums\RoomStatus;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class ClientRequest extends Component
{
    use LivewireAlert;

    public $request;
    public $cardVisible = true;

    public function mount($request)
    {
        $this->request = $request;
    }

    public function approveRequest()
    {
        $this->request->update([
            'status' => RoomStatus::Booked
        ]);
        $this->request->room->update([
            'status' => RoomStatus::Booked
        ]);
        $this->cardVisible = false;
        $this->dispatch('roomBooked', room_id: $this->request->room);
        $this->alert('success', 'Request approved');

    }

    public function rejectRequest()
    {
        $this->request->update([
            'status' => RoomStatus::Available
        ]);
        $this->request->room->update([
            'status' => RoomStatus::Available
        ]);
        $this->cardVisible = false;
        $this->dispatch('roomBooked', room_id: $this->request->room);
        $this->alert('success', 'Request rejected');

    }

    public function render()
    {
        return view('livewire.client-request');
    }


}
