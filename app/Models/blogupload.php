<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blogupload extends Model
{
    protected $table = 'bloguploads';

    protected $fillable = [
        'Image',
        'Heading',
        'Title',
        'Description',
    ];
}
