@extends('layouts.app')

@section('content')
    <div class="contailner">
        <h1>Add Buckets</h1>
        <form action="{{ route('buckets.store') }}" method="POST">
            @csrf
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <label for="name" class="col-form-label">Bucket Name:</label>
                </div>
                <div class="col-auto">
                    <input type="text" id="name" name="bucket_name"
                        class="form-control @error('bucket_name') is-invalid @enderror">
                    @error('bucket_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-auto">
                    <label for="capacity" class="col-form-label">Bucket capacity/Volume:</label>
                </div>
                <div class="col-auto">
                    <input type="number" name="capacity" id="capacity"
                        class="form-control @error('capacity') is-invalid @enderror">
                    @error('capacity')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-auto">
                    <button class="btn btn-success mt-3" type="submit">Add Bucket</button>
                    <a class="btn btn-primary mt-3" href="{{ route('buckets.index') }}">View Bucket</a>
                </div>
            </div>
        </form>

    </div>
@endsection
