@extends('user.master.layout')
@section('title', 'Enquiry')
@section('content')
<div>
    <div class="container-fluid ">
        <h1 class="text-center" style="margin-top:100px">About Page</h1>
    </div>
</div>

<div class="privacy" style="min-height: 70vh;">
	<div class="container">



		<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Welcome to Tourism Management System!!!
        </h3>


	<p class=" text-justify">
        {{$about->description}}
	</p>



	</div>
</div>

@endsection
