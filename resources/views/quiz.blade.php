@extends('layouts.app')

@section('content')

{{-- <quiz-component
   :times ="{{$quiz->minutes}}"
   :quizId="{{$quiz->id}}"
   :quiz-questions = "{{$quizQuestions}}"
   :has-quiz-played ="{{$authUserHasPlayedQuiz}}"
   >


</quiz-component> --}}

<quiz-component
    :times = "{{ $quiz->minuts }}"
    :quizId = "{{ $quiz->id }}"
    :quiz-questions = "{{ $quizQuestions }}"
    :has-quiz-played = "{{ $authUserHasPlayedQuiz }}"
>

</quiz-component>
@endsection
