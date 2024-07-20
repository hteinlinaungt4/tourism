@extends('user.master.layout')
@section('title', 'Enquiry')
@section('content')

<div>
    <div class="container-fluid ">
        <h1 class="text-center" style="margin-top:100px">Contact Page</h1>
    </div>
</div>
<div class="privacy" style="min-height: 70vh;">
	<div class="container">




        <div class="container">
            <div class="row">
                <h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Contact Page
                </h3>

                <div class="col-md-12">
                    <div class="left-content">
                        <h4>Address</h4>
                        <p>{{$contact->address}}</p>
                        <h4>Email</h4>
                        <p>{{$contact->email}}</p>
                        <h4>Phone Number</h4>
                        <p>{{$contact->phone}}</p>
                        <p>you can contact us on the above details
                        </p>
                    </div>
                </div>
            </div>
        </div>



	</div>
</div>

@endsection
