<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyHomeDelivery extends Model
{
    use HasFactory;

    protected $table = 'micro_enquiry';

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'company',
        'domain',
        'street_address1',
        'street_address2',
        'city',
        'state',
        'pin',
        'approval',
        'status',
    ];
}
