<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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



}
