@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Dashboard</div>
          @if ($isExamAssigned)
            @foreach ($quizzes as $quiz)
              <div class="card-body">

                <p>
                <h3>{{ $quiz->name }}</h3>
                </p>
                <p><strong>About Exam:</strong> {{ $quiz->description }}.</p>
                <p><strong>Time allocateds:</strong> {{ $quiz->minuts }} minuts.</p>
                <p><strong>Nubmer of questions:</strong> {{ $quiz->questions->count() }}.</p>
                <p>
                    @if (!in_array($quiz->id, $wasQuizCompleted))
                    <a href="/quiz/{{ $quiz->id }}">
                        <button class="btn btn-success">Start Quiz</button>
                    </a>
                    @else
                    <span class="float-right bg-success">Completed</span>
                    @endif

                </p>
                <hr>
              </div>
            @endforeach

          @else
            <p class="alert alert-warning">You have not assigned any exam</p>
          @endif
        </div>
      </div>
    </div>
  </div>

@endsection
