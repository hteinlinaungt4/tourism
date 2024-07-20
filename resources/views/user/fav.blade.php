@extends('user.master.layout')
@section('title', 'My Fav Lists')
@section('content')
    <div style="min-height: 80vh;">
        <h2 class="text-center title" >Favourite Lists</h2>
        <div class="container">
            @foreach ($fav as $p)
                <div class="rom-btm">

                    <div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
                            <a href="{{ route('package.detail.list', $p->id) }}">
                            <img src="{{ asset('storage/packages/' . $p->image1) }}" class="img-responsive" alt="">
                            </a>
                        </div>
                    <div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">

                        <h4>Package Name: {{ $p->name }}</h4>
                        <h6>Package Type : {{ $p->packageType }}</h6>
                        <p><b>Package Location :</b> {{ $p->location }}</p>
                        <p><b>Features</b> {{ $p->features }}</p>
                    </div>
                    <div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
                        <h5>{{ $p->price }} MMK</h5>
                        <button data-id="{{ $p->id }}" class="btn btn-danger btn-sm mt-5 delete_btn">Remove
                            Favourite</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            @endforeach
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).on('click', '.delete_btn', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure you want to Remove Favourite List?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                            method: "GET",
                            url: `favdelete/${id}`,
                        })
                        .done(function(msg) {
                            Swal.fire(
                                'Canceled!',
                                'Your are successfully Remove Favourite List.',
                                'success'
                            ).then(() => {
                                location.reload(); // Reload the page
                            });
                        });

                }
            })
        })
    </script>
@endsection
