<!-- create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="contailner">
        <h1>Add Balls</h1>
        <form action="{{ route('balls.store') }}" method="POST">
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="color" class="col-form-label">Ball Color:</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="color" name="color"
                        class="form-control @error('color') is-invalid @enderror">
                    @error('color')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-auto">
                    <label for="size" class="col-form-label">Ball Size:</label>
                </div>
                <div class="col-auto">
                    <input type="number" name="size" id="size"
                        class="form-control @error('size') is-invalid @enderror">
                    @error('size')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-auto">
                    <button class="btn btn-success" type="submit">Add Ball</button>
                </div>
            </div>
        </form>
    </div>
@endsection
