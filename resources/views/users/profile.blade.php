@extends('layouts.app')

@section('content')
<div class="container rounded bg-white mt-5 mb-5 h-100">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" height="150px" src="{{ '/assets/uploads/profpix/'.$users->profpix }}">
                <span class="font-weight-bold">{{ $users->firstname." ".$users->surname}}</span>
                <span class="text-black-50 text-center">{{ $users->email}}</span><span> </span></div>
        </div>
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <form action="{{ route('users.update', $users->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                            @if($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                <li class="text-center text-danger">{{ $error}}</li>
                                @endforeach
                            </ul>
                            </div>
                            @endif


                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" name="firstname" placeholder="first name" value="{{ $users->firstname}}"></div>
                        <div class="col-md-6"><label class="labels">Surname</label><input type="text" name="surname" class="form-control" value="{{ $users->surname}}" placeholder="surname"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels">Country</label><input type="text" name="country" class="form-control" placeholder="country" value="{{ $users->country }}"></div>
                        <div class="col-md-6"><label class="labels">State</label><input type="text"   name="state" class="form-control" value="{{ $users->state}}" placeholder="state"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels" for="country">Country</label>
                            <input type="file" name="profpix" class="form-control" >
                        </div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('profile.css')}}">
<style>
    body{
       background:linear-gradient(to bottom, rgb(26, 4, 87), rgb(37, 3, 163));
   }
</style>
@endsection
