<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Result;
use App\Models\Question;
class ExamController extends Controller
{
    public function create(){
        return view('backend.exam.assign');
    }
    public function  assignExam(Request $request){
        $quiz = (new Quiz)->assignExam($request);
        return redirect()->back()->with('message', 'Exam Aassigend to user successfully');
    }
    public function userExam(Request $request){
        $quizzes = Quiz::get();
        return view('backend.exam.index', compact('quizzes'));
    }
    public  function removeExam(Request $request){
        $userId = $request['user_id'];
        $quizId = $request['quiz_id'];
        $quiz = Quiz::find($quizId);
        $result = Result::where('user_id', $userId)->where('quiz_id', $quizId)->exists();
        if($result){
            return redirect()->back()->with('message', 'This quiz is played by user so it cannot be removed!');
        }else{
            $quiz->users()->detach($userId);
                        return redirect()->back()->with('message', 'Exam is now not assigned to that user');

        }
    }

    public function getQuizQuestions(Request $request,$quizId){
        $authUser  = auth()->user()->id;
        $quiz = Quiz::find($quizId);
        $time = Quiz::where('id', $quizId)->value('minuts');
        $quizQuestions = Question::where('quiz_id', $quizId)->with('answers')->get();
        $authUserHasPlayedQuiz = Result::where(['user_id' => $authUser, 'quiz_id' => $quiz])->get();
        return view('quiz', compact('quiz', 'time', 'quizQuestions', 'authUserHasPlayedQuiz'));
    }
}
