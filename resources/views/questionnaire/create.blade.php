@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Questionnaire</div>

                <div class="card-body">
                    <form action="/questionnaires" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title </label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter title">
                            @error('title')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <small id="title" class="form-text text-muted">Please add a convincing title.</small>
                        </div>

                        <div class="form-group">
                            <label for="purpose">Purpose </label>
                            <textarea name="purpose" id="purpose" cols="30" rows="5" style="resize: none;" class="form-control"></textarea>
                            @error('purpose')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                         </div>

                        <button type="submit" class="btn btn-primary">Save Questionnaire</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
