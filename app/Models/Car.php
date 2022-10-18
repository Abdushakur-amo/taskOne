<?php

namespace App\Models;

use Database\Factories\CarFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function driver()
    {
        return $this->hasOne(Driver::class);
    }

    protected static function newFactory()
    {
        return CarFactory::new();
    }
}
