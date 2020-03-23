@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a href="/questionnaires/create" class="btn btn-dark">Create new Questionnaire</a>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">List of Questionnaires</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($questionnaires as $questionnaire)
                        <li class="list-group-item">
                            <div>
                                <a href="/questionnaires/{{$questionnaire->id}}" class="btn btn-warning btn-block">{{ $questionnaire->title }}</a>
                                <h6 class="font-weight-bold"><a href="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}">
                                        Click to take survey
                                    </a></h6>

                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
