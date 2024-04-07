<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MembershipItem extends Model
{
    protected $table = 'membership_items';
    protected $fillable = ['last_name',
            'first_name',
            'patro_name',
            'email',
            'phone_number',
            'date_birth',
            'place_birth',
            'address',
            'id_doc',
            'date_doc',
            'place_doc',
            'education', 
            'add_education',
            'experience',
            'interests',
            'date_member',
            'terms'];
}
