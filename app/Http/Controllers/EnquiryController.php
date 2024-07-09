<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

class EnquiryController extends Controller
{
    //

    public function index(){
        return view('user.enquiry');
    }

    public function store(Request $request){
        $enquiry = new Enquiry();
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phone = $request->phone;
        $enquiry->subject = $request->subject;
        $enquiry->description = $request->description;
        $enquiry->save();

        return redirect()->route('enquiry')->with(['successmsg' => 'You are Created Successfully!']);
    }
}
