<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationItem extends Model
{
    protected $table = 'education_items';
    protected $fillable = ['last_name',
            'first_name',
            'patro_name',
            'email',
            'phone_number',
            'speciality',
            'address_home',
            'address_work',
            'picked_month',
            'picked_time',
            'terms'];
}
