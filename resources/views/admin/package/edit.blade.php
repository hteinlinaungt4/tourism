@extends('admin.dashboard')
@section('title',"Package Edit")
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Package</h2>
    </div>
    <div class="card-body">
        <form action="{{route('package.update',$package->id)}}" class="w-50 mx-auto" method="POST" enctype="multipart/form-data">
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
            <img class="object-cover" style="width:130px;height:130px" src="{{asset('storage/packages/'.$package->image1)}}" alt="">
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
                        <input type="text" value="{{$package->name2}}" name="name2" class="form-control my-5" placeholder="Enter Name">
                        <label for="">Image</label>
                        <input type="file" class="form-control @error('image2') is-invalid @enderror" name="image2" >
                        @error ('image2')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <img class="object-cover" style="width:130px;height:130px" src="{{asset('storage/packages/'.$package->image2)}}" alt="">

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description1" class="form-control  @error('description1') is-invalid @enderror" rows="6" placeholder="Enter description ...">{{$package->description1}}</textarea>
                        @error ('description1')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" value="{{$package->name3}}" name="name3" class="form-control my-5" placeholder="Enter Name">
                        <label for="">Image</label>
                        <input type="file" class="form-control @error('image3') is-invalid @enderror" name="image3" >
                        @error ('image3')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <img class="object-cover" style="width:130px;height:130px" src="{{asset('storage/packages/'.$package->image3)}}" alt="">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description2" class="form-control  @error('description2') is-invalid @enderror" rows="6" placeholder="Enter description ...">{{$package->description2}}</textarea>
                        @error ('description2')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" value="{{$package->name4}}" name="name4" class="form-control my-5" placeholder="Enter Name">
                        <label for="">Image</label>
                        <input type="file" class="form-control @error('image4') is-invalid @enderror" name="image4" >
                        @error ('image4')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <img class="object-cover" style="width:130px;height:130px" src="{{asset('storage/packages/'.$package->image4)}}" alt="">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description3" class="form-control  @error('description3') is-invalid @enderror" rows="6" placeholder="Enter description ...">{{$package->description3}}</textarea>
                        @error ('description3')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" value="{{$package->name5}}" name="name5" class="form-control my-5" placeholder="Enter Name">
                        <label for="">Image</label>
                        <input type="file" class="form-control @error('image5') is-invalid @enderror" name="image5" >
                        @error ('image5')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <img class="object-cover" style="width:130px;height:130px" src="{{asset('storage/packages/'.$package->image5)}}" alt="">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description4" class="form-control  @error('description4') is-invalid @enderror" rows="6" placeholder="Enter description ...">{{$package->description4}}</textarea>
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
