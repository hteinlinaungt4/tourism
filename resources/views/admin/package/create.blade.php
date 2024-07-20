@extends('admin.dashboard')
@section('title',"Brand Create")
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Create Package</h2>
    </div>
    <div class="card-body">
        <form action="{{route('package.store')}}" class="w-50 mx-auto" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Package Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Package Name ...">
                @error ('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Package Type</label>
                <input type="text" class="form-control @error('packageType') is-invalid @enderror" name="packageType" placeholder="Enter Package Type ...">
                @error ('packageType')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Location</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" name="location" placeholder="Enter Location ...">
                @error ('location')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Enter Price ...">
                @error ('price')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Features</label>
                <input type="text" class="form-control @error('features') is-invalid @enderror" name="features" placeholder="Enter Features ...">
                @error ('features')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Details</label>
                <textarea name="details" class="form-control  @error('details') is-invalid @enderror" rows="6" placeholder="Enter Detail ..."></textarea>
                @error ('details')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Cover Photo</label>
                <input type="file" class="form-control @error('image1') is-invalid @enderror" name="image1" >
                @error ('image1')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control @error('image2') is-invalid @enderror" name="image2" >
                        @error ('image2')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <input type="text" name="name2" class="form-control my-5" placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description1" class="form-control  @error('description1') is-invalid @enderror" rows="6" placeholder="Enter description ..."></textarea>
                        @error ('description1')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control @error('image3') is-invalid @enderror" name="image3" >
                        @error ('image3')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <input type="text" name="name3" class="form-control my-5" placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description2" class="form-control  @error('description2') is-invalid @enderror" rows="6" placeholder="Enter description ..."></textarea>
                        @error ('description2')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control @error('image4') is-invalid @enderror" name="image4" >
                        @error ('image4')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <input type="text" name="name4" class="form-control my-5" placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description3" class="form-control  @error('description3') is-invalid @enderror" rows="6" placeholder="Enter description ..."></textarea>
                        @error ('description3')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control @error('image5') is-invalid @enderror" name="image5" >
                        @error ('image5')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <input type="text" name="name5" class="form-control my-5" placeholder="Enter Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description4" class="form-control  @error('description4') is-invalid @enderror" rows="6" placeholder="Enter description ..."></textarea>
                        @error ('description4')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <button class="btn btn-primary float-right">Create</button>
        </form>
    </div>
   </div>
@endsection
