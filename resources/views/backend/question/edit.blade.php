@extends('backend.layouts.master')

@section('title', 'create question')

@section('content')

<div class="span9">
  <div class="content">

    @if (Session::has('message'))
      <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    <form action="{{ route('question.update', [$question->id]) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="module">

        <div class="module-head">
          <h3>Update question</h3>
        </div>
        <div class="module-body">
          <div class="control-group">

            <label for="quiz" class="control-label">Choose Quiz</label>
            <div class="controls">
              <select name="quiz" id="quiz" class="span8">
                @foreach (App\Models\Quiz::all() as $quiz)
                  <option value="{{ $quiz->id }}" @if ($quiz->id == $question->quiz_id)
                    selected
                  @endif>{{ $quiz->name }}</option>
                @endforeach
              </select>
            </div>

            <label for="question" class="control-label">Question name</label>
            <div class="controls">
              <input type="text" name="question" class="span8 @error('question')
                                              is-invalid
                            @enderror" id="question" placeholder="Name of the question" value="{{ $question->question }}">
              @error('question')
                <span class="invalid-feedback" role="alert">
                  <p class="alert alert-danger">{{ $message }}</p>
                </span>
              @enderror

            </div>
            <div class="control-group">
              <label for="options" class="control-label">Options</label>
              <div class="controls">
                @foreach ($question->answers as $key=>$answer )
                  <input type="text" name="options[]" class="span7" placeholder="option{{ $key + 1 }}" value="{{ $answer->answer }}"required>
                  <input type="radio" name="correct_answer" value="{{ $key }}" @if ($answer->is_correct) checked @endif>
                  <span>Is correct answer</span>
                @endforeach
              </div>
            </div>

            <div class="controls">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>


@endsection
