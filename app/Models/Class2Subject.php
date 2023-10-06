<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Class2Subject extends Model
{
    use HasFactory;

    protected $table = 'class2subject';

    public $timestamps = false;

    protected $fillable = [
        'class_id',
        'subject_id'
    ];
}
