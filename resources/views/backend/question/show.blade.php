@extends('backend.layouts.master')

@section('title', 'create quiz')
<link rel="stylesheet" href="{{ asset('css/tables.css') }}">

@section('content')
@if($question !== null)
<div class="span9">
  <div class="content">
    <div class="module">
      <div class="module-head">

      </div>
      <div class="module-body">
        <p>
        <h3 class="heading">{{ $question->question }}</h3>
        </p>

        <div class="module-body table">
          <table class="table table-message">
            <tbody>
              @foreach ($question->answers as $key=>$answer)

                <tr class="read">
                  <td class="cell-author hidden-table">
                    <sub style="margin-right: 15px;">{{ $key+1 }} )</sub> {{ $answer->answer }}
                    @if ($answer->is_correct)
                      <span class="badge badge-success pull-right">correct</span>

                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="module-foot">
          <a href="{{ route('question.edit', [$question->id]) }}" class="btn btn-primary">Edit</a>
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


        </div>
      </div>
    </div>
  </div>
</div>
@else
<div>
    <h1 style="text-align:center; color:red">Page Error</h1>
</div>

@endif

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
