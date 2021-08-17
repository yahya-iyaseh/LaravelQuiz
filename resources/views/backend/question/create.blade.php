@extends('backend.layouts.master')

@section('title', 'create question')

@section('content')

<div class="span9">
  <div class="content">

    @if (Session::has('message'))
      <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    <form action="{{ route('question.store') }}" method="POST">
      @csrf
      <div class="module">

        <div class="module-head">
          <h3>Create question</h3>
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

            <label for="question" class="control-label">Question name</label>
            <div class="controls">
              <input type="text" name="question" class="span8 @error('question')
                                            is-invalid
                            @enderror" id="question" placeholder="Name of the question" value="{{ old('question') }}">
              @error('question')
                <span class="invalid-feedback" role="alert">
                  <p class="alert alert-danger">{{ $message }}</p>
                </span>
              @enderror

            </div>
            <div class="control-group">
                <label for="options" class="control-label">Options</label>
              <div class="controls">
                   @for($i = 0; $i < 4; $i++)
                <input type="text" name="options[]" class="span7"  placeholder="option{{ $i+1 }}" required>
                <input type="radio" name="correct_answer" value="{{ $i }}">
                <span>Is correct answer</span>
                @endfor
              </div>
            </div>

            <div class="controls">
              <button type="submit" class="btn btn-success">Create</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>


@endsection
