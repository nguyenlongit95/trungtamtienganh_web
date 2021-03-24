<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'id',
        'category_id',
        'name',
        'slug',
        'title',
        'info',
        'description',
        'author',
        'time_public',
        'status',
        'latest_reading_time',
    ];
}
