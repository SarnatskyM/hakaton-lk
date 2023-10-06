<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher2class extends Model
{
    use HasFactory;

    protected $table = 'teacher2class';

    public $timestamps = false;

    protected $fillable = [
        'teacher_id',
        'class_id',
    ];

    public function class(){
        return $this->belongsTo(Classes::class, 'class_id');
    }
}
