<?php

namespace App\Livewire;

use App\Enums\RoomStatus;
use App\Models\Request;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Attributes\On;


class BookRoom extends Component
{
    use LivewireAlert;

    public $room;
    public $roomStatus;

    public $buttonVisible = true;
    #[On([ 'refresh' => '$refresh','RequestBook.{room.id}'=>'$refresh'])]

    public function bookRoom(){
        Request::create([
            'room_id' => $this->room->id,
            'user_id' => auth()->user()->id,
            'status' => RoomStatus::Pending,
        ]);
        $this->room->update([
            'status' => RoomStatus::Pending,
        ]);
        $this->roomStatus = $this->room->status;
        $this->buttonVisible = false;
        $this->alert('success', 'book request sent');
        $this->dispatch('roomBooked',room_id:$this->room);
        $this->dispatch('refresh');


    }



    public function mount()
    {
        $this->roomStatus = $this->room->status;

    }
    public function render()
    {
        return view('livewire.book-room');
    }
}
