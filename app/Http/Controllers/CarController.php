<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Driver;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function getAll()
    {
        return response()->json(Car::with('driver')->paginate(10));
    }

    public function getUnusedCars()
    {
        return response()->json(Car::doesntHave('driver')->paginate(10));
    }

    public function getById(int $carId)
    {
        return response()->json(Car::find($carId));
    }

    public function create(Request $request)
    {
        return response()->json(Car::create(["name" => $request->name]));
    }

    public function createWithDriver(Request $request)
    {
        $car = Car::create(["name" => $request->name]);

        $driver = Driver::create(['name' => $request->driver_name]);

        return response()->json($car->driver()->save($driver));
    }

    public function update(Request $request)
    {
        $car = Car::find($request->id);
        $car->name = $request->name;
        $car->save();

        if ($request->driver_id) {
            $driver = Driver::find($request->driver_id);
            $car->driver()->save($driver);
        }

        return response()->json('ok');
    }

    public function destroy(int $carId)
    {
        return response()->json(Car::destroy($carId));
    }
}
