<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMembers extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'session',
        'img',
        'phone',
        'instagram',
        'index',
        'status',
    ];
}
