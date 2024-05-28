<div>
    {{-- Be like water. --}}
    @if($buttonVisible && $roomStatus == \App\Enums\RoomStatus::Available)
        <div>
    <button wire:click="bookRoom" type="button" class="btn btn-primary">{{__('book now')}}</button>
        </div>
    @endif
</div>
