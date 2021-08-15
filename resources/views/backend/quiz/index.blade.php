@extends('backend.layouts.master')

@section('title', 'create quiz')
<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
  }
.container2 {
  padding: 16px;
  text-align: center;
}
  /* Set a style for all buttons */
  .button {
    background-color: #04AA6D;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
  }

  button:hover {
    opacity: 1;
  }

  /* Float cancel and delete buttons and add an equal width */
  .cancelbtn,
  .deletebtn {
    float: left;
    width: 50%;
  }

  /* Add a color to the cancel button */
  .cancelbtn {
    background-color: #ccc;
    color: black;
  }

  /* Add a color to the delete button */
  .deletebtn {
    background-color: #f44336;
  }

  /* Add padding and center-align text to the container */
  .container {
    padding: 16px;
    text-align: center;
  }

  /* The Modal (background) */
  .modal {
    display: none;
    /* Hidden by default */
    position: fixed;
    /* Stay in place */
    z-index: 1;
    /* Sit on top */
    left: 0;
    top: 0;
    width: 100%;
    /* Full width */
    height: 100%;
    /* Full height */
    overflow: auto;
    /* Enable scroll if needed */
    background-color: #474e5d;
    padding-top: 50px;
  }

  /* Modal Content/Box */
  .modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto;
    /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%;
    /* Could be more or less, depending on screen size */
  }

  /* Style the horizontal ruler */
  hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
  }

  /* The Modal Close Button (x) */
  .close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
  }

  .close:hover,
  .close:focus {
    color: #f44336;
    cursor: pointer;
  }

  /* Clear floats */
  .clearfix::after {
    content: "";
    clear: both;
    display: table;
  }
  #id01{
      max-height: 300px;
  }
  /* Change styles for cancel button and delete button on extra small screens */
  @media screen and (max-width: 300px) {

    .cancelbtn,
    .deletebtn {
      width: 100%;
    }
  }

</style>
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
