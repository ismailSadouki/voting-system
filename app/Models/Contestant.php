<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'unique_url',
        'number_of_votes'
    ];
}
