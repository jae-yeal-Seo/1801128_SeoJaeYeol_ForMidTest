<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        "image",
        "company",
        "name",
        "year",
        "price",
        "sort",
        "appearance",
        "user_id"
    ];

    public function writer()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
