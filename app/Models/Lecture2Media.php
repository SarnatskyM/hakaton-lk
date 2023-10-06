<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture2Media extends Model
{
    use HasFactory;

    protected $table = 'lecture2media';

    public $timestamps = false;

    protected $fillable = [
        'lecture_id',
        'media_id'
    ];
}
