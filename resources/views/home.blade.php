@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    @if(isset(auth()->user()->profpix))
                    <img style="border-radius: 45px;" src="{{ '/assets/uploads/profpix/'.auth()->user()->profpix }}" alt="user-image" height=40 width=40>
                    @else
                    <img alt="profpix" src={{ asset('assets/img/profpix.jpg')}} height="40" width="40" style="border-radius:45px">
                    @endif
                    @auth
                    <b>{{ auth()->user()->name }}</b></div>
                    @endauth

                <div class="card-body text-center">
                    Dashboard
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
@endsection
