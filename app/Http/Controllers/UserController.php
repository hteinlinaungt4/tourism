<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Book;
use App\Models\About;
use App\Models\Contact;
use App\Models\Context;
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
    //   public function index(Request $request){
    //     $package = Package::paginate(3); // 2 items per page

    //     if ($request->ajax()) {
    //         return view('user.component.package', compact('package'))->render();
    //     }

    //     return view('user.dashboard', compact('package'));
    // }
    public function index()
    {
        $context = Context::find(1);
        return view('user.dashboard',compact('context'));
    }

    public function myprofile()
    {
        return view('user.myprofile');
    }

    public function book($id)
    {
        $books = Book::where('user_id', $id)->with('user', 'package')->get();
        return view('admin.userbook.index', compact('books'));
    }

    public function userlist()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.userlist.userlist', compact('users'));
    }

    public function contact()
    {
        $contact = Contact::find(1);
        return view('user.contact',compact('contact'));
    }



    public function about()
    {
        $about = About::find(1);
        return view('user.about', compact('about'));
    }

    function changepasswordpage()
    {
        return view('user.updatepassword');
    }
    // ChangePassword
    function changepassword(Request $request)
    {
        $this->ValidationCheck($request);
        $id = Auth::user()->id;
        $oldpassword = User::select('password')->where('id', $id)->first();
        $oldpassword = $oldpassword->password;
        if (Hash::check($request->oldpassword, $oldpassword)) {
            $data = [
                'password' => Hash::make($request->newpassword),
            ];
            User::where('id', $id)->update($data);
            Auth::guard('web')->logout();
            return redirect()
                ->route('user.dashboard')
                ->with(['successmsg' => 'You are Changed Password SuccessFully!']);
        } else {
            return back()->with(['doesnot' => 'You are oldpassword does not match!']);
        }
    }

    function updatemyprofile(Request $request)
    {
        $id = Auth::user()->id;
        $updateData = $this->getData($request);
        User::where('id', $id)->update($updateData);
        return redirect()->route('user.dashboard');
    }

    private function getData($request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        return $data;
    }

    private function ValidationCheck($request)
    {
        $validation = [
            'oldpassword' => 'required|min:6|max:10',
            'newpassword' => 'required|min:6|max:10',
            'comfirmpassword' => 'required|min:6|max:10|same:newpassword',
        ];
        Validator::make($request->all(), $validation)->validate();
    }

    public function favremove($id)
    {
        $user = Auth::user();
        $package = Package::findOrFail($id);
        if ($user->packages()->where('package_id', $id)->exists()) {
            $user->packages()->detach($id);
            $data = [
                'msg' => 'success',
            ];
            return response()->json($data, 200);
        }
        $data = [
            'msg' => 'Fail',
        ];
        return response()->json($data, 400);
    }

    public function addfav($id)
    {
        $package = Package::findorFail($id);
        $user = Auth::user();
        if (
            !$user
                ->packages()
                ->where('package_id', $package->id)
                ->exists()
        ) {
            $user->packages()->attach($package);
        }
        $data = [
            'msg' => 'Success',
        ];
        return response()->json($data, 200);
    }

    public function fav()
    {
        $user = Auth::user();
        $fav = $user->packages;
        return view('user.fav', compact('fav'));
    }
}
