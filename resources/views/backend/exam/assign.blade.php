@extends('backend.layouts.master')

@section('title', 'create question')

@section('content')

<div class="span9">
  <div class="content">

    @if (Session::has('message'))
      <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    <form action="{{ route('exam.assign') }}" method="POST">
      @csrf
      <div class="module">

        <div class="module-head">
          <h3>Assign Quiz</h3>
        </div>
        <div class="module-body">
          <div class="control-group">

            <label for="quiz" class="control-label">Choose Quiz</label>
            <div class="controls">
              <select name="quiz" id="quiz" class="span8">
                @foreach (App\Models\Quiz::all() as $quiz)
                  <option value="{{ $quiz->id }}">{{ $quiz->name }}</option>
                @endforeach
              </select>
            </div>

            <label for="user" class="control-label">Choose User</label>
            <div class="controls">
              <select name="user" id="user" class="span8">
                @foreach (App\Models\User::where('is_admin', 0)->get() as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
            </div>


            <div class="controls">
              <button type="submit" class="btn btn-success">Assign</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>


@endsection
