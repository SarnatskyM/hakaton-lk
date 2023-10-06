<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeWork extends Model
{
    use HasFactory;

    protected $table = 'homework';

    public $timestamps = false;

    protected $fillable = [
        'teacher_id',
        'class_id',
        'subject_id',
        'description',
        'done_at'
    ];
}
