<!-- top-header -->
@extends('user.master.layout')
@section('title', 'Home')
@section('content')
    <div class="banner-3">
        <div class="container-fluid " style="z-index: 0!important;">
            <h1 style="z-index: 0!important;" class="wow zoomIn animated animated" data-wow-delay=".5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> TMS -Package Details</h1>
        </div>
    </div>
    <!--- /banner ---->
    <!--- selectroom ---->
    <div class="selectroom">
        <div class="container">


            <form action="{{route('book.store')}}" name="book" method="post">
                @csrf
                <input type="hidden" name="package_id" value="{{$package->id}}">
                <div class="selectroom_top">
                    <div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
                        <img src="{{ asset('storage/packages/' . $package->image) }}" class="img-responsive" alt="">
                    </div>
                    <div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
                        <h2>{{ $package->name }}</h2>
                        <p class="dow">#PKG-{{ $package->id }}</p>
                        <p><b>Package Type :</b> {{ $package->packageType }}</p>
                        <p><b>Package Location :</b> {{ $package->location }}</p>
                        <p><b>Features</b> {{ $package->features }}</p>
                        <div class="ban-bottom">
                           <div class="row">
                            <div class="col-md-6">
                                <div class="bnr-right">
                                    <label class="inputLabel">From</label>
                                    <input class=" form-control"  type="date" placeholder="dd-mm-yyyy"
                                        name="fromdate" required="">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="bnr-right">
                                    <label class="inputLabel">To</label>
                                    <input class=" form-control"  type="date" placeholder="dd-mm-yyyy"
                                        name="todate" required="">
                                </div>
                            </div>
                           </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="grand">
                            <p>Grand Total</p>
                            <h3>{{ $package->price }} MMK</h3>
                        </div>
                        <h3>Package Details</h3>
                        <p style="padding-top: 2%">{{ $package->details }}</p>
                    </div>

                    <div class="clearfix"></div>
                </div>
                <div class="selectroom_top">
                    <h2>Travels</h2>
                    <div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms"
                        data-wow-delay="500ms"
                        style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">
                        <ul>

                            <li class="spe">
                                <label class="inputLabel">Comment</label>
                                <input class="special" type="text" name="comment" required="">
                            </li>

                            <li class="spe">
                                <button type="submit"  class="btn-primary btn">Book</button>
                            </li>

                            <div class="clearfix"></div>
                        </ul>
                    </div>

                </div>
            </form>


        </div>
    </div>
@endsection
@section('script')
<script>
    $(function() {
    $( "#datepicker,#datepicker1" ).datepicker();
    });
</script>
@endsection
