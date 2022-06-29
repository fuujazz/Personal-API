<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    public function personals()
    {
        return $this->hasMany(Personal::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
