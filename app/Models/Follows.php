<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follows extends Model
{
    use HasFactory , HasUuids;
    protected $table = 'follows';
    protected $guarded = [
        'created_at',
        'updated_at',
    ];
}
