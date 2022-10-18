<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\Driver;
use Tests\TestCase;

class DriverTest extends TestCase
{
    public function test_get_all_drivers()
    {
        $response = $this->get('/api/drivers');
        $response->assertOk();
    }

    public function test_get_all_free_drivers()
    {
        $response = $this->get('/api/drivers/free');
        $response->assertStatus(200);
    }

    public function test_store_driver()
    {
        $driver = Driver::factory()->create();
        $response = $this->post('/api/drivers', ["name" => $driver->name]);

        $response->assertCreated();
    }

    public function test_update_driver()
    {
        $driver = Driver::first();
        $car = Car::first();
        $response = $this->put('/api/drivers', ["id" => $driver->id, "name" => $driver->name, "car_id"=> $car->id]);

        $response->assertOk();
    }

    public function test_delete_driver()
    {
        $driver = Driver::first();;
        $response = $this->delete('/api/drivers/' . $driver->id);

        $response->assertOk();
    }

}
