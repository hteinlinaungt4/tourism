@extends('user.master.layout')
@section('title', 'Change Password')
@section('content')
<div class="container centered-div">
    <div class="col-12 col-md-6">
        <form action="{{ route('userpassword#change') }}" method="post" class="w-100" novalidate="novalidate">
            @csrf
            <div class="form-group mb-3">
                <label for="old-password" class="control-label mb-1">Old Password</label>
                <input id="old-password" value="" name="oldpassword" type="password" class="form-control @error('oldpassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Old password ..">
                @error('oldpassword')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="new-password" class="control-label mb-1">New Password</label>
                <input id="new-password" value="" name="newpassword" type="password" class="form-control @error('newpassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="New password ..">
                @error('newpassword')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="confirm-password" class="control-label mb-1">Confirm Password</label>
                <input id="confirm-password" value="" name="comfirmpassword" type="password" class="form-control @error('comfirmpassword') is-invalid @enderror" aria-required="true" aria-invalid="false" placeholder="Confirm password ..">
                @error('comfirmpassword')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div>
                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block w-100 my-3">
                    <span id="payment-button-amount">Change Password</span>
                    <span id="payment-button-sending" style="display:none;">Sending…</span>
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
