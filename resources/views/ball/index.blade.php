@extends('layouts.app')

@section('content')
    <h1>List of Balls</h1>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <a class="btn btn-info" href="{{ route('balls.create') }}">Add New Ball</a>

    <table class="table">
        <tr>
            <th>Ball ID</th>
            <th>Color</th>
            <th>Size</th>
            <th>Action</th>
        </tr>
        @foreach ($balls as $ball)
            <tr>
                <td>{{ $ball->id }}</td>
                <td>{{ $ball->color }} </td>
                <td> {{ $ball->size }} cubic inches</td>
                <td>
                    <form action="{{ route('balls.destroy', $ball->id) }}" method="POST" id="deleteForm">
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
