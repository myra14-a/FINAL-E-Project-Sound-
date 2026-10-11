<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class videoupload extends Model
{
    protected $table = 'videouploads';

    protected $fillable = [
        'video',
        'heading',
    ];
}
