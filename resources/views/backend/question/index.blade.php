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
        <h3>All Question</h3>
        <div class="module-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Questoin Name</th>
                <th>Quiz</th>
                <th>Created</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if (count($questions) > 0)
                @foreach ($questions as $question)
                  <tr>
                    <td>{{ $question->id }}</td>
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->quiz->name }}</td>
                    <td>{{ date('F D,Y', strtotime($question->created_at)) }}</td>
                    <td>
                        <a href="{{ route('question.show', [$question->id]) }}">
                            <button class="btn btn-info">View</button>
                        </a>
                    </td>
                    <td>
                      <a href="{{ route('question.edit', [$question->id]) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                      <button onclick="document.getElementById('id01').style.display='block'" class="btn btn-danger">Delete</button>

                      <div id="id01" class="modal">
                        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                        <form class="modal-content" action="{{ route('question.destroy', [$question->id]) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <div class="container2">
                            <h1>Delete Question</h1>
                            <p>Are you sure you want to delete the Question?</p>

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
                    <div class="alert alert-warning">There is no Question</div>
                  </td>
                </tr>
              @endif


            </tbody>
          </table>
          <div class="pagination  pagination-centered">
            {{ $questions->links() }}

          </div>
          </nav>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
  function onconfirm() {
    alert('are you sure')
  }
</script>
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
