@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div style="background:#1a0457; color:white;"  class="card-header d-flex justify-content-between">
                    <div class="pix">
                        @if(isset(auth()->user->profpoix))
                        <img style="width:40px; height:40px; border-radius:45px;" src="{{ '../assets/uploads/profpix/'.$discussion->user->profpix }}" alt="user-image">
                        @else
                        <img style="width:40px; height:40px; border-radius:45px;" src="{{ asset('assets/img/profpix.jpg') }}" alt="profpix">
                        @endif
                        @auth
                        <b style="margin-left: 20px;">{{ $discussion->user->name }}</b>
                        @endauth
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
                     @if($discussion->bestReply)
                     <div class="card">
                        <div style="background:#81bfa2;" class="card-header text-white d-flex justify-content-between">
                            <div>
                                @if(isset($discussion->bestReply->owner->profpix))
                                <img style="width:40px; height:40px; border-radius:45px;" src="{{ '../assets/uploads/profpix/'.$discussion->bestReply->owner->profpix }}" alt="user-image">
                                @else
                                <img src="{{ asset('assets/img/profpix.jpg') }}" alt="profpix" style="height: 40px; width:40px;">
                                @endif
                                <span>{{ $discussion->bestReply->owner->name }}</span>
                            </div>
                            <div class="mt-2">
                                <strong>Best Reply</strong>
                            </div>
                        </div>
                        <div class="card-body">
                           {!! $discussion->bestReply->content  !!}
                        </div>
                     </div>
                     @endif
                </div>
            </div>

            @foreach ($discussion->replies()->paginate(3) as $reply)
               <div class="card my-2">
                 <div style="background-color: #0b002d; color: white;" class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            @if(isset($reply->owner->profpix))
                            <img style="width:40px; height:40px; border-radius:45px;" src="{{ '../assets/uploads/profpix/'.$reply->owner->profpix }}" alt="user-image">
                            @else
                            <img src="{{ asset('assets/img/profpix.jpg') }}" height="40px" width="40px" style="border-radius: 45px" alt="profpix">
                            @endif
                            <span>{{ $reply->owner->name }}</span>
                        </div>
                        <div>
                            @auth
                            @if(auth()->user()->id == $discussion->user_id)
                            @if($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <p class="text-center text-danger">{{ $error }}</p>
                            </div>
                            @endforeach
                            @endif
                            <form action="{{ route('discussions.best-reply', ['discussion'=>$discussion->slug, 'reply'=>$reply->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-light">Mark as Best</button>

                            </form>
                            @endif
                            @endauth
                        </div>
                    </div>
                 </div>
                 <div class="card-body">
                   {!! $reply->content  !!}
                </div>
               </div>
            @endforeach

            <div class="d-flex justify-content-center">
                {{ $discussion->replies()->paginate(1)->links()}}
            </div>

            <div class="card">
                <div class="card-header bg-white">Add Reply</div>
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
                            <input type="hidden" name="content" id="content" >
                            <trix-editor name="content" input="content"></trix-editor>
                        </div>
                       <button style="background-color: #0b002d;" type="submit" class="btn btn-success btn-sm mt-2">Reply</button>
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
