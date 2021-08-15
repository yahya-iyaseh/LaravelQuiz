<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Answer;
class Result extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'question_id',
        'quiz_id',
        'answer_id'
    ];

    public function question(){
        $this->belongsTo(Question::class);
    }
    public function quiz(){
        $this->belongsTo(Quiz::class);
    }
    public function answer(){
        $this->belongsTo(Answer::class);
    }
}
