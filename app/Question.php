<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    protected $fillable = [
        'id',
        'category_id',
        'question_name',
        'option_one',
        'option_two',
        'option_three',
        'option_four',
        'created_at',
        'updated_at'
    ];
}
