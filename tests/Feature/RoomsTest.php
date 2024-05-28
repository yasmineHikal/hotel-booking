<?php

namespace Tests\Feature;

use App\Livewire\BookRoom;
use App\Livewire\ChangeRoomStatus;
use App\Livewire\ClientRequest;
use App\Models\Request;
use App\Models\Room;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class RoomsTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_rooms_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/rooms');

        $response->assertOk();

        $response->assertStatus(200);
    }


    public function test_search_in_rooms(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/rooms', [
                'q' => 'laborum',
            ]);

        $response->assertOk();

        $response->assertStatus(200);
    }

    public function test_change_room_status_livewire()
    {
        $room = Room::factory()->create();
        Livewire::test(ChangeRoomStatus::class,['room'=>$room])
//            ->call('updatedSelectedValue',[1])
//            ->set('selectedValue',1)
//            ->assertDispatched('refreshContent')
//            ->assertDispatched('RequestBook.{room.id}',room_id:$room)
            ->assertStatus(200);

    }


    public function test_book_room_livewire()
    {
        $room = Room::factory()->create();
        Livewire::test(BookRoom::class,['room'=>$room])
            ->assertStatus(200);

    }

    public function test_client_request_livewire()
    {
        $room = Room::factory()->create();
        $user = User::factory()->create();
        $request = Request::create([
            'room_id' => $room->id,
            'user_id' => $user->id,
            'status' => 1,

        ]);
        Livewire::test(ClientRequest::class,['request'=>$request])
            ->assertStatus(200);

    }


}
