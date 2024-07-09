<!-- top-header -->
@extends('user.master.layout')
@section('title', 'Enquiry')
@section('content')

    <!-- top-header -->
    <div class="top-header">
        <div class="banner-1 ">
            <div class="container">

            </div>
        </div>
        <!--- /banner-1 ---->
        <!--- privacy ---->
        <div class="privacy">
            <div class="container">
                <h3 class="wow fadeInDown animated animated" data-wow-delay=".5s"
                    style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Enquiry Form
                </h3>

                @session('successmsg')
                <div class="succWrap"><strong>SUCCESS</strong>: {{session('successmsg')}} </div>
                @endsession


                <form name="enquiry" method="post" action="{{route('enquiry.store')}}">
                    @csrf
                    <p style="width: 350px;">

                        <b>Full name</b> <input type="text" name="name" class="form-control" id="fname"
                            placeholder="Full Name" required="">
                    </p>
                    <p style="width: 350px;">
                        <b>Email</b> <input type="email" name="email" class="form-control" id="email"
                            placeholder="Email" required="">
                    </p>

                    <p style="width: 350px;">
                        <b>Mobile No</b> <input type="number" name="phone" class="form-control" id="mobileno"
                            maxlength="10" placeholder="10 Digit mobile No" required="">
                    </p>

                    <p style="width: 350px;">
                        <b>Subject</b> <input type="text" name="subject" class="form-control" id="subject"
                            placeholder="Subject" required="">
                    </p>
                    <p style="width: 350px;">
                        <b>Description</b>
                        <textarea name="description" class="form-control" rows="6" cols="50" id="description"
                            placeholder="Description" required=""></textarea>
                    </p>

                    <p style="width: 350px;">
                        <button type="submit"  class="btn-primary btn">Submit</button>
                    </p>
                </form>


            </div>
        </div>

    @endsection
