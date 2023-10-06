<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicTheme extends Model
{
    use HasFactory;

    protected $table = 'topic_theme';

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];
}
