<?php

namespace App\Models\microsite;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Micro extends Authenticatable
{
    use HasFactory;

    protected $table = 'micro_users';
}
