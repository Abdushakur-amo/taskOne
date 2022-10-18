<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\Driver;
use Tests\TestCase;

class CarsTest extends TestCase
{
    public function test_get_all_cars()
    {
        $response = $this->get('/api/cars');
        $response->assertStatus(200);
    }

    public function test_get_all_unused_cars()
    {
        $response = $this->get('/api/cars/unused');
        $response->assertStatus(200);
    }

    public function test_store_car()
    {
        $car = Car::factory()->create();
        $response = $this->post('/api/cars', ["name" => $car->name]);

        $response->assertStatus(200);
    }

    public function test_update_car()
    {
        $car = Car::first();
        $response = $this->put('/api/cars', ["id" => $car->id, "name" => $car->name]);

        $response->assertStatus(200);
    }

    public function test_store_car_with_driver()
    {
        $car = Car::factory()->create();
        $driver = Driver::factory()->create();
        $response = $this->post('/api/cars/with/driver', ["name" => $car->name, "driver_name" => $driver->name]);

        $response->assertStatus(200);
    }

    public function test_delete_car()
    {
        $car = Car::first();
        $response = $this->delete('/api/cars/' . $car->id);

        $response->assertStatus(200);
    }

}
