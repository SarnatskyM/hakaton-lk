<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student2Task extends Model
{
    use HasFactory;

    protected $table = 'student2task';

    public $timestamps = false;

    protected $fillable = [
        'student_id',
        'task_id',
        'is_done',
    ];

    public function task(){
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function student(){
        return $this->belongsTo(User::class, 'student_id');
    }
}
