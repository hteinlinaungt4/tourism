@extends('admin.dashboard')
@section('title',"Package Edit")
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Package</h2>
    </div>
    <div class="card-body">
        <form action="{{route('package.update',$package->id)}}" class="w-50 mx-auto" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="">Package Name</label>
                <input type="text" value="{{$package->name}}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Brand Name ...">
                @error ('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Package Type</label>
                <input type="text" value="{{$package->packageType}}" class="form-control @error('packageType') is-invalid @enderror" name="packageType" placeholder="Enter Package Type ...">
                @error ('packageType')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Location</label>
                <input type="text" value="{{$package->location}}" class="form-control @error('location') is-invalid @enderror" name="location" placeholder="Enter Location ...">
                @error ('location')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" value="{{$package->price}}" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Enter Price ...">
                @error ('price')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Features</label>
                <input type="text" value="{{$package->features}}" class="form-control @error('features') is-invalid @enderror" name="features" placeholder="Enter Features ...">
                @error ('features')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Details</label>
                <textarea name="details" class="form-control  @error('details') is-invalid @enderror" rows="6" placeholder="Enter Detail ...">{{$package->details}}</textarea>
                @error ('details')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <img src="{{asset('storage/packages/'.$package->image)}}" width="150px" height="150px" alt="">
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" >
                @error ('image')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button class="btn btn-primary float-right">Create</button>
        </form>
    </div>
   </div>
@endsection
