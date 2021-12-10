<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerLinking extends Model
{
    protected $table = 'answer_linking';
    protected $fillable = [
        'id',
        'question_id',
        'answer',
        'created_at',
        'updated_at'
    ];
}
