<?php

namespace App\Models;

use Database\Factories\DriverFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    protected static function newFactory()
    {
        return DriverFactory::new();
    }
}
