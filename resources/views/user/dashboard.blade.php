@extends('user.master.layout')
@section('title',"Home")
@section('content')

    <div class="banner">
        <div class="container">
            <!-- <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;" style="color:#000 !important"> TMS - Tourism Management System</h1> -->
        </div>
    </div>

    <!---holiday---->
    <div class="container">
        <div class="holiday">

            <h3>Package List</h3>

            <div id="package-list">
                @include('user.component.package', ['package' => $package])
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).on('click', '.pagination a', function(event) {
    event.preventDefault();
    var page = $(this).attr('href').split('page=')[1];
    fetchPackages(page);
});

function fetchPackages(page) {
    $.ajax({
        url: "/user/dashboard?page=" + page,
        success: function(data) {
            $('#package-list').html(data);
        },
        error: function(xhr, status, error) {
        }
    });
}

</script>

@endsection
