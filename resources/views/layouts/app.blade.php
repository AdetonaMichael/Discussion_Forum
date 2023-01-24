<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dicsussion Forum') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
              <div class="container-fluid">
                <div style="height:100vh;" class="row d-flex justify-content-center">
                    @auth
                    @if (Request::is('/'))
                    <div>

                    </div>
                    @else
                    <div class="col-md-4">
                        <div class="card mt-4">
                           <div class="card-header d-flex justify-content-between">Channels
                                <!-- Button trigger modal -->
<button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
   <span class="fas fa-plus"></span>
 </button>
                           </div>
                           <a  style="background:rgb(26, 4, 87); color:white;" class="btn btn-info text-white mt-4 mx-3" href="{{ route('discussions.create') }}"><i class="fa fa-plus"></i> Add Discussion</a>
                           <div class="card-body">
                               <main class="py-4">
                                   <ul class="list-group">
                                     @foreach ($channels as $channel )
                                     <li class="list-group-item mb-2">{{$channel->name }}</li>
                                     @endforeach
                           </div>
                        </div>

                   </div>
                    @endif

                    @endauth
                    @if(Request::is('/'))
                        <div class="col-md-12">
                            <main>
                                @yield('content')
                            </div>
                        </div>
                    @else
                    <div class="col-md-8">
                        <main class="py-4">
                            @yield('content')
                        </main>
                    </div>
                    @endif
              </div>
        </div>



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
         <form action="{{ route('store-channel') }}" method="POST">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Channel</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                @if($errors->any())
                   @foreach ($errors as $error)
                   <div class="alert alert-danger">
                     <p class="text-center text-danger">{{ $error }}</p>
                    </div>
                   @endforeach
                @endif
            @csrf
             <div class="form-group">
                    <label for="Name"><span class="text-muted"><small>Channel Name </small><span class="text-danger">*</span></span></label>
                    <input name="name" class="form-control" type="text">
             </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success btn-sm">Save</button>
        </div>
      </div>
    </form>
    </div>
  </div>

    </div>

    @yield('js')
    <script src="{{ asset('js/toastr.min.js') }}"></script>
<script>
        @if(Session::has('success'))
        toastr.success("{{ session()->get('success') }}")
        @elseif (Session::has('error'))
        toastr.error("{{ session()->get('success')  }}")
        @endif
</script>
{{-- @include('partials.footer') --}}
</body>
</html>
