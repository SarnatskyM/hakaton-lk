<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student2Lecture extends Model
{
    use HasFactory;

    protected $table = 'student2lecture';

    public $timestamps = false;

    protected $fillable = [
        'student_id',
        'lecture_id',
    ];
}
