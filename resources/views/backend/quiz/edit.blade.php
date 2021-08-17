@extends('backend.layouts.master')

@section('title', 'create quiz')

@section('content')

    <div class="span9">
        <div class="content">
            <form action="{{ route('quiz.update', [$quiz->id]) }}" method="POST">
                @csrf
            <div class="module">

                <div class="module-head">
                    <h3>Update quiz</h3>
                </div>
                <div class="module-body">
                    <div class="control-group">

                        <label for="name" class="control-label">Quiz</label>
                        <div class="controls">
                            <input type="text" name="name" class="span8 @error('name')
                            is-invalid
                            @enderror" id="name" placeholder="Name of the Quiz" value="{{ $quiz->name}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">

                                    <p class="alert alert-danger">{{ $message }}</p>

                                </span>
                            @enderror
                        </div>

                        <label for="description" class="control-labbel">Description</label>
                        <div class="controls">
                            <textarea id="description" name="description" class="span8 @error('description')
                                is-invalid
                            @enderror" cols="30" rows="5">{{ $quiz->description }}</textarea>
                            @error('description')
                                <div class="invalid-feedback" role="alert">
                                      <p class="alert alert-danger">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        <label for="minuts" class="control-label">Minuts</label>
                        <div class="controls">
                            <input type="text" name="minuts" class="span8 @error('minuts')
                            is-invalid
                            @enderror" id="minuts" placeholder="minuts of the Quiz" value="{{ $quiz->minuts }}">
                            @error('minuts')
                                <span class="invalid-feedback" role="alert">
                                      <p class="alert alert-danger">{{ $message }}</p>
                                </span>
                            @enderror
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
