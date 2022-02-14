<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'start_time',
        'end_time',
        'place',
        'program_director',
        'img',
        'status',
        'is_futures',
    ];
}
