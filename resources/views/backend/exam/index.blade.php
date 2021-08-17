@extends('backend.layouts.master')

@section('title', 'exam assigned user')

<link rel="stylesheet" href="{{ asset('css/tables.css') }}">
@section('content')

<div class="span9">
  <div class="content">
    <div class="module">
      @if (Session::has('message'))
        <p class="alert alert-success">{{ Session::get('message') }}</p>
      @endif
      <div class="module-head">
        <h3>User exam</h3>
        <div class="module-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Quiz</th>
                <th></th>

              </tr>
            </thead>
            <tbody>
              @if (count($quizzes) > 0)
                @foreach ($quizzes as $quiz)
                  @foreach ($quiz->users as $key => $user)

                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $quiz->name }}</td>
                      <td>
                        <a href="{{route('quiz.question',[$quiz->id])}}">
                          <button class="btn btn-info">Show Question</button></a>
                      </td>
                      <td>
                        <form action="{{ route('exam.remove', [$quiz->id]) }}" method="POST">
                          @csrf

                          <input type="hidden" name="user_id" value="{{ $user->id }}" maxlength="4" size="4">
                        <input type="hidden" name="quiz_id" value="{{ $quiz->id }}" maxlength="4" size="4">
                        <button class="btn btn-danger">Delete</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach

                @endforeach
              @else
                <tr>
                  <td colspan="4">
                    <div class="alert alert-warning">There is no Quizzes</div>
                  </td>
                </tr>
              @endif


            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // Get the modal
  var modal = document.getElementById('id01');

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
@endsection
