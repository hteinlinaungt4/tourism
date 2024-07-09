<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Book;
use App\Models\Package;
use Illuminate\Log\Logger;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
      //
      public function index(Request $request){
        $package = Package::paginate(2); // 2 items per page

        if ($request->ajax()) {
            return view('user.component.package', compact('package'))->render();
        }

        return view('user.dashboard', compact('package'));
    }


    // public function detail($id){
    //     $vehicle=Vehicle::findorFail($id);
    //     $vehicles=Vehicle::paginate(3);
    //     return view('user.detail',compact('vehicle','vehicles'));
    // }

    public function myprofile(){
        return view('user.myprofile',);
    }

    public function book($id){
       $books=Book::where('user_id',$id)->with('user','package')->get();
       return view('admin.userbook.index',compact('books'));
    }


    public function userlist(){
        $users = User::where('role','user')->get();
        return view('admin.userlist.userlist',compact('users'));
    }








    public function contact(){
        return view('user.contact');
    }

    public function about(){
        return view('user.about');
    }


    function changepasswordpage(){
        return view('user.updatepassword');
    }
    // ChangePassword
    function changepassword(Request $request){
        $this->ValidationCheck($request);
        $id=Auth::user()->id;
        $oldpassword=User::select('password')->where('id',$id)->first();
        $oldpassword=$oldpassword->password;
        if(Hash::check($request->oldpassword,$oldpassword)){
            $data=[
                'password' => Hash::make( $request->newpassword),
            ];
            User::where('id',$id)->update($data);
            Auth::guard('web')->logout();
            return redirect()->route('user.dashboard');
        }else{
           return back()->with(['doesnot' => 'You are oldpassword does not match!']);
        }
    }

    function updatemyprofile(Request $request){
        $id=Auth::user()->id;
        $updateData=$this->getData($request);
        User::where('id',$id)->update($updateData);
        return redirect()->route('user.dashboard');
    }

    private function getData($request){
        $data=[
            'name' => $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'address'=> $request->address,
        ];
        return $data;

    }



    private function ValidationCheck($request){
        $validation=[
            'oldpassword' => 'required|min:6|max:10',
            'newpassword'=> 'required|min:6|max:10',
            'comfirmpassword' => 'required|min:6|max:10|same:newpassword'
        ];
        Validator::make($request->all(),$validation)->validate();
    }
}
