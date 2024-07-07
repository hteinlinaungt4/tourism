@extends('admin.dashboard')
@section('title',"Category")
@section('count')
@endsection
@section('content')
   <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h2>User Account Lists</h2>
        <span class="fs-3 float-end fw-bold">Total: {{ count($users) }}</span>
    </div>
    <div class="card-body">
        <table class="table table-data2  table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Booking List</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="tr-shadow">

                    <td>
                        <input hidden type="text" id="userid" value="{{ $user->id }}">
                        {{$user ->name}}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        {{ $user->phone }}
                    </td>
                    <td>
                        {{ $user->address }}
                    </td>
                    <td>
                        <a href="{{route('user.book',$user->id)}}" class="bg-info btn text-white">Booking List</a>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   </div>
@endsection

