@extends('layouts.app')

@section('content')
    <div>
        <h1>Ball Placement in Buckets</h1>
        @if($placements)
            <table class="table">
                @foreach($placements as $bucketId => $balls)
                    <tr>
                        Bucket ID: {{ $bucketId }}
                        <ul>
                            @foreach($balls as $color => $quantity)
                                <li>{{ $quantity }} {{ $color }} Balls</li>
                            @endforeach
                        </ul>
                    </tr>
                @endforeach
            </ul>
        @else
            <p class="text-success mb-5">No buckets available to accommodate the balls.</p>
        @endif
    </div>
@endsection
