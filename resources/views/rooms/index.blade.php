<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rooms') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header dark:bg-gray-900 text-white">
                        <h3>{{__('Rooms listing')}}</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('room.index') }}" method="get">
                            <div class="row">
                                <div class="col-md-10">
                                    <input type="text" class="form-control mb-3" placeholder="search" name="q" value="{{request()->q}}">
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" class="form-control mb-3" value="Search">
                                </div>
                            </div>
                        </form>
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Price')}}</th>
                                <th scope="col">{{__('Room Type')}}</th>
                                <th scope="col">{{__('Room Status')}}</th>
                                <th scope="col">{{__('Action')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $rooms as $room)
                                <tr>
                                    <th scope="row">{{$room->id}}</th>
                                    <td>{{$room->name}}</td>
                                    <td>{{$room->price}}</td>
                                    <td>
                                        <span class="badge text-bg-{{$room->type_colour}}">{{$room->type}}</span>
                                    </td>
                                    <td>
                                        <livewire:change-room-status :room="$room"  :key="$room->id"/>
                                    </td>
                                    <td>

                                        <livewire:book-room :room="$room"  :key="$room->id"/>


                                        @if($room->request)
                                        <livewire:client-request :request="$room->request" :key="$room->request->id" />
                                        @endif



                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-12">{{$rooms->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
</x-app-layout>
