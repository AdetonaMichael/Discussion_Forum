@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-end mb-2">
                <a href="{{ route('discussion.create') }}" class="btn btn-success btn-sm">Add Discussion</a>
            </div>
            @foreach ($discussions as $discussion)
            <div class="card">
                <div class="card-header"><b>{{ $discussion->title }}</b></div>
                <div class="card-body text-center">
                     {{ $discussion->title}}
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            {{$discussions->links()}}
        </div>
    </div>
</div>
@endsection
