<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    use HasFactory;

    protected $table = 'summary';

    public $timestamps = false;

    protected $fillable = [
        'topic_id',
        'title',
        'description',
    ];
}
