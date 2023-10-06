<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task2Media extends Model
{
    use HasFactory;

    protected $table = 'task2media';

    public $timestamps = false;

    protected $fillable = [
        'task_id',
        'media_id',
    ];
}
