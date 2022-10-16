@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><b>{{ __('Add Discussion') }}</b></div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert  alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                   <li class="text-danger text-center">{{ $error  }}</li>
                                @endforeach
                            </ul>
                        </div>

                    @endif
                    <form action="{{route('discussions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="">
                        </div>

                        <div class="form-group mt-4">
                            <label for="content">Content</label>
                            <input id="content" type="hidden" name="content">
                            <trix-editor input="content"></trix-editor>
                            {{-- <textarea name="content" id="content"class="form-control" cols="30" rows="10"></textarea> --}}
                        </div>

                        <div class="form-group mt-4">
                            <label for="channel">Channel</label>
                            <select name="channel" id="channel" class="form-control">
                                @foreach ($channels as $channel)
                                <option value="{{ $channel->id}}">{{ $channel->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <button class="btn btn-success my-2 btn-sm ">Create Discussion</button>
                        </div>
                    </form>
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
