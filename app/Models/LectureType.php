<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LectureType extends Model
{
    use HasFactory;

    protected $table = 'lecture_type';

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];
}
