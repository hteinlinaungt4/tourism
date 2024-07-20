<!-- top-header -->
@extends('user.master.layout')
@section('title', 'Home')
@section('content')
    <div>
        <div class="container-fluid ">
            <h1 class="text-center" style="margin-top:100px">Package Detail</h1>
        </div>
    </div>
    <!--- /banner ---->
    <!--- selectroom ---->
    <div class="selectroom">
        <div class="container">


            <form action="{{ route('book.store') }}" name="book" method="post">
                @csrf
                <input type="hidden" name="package_id" value="{{ $package->id }}">
                <div class="selectroom_top">
                    <div class="row">
                        <div class="col-md-8">
                            <div>
                                <img style="width: 100%;height:300px;"
                                    src="{{ asset('storage/packages/' . $package->image1) }}"
                                    class="img-responsive object-cover" alt="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <h2>{{ $package->name }}</h2>
                                <p class="dow">#PKG-{{ $package->id }}</p>
                                <p style="margin: 20px 0;"><b>Package Type :</b> {{ $package->packageType }}</p>
                                <p style="margin: 20px 0;"><b>Package Location :</b> {{ $package->location }}</p>
                                <p style="margin: 20px 0;"><b>Features</b> {{ $package->features }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row box wow fadeInRight animated" data-wow-delay=".5s" style="margin: 30px 0;padding:20px">
                        <div class="col-md-8" style="padding:0 20px;">
                            <div>
                                <h1>{{ $package->name2 }}</h1>
                                <h3 style="margin: 20px 0;">{{ $package->description1 }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <img style="width: 100%;height:200px;"
                                    src="{{ asset('storage/packages/' . $package->image2) }}"
                                    class="img-responsive object-cover" alt="">
                            </div>
                        </div>

                    </div>
                    <div class="row box wow fadeInLeft animated" data-wow-delay=".5s" style="margin: 30px 0;padding:20px">
                        <div class="col-md-4">
                            <div>
                                <img style="width: 100%;height:200px;"
                                    src="{{ asset('storage/packages/' . $package->image3) }}"
                                    class="img-responsive object-cover" alt="">
                            </div>
                        </div>
                        <div class="col-md-8" style="padding:0 20px;">
                            <div>
                                <h1>{{ $package->name3 }}</h1>
                                <h3 style="margin: 20px 0;">{{ $package->description2 }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row box wow fadeInRight animated" data-wow-delay=".5s" style="margin: 30px 0;padding:20px">
                        <div class="col-md-8">
                            <div>
                                <h1>{{ $package->name4 }}</h1>
                                <h3 style="margin: 20px 0;">{{ $package->description3 }}</h3>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <img style="width: 100%;height:200px;"
                                    src="{{ asset('storage/packages/' . $package->image4) }}"
                                    class="img-responsive object-cover" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row box wow fadeInLeft animated" data-wow-delay=".5s" style="margin: 30px 0;padding:20px">
                        <div class="col-md-4">
                            <div>
                                <img style="width: 100%;height:200px;"
                                    src="{{ asset('storage/packages/' . $package->image5) }}"
                                    class="img-responsive object-cover" alt="">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div>
                                <h1>{{ $package->name5 }}</h1>
                                <h3 style="margin: 20px 0;">{{ $package->description4 }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row" >
                        <div  class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">

                            <div  class="ban-bottom">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="bnr-right">
                                            <label class="inputLabel">From</label>
                                            <input class=" form-control from" type="date" placeholder="dd-mm-yyyy"
                                                name="fromdate" required="">
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="bnr-right">
                                            <label class="inputLabel">To</label>
                                            <input class=" form-control to" type="date" placeholder="dd-mm-yyyy"
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
                    </div>

                    <div class="clearfix"></div>
                </div>




                <div class="selectroom_top">
                    <h2>Travels</h2>
                    <div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms"
                        data-wow-delay="500ms"
                        style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">
                        <ul>
                            <input type="hidden" name="package_id" value="{{$package->id}}">
                            <li class="spe">
                                <label class="inputLabel">Comment</label>
                                <input class="special" type="text" name="comment" required="">
                            </li>

                            <li class="spe">
                                <button type="submit" class="btn-primary btn">Book</button>
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
        // Get today's date in the format yyyy-mm-dd
        const today = new Date().toISOString().split('T')[0];
        document.querySelector('.from').setAttribute('min', today);
        document.querySelector('.to').setAttribute('min', today);
    </script>
@endsection
