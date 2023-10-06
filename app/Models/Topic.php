<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $table = 'topic';

    public $timestamps = false;

    protected $fillable = [
        'subject_id',
        'teacher_id',
        'title',
        'description',
        'theme_id'
    ];

    public function subject(){
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function teacher(){
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function theme(){
        return $this->belongsTo(TopicTheme::class, 'theme_id');
    }

    public function summary(){
        return $this->hasMany(Summary::class, 'topic_id');
    }

    public function tasks(){
        return $this->hasMany(Task::class, 'topic_id');
    }
}
