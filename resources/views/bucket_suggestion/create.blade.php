@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bucket Suggestion</h1>
        <form action="{{ route('bucket_suggestion.store') }}" method="POST">
            @csrf
            @foreach ($balls as $ball)
                <div class="col-auto">
                    <label for="{{ $ball->color }}" class="col-form-label">{{ ucfirst($ball->color) }} Balls:</label>
                </div>
                <div class="col-auto">
                    <input type="number" id="{{ $ball->color }}" name="balls[{{ $ball->id }}]" class="form-control">
                    @error('balls.*')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            @endforeach
            <button class="btn btn-success mt-2 mb-3" type="submit">Suggest Buckets</button>
        </form>
    </div>
@endsection
