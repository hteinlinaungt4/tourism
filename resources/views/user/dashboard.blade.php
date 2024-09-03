@extends('user.master.layout')
@section('title', 'Home')
@section('content')
    <div class="banner">
        <div class="container">
            <!-- <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;" style="color:#000 !important"> TMS - Tourism Management System</h1> -->
        </div>
    </div>

    <div class="container mb-3">
        <div class="holiday">
            <h3 style="margin-bottom: 50px;">Climate</h3>
            <div class="row rowgg content">
                <div class="col-md-6" style="padding: 20px;">
                    <p style="text-indent: 2em;">
                        {{$context->description}}
                    </p>
                </div>
                <div class="col-md-6 text-center">
                    <img class="centered-image" width="400" height="300"
                        src="https://keyassets.timeincuk.net/inspirewp/live/wp-content/uploads/sites/8/2022/10/CLI371.weather.crepuscular_rays_mario_widmer.jpg"
                        alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    </div>

    <div class="container mb-3">
        <div class="holiday">
            <h3 style="margin-bottom: 50px;">Situation</h3>
            <div class="row rowgg content">
                <div class="col-md-6 text-center">
                    <img class="centered-image" width="400" height="300"
                        src="https://www.tripsavvy.com/thmb/BFZYgvJvcCtQVnu4s8SHxKgunWg=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/Leg-rowersonInleLakeinMyanmar-840c6d2bfe17422eaff6e3daba251af2.jpg"
                        alt="">
                </div>
                <div class="col-md-6" style="padding: 20px;">
                    <p style="text-indent: 2em;">
                        {{$context->description1}}
                    </p>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="container mb-3">
        <div class="holiday">
            <h3 style="margin-bottom: 50px;">Why need to visit</h3>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card" style="border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);padding:20px;height:300px;">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Natural Beauty</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Experience stunning landscapes with lush greenery, crystal-clear lakes, and majestic mountains. A perfect backdrop for your relaxation and adventures.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);padding:20px;height:300px;">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Peaceful Retreat</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Escape the daily hustle and unwind in a tranquil, serene environment. Enjoy the peaceful atmosphere and rejuvenate your mind and body.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);padding:20px;height:300px;">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Perfect Weather</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Bask in perpetually pleasant weather with abundant sunshine and gentle breezes, ideal for leisurely strolls and outdoor activities year-round.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

@endsection
