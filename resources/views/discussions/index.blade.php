@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($discussions->count() > 0)
            @foreach ($discussions as $discussion)
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <div class="pix">
                        <img style="width:40px; height:40px; border-radius:45px;" src="{{ 'assets/uploads/profpix/'.$discussion->user->profpix }}" alt="user-image">
                        <b style="margin-left: 20px;">{{ $discussion->user->name }}</b>
                    </div>
                    <div class="pix-btn">
                        <a class="btn btn-success btn-sm" href="{{ route('discussions.show', $discussion->slug)}}">View</a>
                    </div>
                  </div>
                <div class="card-body text-center">
                     {!! $discussion->title !!}
                </div>
            </div>
            @endforeach
            @else
  <div class="card">
    <div class="card body">
        <h2 class="text-danger text-center pt-2">There's No Discussion Yet</h2>
    </div>
  </div>
@endif
        </div>
        <div class="text-center">
            {{$discussions->links()}}
        </div>
    </div>
</div>
@endsection


@section('css')
<style>
     body{
        background:linear-gradient(to bottom, rgb(26, 4, 87), rgb(37, 3, 163));
    }
</style>
@endsection
