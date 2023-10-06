<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'task';

    public $timestamps = false;

    protected $casts = [
        'task_params' => 'array',
    ];

    protected $fillable = [
        'topic_id',
        'type_id',
        'title',
        'description',
        'task_params',
    ];


    public function type(){
        return $this->belongsTo(TaskType::class, 'type_id');
    }
}
