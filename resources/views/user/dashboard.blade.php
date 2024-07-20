@extends('user.master.layout')
@section('title', 'Home')
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
                @include('user.component.package', ['packages' => $packages, 'favPackages' => $favPackages])
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
                error: function(xhr, status, error) {}
            });
        }

        @if (session('successmsg'))
            Swal.fire({
                icon: 'success',
                title: 'Success...',
                text: '{{ session('successmsg') }}',
            });
        @endif

        @if (session('wrong'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('wrong') }}',
            });
        @endif

        $(document).on('click', '.add-fav-btn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            var button = $(this);
            $.ajax({
                    method: "GET",
                    url: `/addfav/${id}`,
                })
                .done(function(msg) {
                    button.replaceWith(
                        '<a class="float-right"><i class="fa fa-heart" aria-hidden="true"></i></a>'
                        ); // Replace with full star icon
                });
        });
    </script>


@endsection
