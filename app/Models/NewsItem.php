<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsItem extends Model
{
    protected $table = 'news_items';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    //use HasFactory;
    protected $fillable = ['id', 'title', 'phrase', 'date_published', 'summary', 'content'];
}
