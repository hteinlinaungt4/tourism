@extends('admin.dashboard')
@section('title', 'Brand')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5 p-3 border-0">
                    <div class="card-body">
                        <table class="table table-bordered text-center w-100 display nowrap" id="usertable">
                            <thead>
                                <th>Package</th>
                                <th>Email</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Comment</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->package->name }}</td>
                                    <td>{{ $book->user->email }}</td>
                                    <td>{{ $book->fromdate }}</td>
                                    <td>{{ $book->todate }}</td>
                                    <td>{{ $book->comment }}</td>
                                    @if ($book->status == '0')
                                        <td>Reject</td>
                                    @elseif($book->status == '1')
                                        <td>Pending</td>
                                    @else
                                        <td>Success</td>
                                    @endif
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
