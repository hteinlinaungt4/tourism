@extends('user.master.layout')
@section('title', 'My Book Lists')
@section('content')
    <div style="min-height: 80vh;">
        <h2 class="text-center title">Booking Lists</h2>
        <div class="container">
            @foreach ($books as $p)
                <div class="rom-btm">

                    <div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
                        <a href="{{ route('package.detail.list', $p->id) }}">
                            <img src="{{ asset('storage/packages/' . $p->package->image1) }}" class="img-responsive"
                                alt="">
                        </a>
                    </div>
                    <div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">

                        <h4>Package Name: {{ $p->package->name }}</h4>
                        <h6>Package Type : {{ $p->package->packageType }}</h6>
                        <p><b>Package Location :</b> {{ $p->package->location }}</p>
                        <p><b>Features</b> {{ $p->package->features }}</p>
                    </div>
                    <div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
                        <h5>{{ $p->package->price }} MMK</h5><br>
                        <div>
                            @if ($p->status == '0')
                                <button class="btn btn-danger mt-5 ">Reject</button>
                            @elseif ($p->status == '1')
                                <button class="btn btn-warning  mt-5 ">Pending</button>
                            @elseif ($p->status == '2')
                                <button class="btn btn-success  mt-5 ">Confrim</button>
                            @endif
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
