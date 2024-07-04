<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.package.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.package.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = [
            'name' => 'required|unique:packages,name',
            'packageType' => 'required',
            'location' => 'required',
            'price' => 'required',
            'features' => 'required',
            'details' => 'required',
            'packageType' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png|file',
        ];
        Validator::make($request->all(),$validation)->validate();

        if($request->hasFile('image')){
            $filename =uniqid().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/packages',$filename);
        }

        $package = new Package();
        $package->name = $request->name;
        $package->packageType = $request->packageType;
        $package->location = $request->location;
        $package->price = $request->price;
        $package->features = $request->features;
        $package->details = $request->details;
        $package->packageType = $request->packageType;
        $package->image = $filename;
        $package->save();

        return redirect()->route('package.index')->with(['successmsg' => 'You are Created Successfully!']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $package=Package::findorFail($id);
        return view('admin.package.edit',compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $package=Package::findorFail($id);

        if($request->hasFile('image')){
            $oldimage=$package->image;
            if($oldimage != null){
                Storage::delete('public/packages/'.$oldimage);
            }
            $filename =uniqid().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/packages',$filename);
            $package->image = $filename;
        }

        $package->name = $request->name;
        $package->packageType = $request->packageType;
        $package->location = $request->location;
        $package->price = $request->price;
        $package->features = $request->features;
        $package->details = $request->details;
        $package->packageType = $request->packageType;
        $package->update();
        return redirect()->route('package.index')->with(['successmsg' => 'You are Created Successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $package=Package::findorFail($id);
        $oldimage=$package->image;
        if($oldimage != null){
            Storage::delete('public/packages/'.$oldimage);
         }

        $package->delete();
        $data=[
            'msg' => 'success',
        ];
        return response()->json($data, 200);
    }

    public function ssd(){
        $brand=Package::query();
        return DataTables::of($brand)
        ->addColumn('actions',function($each){
            $edit = '<a href="'.route('package.edit',$each->id).'" class="text-primary shadow p-2"><i class="fa-regular fa-pen-to-square p-1 fw-bold"></i></a>';
            $delete='<a href="#" class=" delete_btn text-danger shadow  p-2" data-id="'.$each->id.'" ><i class="fa-solid fa-trash p-1 fw-bold"></i></a>';
            return '<div class="d-flex justify-content-center">'.
                    $edit.$delete
                    .'</div>';
        })
        ->rawColumns(['actions'])
        ->make(true);
    }


    public function detail($id){
        $package = Package::findorFail($id)->first();
        return view('user.packagedetail',compact('package'));
    }

}
