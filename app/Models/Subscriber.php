<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'password',
        'phone_number',
        'domain_id',
        'status_id',
        'features_id',
    ];
}
