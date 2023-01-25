@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/home.css')}}">

 <div class="main-banner" id="top">
    <div id="bg-video">

    </div>

    <div class="video-overlay header-text">
        <div class="caption">
            <h2>Geo-<em>Discuss</em></h2>
            <h4 class="text-white">Discuss, Collaborate and Share Geo-spatial Datasets</h4>
            <div class="main-button scroll-to-section">
                <a style="border-radius: 45px; background-color:rgb(26,4,87)" class="btn btn-primary text-white rounded-pill border border-0" href="{{ route('home') }}"><b>Start Discussing</b></a>
            </div>
        </div>
    </div>
</div>

<!-- Section Intro Start -->
<section class="mt-80px">
	<div class="container">
		<div class="row three-card ">
			<div class="col-lg-4 col-md-6">
				<div class="card p-5 border-0 rounded-top border-bottom position-relative hover-style-1 shadow">
					<span style="background:rgb(26,4,87);color:white; padding:5px;" class="number">01</span>
					<h3 class="mt-3">Access & Share Geospatial Data</h3>
					<p class="mt-3 mb-4">Vestibulum sit amet blan augue, sit amet vehicula mi. Aliquam vitae varius.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="card p-5 border-0 rounded-top hover-style-1 shadow">
					<span style="background:rgb(26,4,87);color:white; padding:5px;" class="number">02</span>
					<h3 class="mt-3">Collaborate and Share Solutions</h3>
					<p class="mt-3 mb-4">Vestibulum sit amet blan augue, sit amet vehicula mi. Aliquam vitae varius.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
				<div class="card p-5 border-0 rounded-top hover-style-1 shadow">
					<span style="background:rgb(26,4,87);color:white; padding:5px;" class="number">03</span>
					<h3 class="mt-3">Chat with Freedom and Peace of Mind</h3>
					<p class="mt-3 mb-4">Vestibulum sit amet blan augue, sit amet vehicula mi. Aliquam vitae varius.</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Section Intro End -->

<!-- Section About start -->
<section class="section about mt-5">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<img src="{{ asset('assets/img/geoPortal.jpg')}}" alt="" class="img-fluid rounded shadow w-100">
			</div>

			<div class="col-lg-6">
				<div class="pl-3 mt-5 mt-lg-0">
					<h2 class="mt-1 mb-3">We’ve skill in <br>wide <span class="text-color">range of fitness</span> and Other body health facility. </h2>

					<p class="mb-4">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis Theme natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam lorem ante, dapibus in.</p>

					<a style="border-radius: 45px; background-color:rgb(26,4,87);color:white; padding:5px 10px 5px 10px; text-decoration:none; width:60%" href="about.html" class="text-color text-uppercase font-size-13 letter-spacing font-weight-bold">more Details <i class="fa fa-arrow-right mr-2 "></i></a>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- Section About End -->




@endsection
