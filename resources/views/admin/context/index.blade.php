@extends('admin.dashboard')
@section('title',"Contact")
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5 p-3 border-0">
                <div class="card-header">
                    <div class="card-title">
                        <h4>Context Edit Form</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.context.update',1)}}">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Climate Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" name="description" id="description">{{$context->description}}</textarea>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Situation Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" name="description1" id="description">{{$context->description1}}</textarea>
                            </div>
                        </div>

                        <button class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

     <script>
        $(document).ready(function() {

            @if (session('successmsg'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success...',
                    text: '{{ session('successmsg') }}',
                });
            @endif
        });
    </script>
@endsection


