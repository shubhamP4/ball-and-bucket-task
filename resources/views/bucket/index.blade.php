@extends('layouts.app')

@section('content')
    <h1>List of Buckets</h1>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <a class="btn btn-info" href="{{ route('buckets.create') }}">Add New Bucket</a>

    <table class="table">
        <tr>
            <th>Bucket ID</th>
            <th>Bucket Name</th>
            <th>Capacity</th>
            <th>Empty Volume</th>
            <th>Action</th>
        </tr>
        @foreach ($buckets as $bucket)
            <tr>
                <td>{{ $bucket->id }}</td>
                <td>{{ $bucket->bucket_name }}</td>
                <td>{{ $bucket->capacity }} cubic inches</td>
                <td>{{ $bucket->empty_volume }} cubic inches</td>
                <td>
                    <form action="{{ route('buckets.destroy', $bucket->id) }}" method="POST" id="deleteForm">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirmDelete()">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <script>
        function confirmDelete() {
            if (confirm('Are you sure you want to delete this item?')) {
                document.getElementById('deleteForm').submit();
            } else {
                return false;
            }
        }
    </script>
@endsection
