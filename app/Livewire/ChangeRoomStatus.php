<?php

namespace App\Livewire;

use App\Enums\RoomStatus;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Attributes\On;

class ChangeRoomStatus extends Component
{
    use LivewireAlert;

    public $selectedValue;
    public $room;
    public $available_status;

    #[On(['refreshComponent' => '$refresh', 'roomBooked'])]
    public function mount()
    {
        $this->selectedValue = RoomStatus::fromValue($this->room->status)->value; // Set the initial value
        $this->available_status = RoomStatus::mapValueToName();
    }

    public function roomBooked($room)
    {
        $this->room->refresh();
        $this->dispatch('refreshComponent');
    }

    public function updatedSelectedValue()
    {
        $this->room->update([
            'status' => $this->selectedValue
        ]);
        $this->dispatch('RequestBook.{room.id}', room_id: $this->room);
        $this->alert('success', __('Room statuses updated'));
        $this->dispatch('refreshComponent');


    }

    public function render()
    {
        return view('livewire.change-room-status');
    }
}
