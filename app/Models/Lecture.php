<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    protected $table = 'lecture';

    public $timestamps = false;

    protected $fillable = [
        'topic_id',
        'type_id',
        'title',
        'description'
    ];

    public function media(){
        return $this->hasMany(Media::class, 'lecture_id');
    }

    
}
