<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}
