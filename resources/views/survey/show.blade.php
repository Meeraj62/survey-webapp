@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-12">
        <h4 class="text-center">
            {{$questionnaire->title}}
        </h4>
        <div class="row">

            <form class="form" action="/surveys/{{ $questionnaire->id}}-{{Str::slug($questionnaire->title)}}"
                method="post">
                @csrf

                @foreach($questionnaire->questions as $key=>$question)

                <div class="card mt-3" style="margin-left: 16rem;">
                    <div class="card-header">
                        <strong class="mr-2">{{$key+1}}.</strong>{{$question->question}}
                    </div>

                    @error('response.'.$key.'.answer_id')
                    <p class="text-danger"> {{ $message }} </p>
                    @enderror

                    <div class="card-body">
                        @foreach($question->answers as $answer)
                        <label for="answer{{$answer->id}}">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <input type="radio" class="mr-2" name="response[{{ $key }}][answer_id]"
                                        id="answer{{$answer->id}}" value="{{ $answer->id }}">
                                    {{$answer->answer}}

                                    <input type="hidden" name="response[{{ $key }}][question_id]"
                                        value="{{ $question->id }}">
                                </li>

                            </ul>
                        </label>

                        @endforeach
                    </div>

                </div>
                @endforeach

                <div class="col-md-12">
                    <div class="card mt-3" style="margin-left: 16rem;">
                        <div class="card-header">Please Provide Your Information</div>

                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Your Name: </label>
                                <input type="text" name="survey[name]" class="form-control" id="name"
                                    aria-describedby="nameHelp" placeholder="Enter name">
                                @error('survey.name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <small id="name" class="form-text text-muted">Please enter your good name.</small>
                            </div>

                            <div class="form-group">
                                <label for="email">Your email: </label>
                                <input type="text" name="survey[email]" class="form-control" id="email"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                                @error('survey.email')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                                <small id="email" class="form-text text-muted">Please enter your email.</small>
                            </div>
                        </div>
                    </div>
                    <div class="row offset-md-6 mt-2">
                        <button class="btn btn-primary" type="submit">Submit Survey</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection