<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'minuts'
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function storeQuiz($data){
        return Quiz::create($data);
    }
    public function allQuiz(){
        return Quiz::get();
    }
    public function getQuizById($id){
        return Quiz::find($id);
    }
    public function updateQuiz($data, $id){
        return Quiz::find($id)->update($data);
    }
    public function deleteQuiz($id){
        return Quiz::find($id)->delete();
    }
}
