@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <div class="pix">
                        <img style="width:40px; height:40px; border-radius:45px;" src="{{ '../assets/uploads/profpix/'.$discussion->user->profpix }}" alt="user-image">
                        <b style="margin-left: 20px;">{{ $discussion->user->name }}</b>
                    </div>
                    <div class="pix-btn">
                        <a class="btn btn-success btn-sm" href="{{ route('discussions.show', $discussion->slug)}}">View</a>
                    </div>
                  </div>
                <div class="card-body ">
                    <p style="background: rgb(26, 4, 87); color:white; padding:10px" class="text-center">
                          <b>{{ $discussion->title }}</b>
                    </p>
                    <hr>
                     {!! $discussion->content !!}
                </div>
            </div>


            <div class="card">
                <div class="card-header">Add Reply</div>
                <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                         @foreach ($errors->all() as $error)
                        <p class="text-center text-danger">
                            {{ $error}}
                        </p>
                         @endforeach
                        </div>
                        @endif
                    @auth
                    <form action="{{ route('reply.store', $discussion->slug) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="content" id="reply" >
                            <trix-editor input="content"></trix-editor>
                        </div>
                       <button type="submit" class="btn btn-success btn-sm mt-2">Reply</button>
                       </form>
                    @else
                    <a class="btn btn-primary" href="{{ route('login') }}">Sign In To Reply</a>
                    @endauth
                </div>
            </div>

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
