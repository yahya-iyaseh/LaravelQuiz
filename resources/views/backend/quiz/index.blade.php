@extends('backend.layouts.master')

@section('title', 'create quiz')
<link rel="stylesheet" href="{{ asset('css/tables.css') }}">
@section('content')

<div class="span9">
  <div class="content">
    <div class="module">
        @if (Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
        @endif
      <div class="module-head">
        <h3>All Quiz</h3>
        <div class="module-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Quiz Name</th>
                <th>Description</th>
                <th>Time in Minuts</th>
                <th></th>
                <th></th>
                <th></th>

              </tr>
            </thead>
            <tbody>
              @if (count($quizzes) > 0)
                @foreach ($quizzes as $quiz)
                  <tr>
                    <td>{{ $quiz->id }}</td>
                    <td>{{ $quiz->name }}</td>
                    <td>{{ $quiz->description }}</td>
                    <td>{{ $quiz->minuts }}</td>
                    <td>
                        <a href="{{ route('quiz.question', [$quiz->id]) }}" class="btn btn-info">Show</a>
                    </td>
                    <td>
                      <a href="{{ route('quiz.edit', [$quiz->id]) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                      <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-danger">Delete</button>

                      <div id="id01" class="modal">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                        <form class="modal-content" action="{{ route('quiz.destroy', [$quiz->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                          <div class="container2">
                            <h1>Delete Quiz</h1>
                            <p>Are you sure you want to delete the quiz?</p>

                            <div class="clearfix">
                              <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn button">Cancel</button>
                              <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn button">Delete</button>
                            </div>
                          </div>
                        </form>
                      </div>

                    </td>
                  </tr>
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
