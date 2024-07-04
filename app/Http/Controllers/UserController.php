<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Package;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Log\Logger;
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




    public function userlist(){
        return view('admin.userlist.index');
    }


    public function ssd(){
        $user=User::where('role','user');
        return DataTables::of($user)
        ->addColumn('actions', function($each) {
            return '<button class="btn btn-success role-btn" data-id="' . $each->id . '" >Change to Admin</button>';
        })
        ->rawColumns(['actions'])
        ->make(true);
    }

    public function usertoadmin(Request $request,$userId){

        $user = User::findOrFail($userId);

        // Update the user's role based on the role data sent via AJAX request
        $user->role = $request->role; // Assuming the role data is sent in the request

        // Save the updated user
        $user->save();

        // Return a success response
        return response()->json(['message' => 'User role changed successfully']);
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
