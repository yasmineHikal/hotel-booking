    {{-- The best athlete wants his opponent at his best. --}}

    <!-- Example single danger button -->
    <div>
        @if($cardVisible)
        <div class="card">
            <div class="card-body">
             <span class="badge bg-secondary"> {{ $request->user->name }} </span>    {{__('requested this room')}}
            </div>
            <div class="card-body">
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <button type="button" wire:click="approveRequest" class="btn btn-success">{{__('Approve')}}</button>

                <button type="button" wire:click="rejectRequest" class="btn btn-danger">{{__('Reject')}}</button>
            </div>
            </div>
        </div>
        @endif

    </div>


