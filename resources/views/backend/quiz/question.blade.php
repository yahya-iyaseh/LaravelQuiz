@extends('backend.layouts.master')

@section('title', 'create quiz')
<link rel="stylesheet" href="{{ asset('css/tables.css') }}">

@section('content')

<div class="span9">
  <div class="content">
    @foreach ($quizzes as $quiz)

      <div class="module">
        <div class="module-head">
          <h3>{{ $quiz->name }}</h3>
        </div>
        <div class="module-body">

          <p>
          <h3 class="heading"></h3>
          </p>

          <div class="module-body table">
            @foreach ($quiz->questions as $question)

              <table class="table table-message">
                <tbody>
                  <tr class="read">
                    {{ $question->question }}
                    <td class="cell-author">
                      @foreach ($question->answers as $key => $answer)

                        <p>
                          <sub>{{ $key + 1 }} )</sub> &nbsp;&nbsp;&nbsp;
                          {{ $answer->answer }}

                          @if ($answer->is_correct)
                            <span style="margin-left: 20%;" class="badge badge-success">
                              correct
                            </span>
                          @endif

                        </p>
                      @endforeach
                    </td>
                  </tr>
                </tbody>
              </table>

            @endforeach
          </div>
    @endforeach
    <div class="module-foot">
      <td>
        <a href="{{ route('quiz.index') }}">
          <button class="btn btn-inverse pull-center">Back</button>
        </a>
      </td>
    </div>
  </div>
</div>
</div>
</div>
@endsection
