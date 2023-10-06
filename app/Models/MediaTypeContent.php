<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaTypeContent extends Model
{
    use HasFactory;

    protected $table = 'media_content_type';

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];
}
