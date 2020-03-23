@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Question</div>

                <div class="card-body">
                    <form action="/questionnaires/{{$questionnaire->id}}/questions" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Question </label>
                            <input type="text" name="question[question]" class="form-control" id="question" aria-describedby="questionHelp" placeholder="Enter question" value="{{old('question.question')}}">
                            @error('question.question')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <small id="question" class="form-text text-muted">Please add a convincing question.</small>
                        </div>

                        <fieldset>
                            <legend>Choices</legend>
                            <small id="answerHelp" class="form-text text-muted">Please add some relevant choices.</small>
                            
                            <div class="form-group">
                            <input type="text" name="answer[][answer]" class="form-control" id="choice1 " aria-describedby="choice1 Help" placeholder="Enter choice1 " value="{{old('answer.0.answer')}}">
                            @error('answer.0.answer')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                         </div>
                         <div class="form-group">
                            <input type="text" name="answer[][answer]" class="form-control" id="choice2" aria-describedby="choice2Help" placeholder="Enter choice2"
                            value="{{old('answer.1.answer')}}">
                            @error('answer.1.answer')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                         </div>
                         <div class="form-group">
                            <input type="text" name="answer[][answer]" class="form-control" id="choice3" aria-describedby="choice3Help" placeholder="Enter choice3"
                            value="{{old('answer.2.answer')}}">
                            @error('answer.2.answer')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                         </div>
                         <div class="form-group">
                            <input type="text" name="answer[][answer]" class="form-control" id="choice4" aria-describedby="choice4Help" placeholder="Enter choice4"
                            value="{{old('answer.3.answer')}}">
                            @error('answer.3.answer')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                         </div>
                        </fieldset>

                        <button type="submit" class="btn btn-primary">Save Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
