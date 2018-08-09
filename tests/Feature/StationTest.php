<?php

namespace Tests\Feature;

use App\Station;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StationTest extends TestCase
{
    public function testsStationsAreCreatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'name' => 'Station Name',
            'lat' => 58.378718,
            'long' => 26.730757,
            'company_id' => 1,
        ];

        $this->json('POST', '/api/stations', $payload, $headers)
            ->assertStatus(200)
            ->assertJson(['id' => 1, 'title' => 'Station Name', 'lat' => 58.378718, 'long' => 26.730757, 'company_id' => 1]);
    }

    public function testsStationsAreUpdatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $station = factory(Station::class)->create([
            'name' => 'Station Name',
            'lat' => 58.378718,
            'long' => 26.730757,
            'company_id' => 1,
        ]);

        $payload = [
            'name' => 'Station Name',
            'lat' => 58.378718,
            'long' => 26.730757,
            'company_id' => 1,
        ];

        $response = $this->json('PUT', '/api/stations/' . $station->id, $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'id' => 1,
                'name' => 'Station Name',
                'lat' => 58.378718,
                'long' => 26.730757,
                'company_id' => 1,
            ]);
    }

    public function testsStationsAreDeletedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $station = factory(Station::class)->create([
            'name' => 'Station Name',
            'lat' => 58.378718,
            'long' => 26.730757,
            'company_id' => 1,
        ]);

        $this->json('DELETE', '/api/stations/' . $station->id, [], $headers)
            ->assertStatus(204);
    }

    public function testStationsAreListedCorrectly()
    {
        factory(Station::class)->create([
            'name' => 'Station Name',
            'lat' => 58.378718,
            'long' => 26.730757,
            'company_id' => 1,
        ]);

        factory(Station::class)->create([
            'name' => 'Station Name',
            'lat' => 58.378718,
            'long' => 26.730757,
            'company_id' => 1,
        ]);

        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];

        $response = $this->json('GET', '/api/stations', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                [ 'name' => 'Station Name', 'lat' => 58.378718, 'long' => 26.730757, 'company_id' => 1],
                [ 'name' => 'Station Name2', 'lat' => 58.378718, 'long' => 26.730757, 'company_id' => 1]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'name', 'lat', 'long', 'company_id', 'created_at', 'updated_at'],
            ]);
    }

}
