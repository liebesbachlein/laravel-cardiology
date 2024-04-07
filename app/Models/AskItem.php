<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AskItem extends Model
{
    protected $table = 'ask_items';
    protected $fillable = ['name', 'email', 'content'];
}
