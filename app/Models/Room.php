<?php

namespace App\Models;

use App\Enums\RoomStatus;
use App\Enums\RoomType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'type',
        'status',];

    public function getStatusNameAttribute()
    {
        return  RoomStatus::fromValue($this->attributes['status'])->key;

    }

    public function getTypeAttribute()
    {
        return  RoomType::fromValue($this->attributes['type'])->key;

    }
    public function getTypeColourAttribute()
    {
        return RoomType::fromValue($this->attributes['type'])->getColour($this->attributes['type']);
    }

    public function getStatusColourAttribute()
    {
        return RoomStatus::fromValue($this->attributes['status'])->getColour($this->attributes['status']);
    }

    public function request()
    {
        return $this->hasOne(Request::class);
    }
}
