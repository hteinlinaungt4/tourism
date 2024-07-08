@extends('admin.dashboard')
@section('title', 'Brand')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5 p-3 border-0">
                    <div class="card-header bg-white">
                        <a href="{{ route('package.create') }}" class=" text-decoration-none btn btn-sm btn-primary"><i
                                class="fa-solid fa-circle-plus"></i> Add New</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center w-100 display nowrap" id="usertable">
                            <thead>
                                <th>Package</th>
                                <th>Email</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th class="nosort">Actions</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script>
        $(document).ready(function() {
            var table = $('#usertable').DataTable({
                mark: true,
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '/ssd/book',
                columns: [{
                        data: 'package_id',
                        name: 'package_id'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },

                    {
                        data: 'fromdate',
                        name: 'fromdate'
                    },
                    {
                        data: 'todate',
                        name: 'todate'
                    },
                    {
                        data: 'comment',
                        name: 'comment'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        class: 'text-center'
                    }
                ],
                columnDefs: [{
                    orderable: false,
                    targets: 'nosort'
                }, ],
            });
            @if (session('successmsg'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success...',
                    text: '{{ session('successmsg') }}',
                });
            @endif
            $(document).on('click', '.pending, .confirm, .cancel', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var action = $(this).hasClass('pending') ? 'pending' : $(this).hasClass('confirm') ?
                    'confirm' : 'cancel';
                var url = `book/${id}/${action}`;

                Swal.fire({
                    title: `Are you sure you want to ${action}?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                                method: "POST",
                                url: url,
                                data: {
                                    _token: '{{ csrf_token() }}'
                                }
                            })
                            .done(function(msg) {
                                table.ajax.reload();
                                Swal.fire(
                                    `${action.charAt(0).toUpperCase() + action.slice(1)}!`,
                                    `Booking successfully ${action}ed.`,
                                    'success'
                                );
                            });
                    }
                });
            });



        });
    </script>
@endsection
