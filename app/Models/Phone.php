<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = ["phone"];

    public function personal()
    {
        return $this->belongsTo(Personal::class);
    }
}
