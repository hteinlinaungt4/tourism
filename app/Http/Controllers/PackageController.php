<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
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
            'name2' => 'required|unique:packages,name2',
            'name3' => 'required|unique:packages,name3',
            'name4' => 'required|unique:packages,name4',
            'name5' => 'required|unique:packages,name5',
            'packageType' => 'required',
            'description1' => 'required',
            'description2' => 'required',
            'description3' => 'required',
            'description4' => 'required',
            'location' => 'required',
            'price' => 'required',
            'features' => 'required',
            'details' => 'required',
            'packageType' => 'required',
            'image1' => 'required|mimes:jpg,jpeg,png|file',
            'image2' => 'required|mimes:jpg,jpeg,png|file',
            'image3' => 'required|mimes:jpg,jpeg,png|file',
            'image4' => 'required|mimes:jpg,jpeg,png|file',
            'image5' => 'required|mimes:jpg,jpeg,png|file',
        ];
        Validator::make($request->all(),$validation)->validate();

        $package = new Package();
        $images = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile('image' . $i)) {
                // Delete the old image if a new one is uploaded
                if ($package->{'image' . $i}) {
                    Storage::delete('public/packages/' . $package->{'image' . $i});
                }

                $file = $request->file('image' . $i);
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/packages', $filename);
                $images['image' . $i] = $filename;
            } else {
                $images['image' . $i] = $package->{'image' . $i};  // Preserve the existing image if no new image is uploaded
            }
        }

        $package->name = $request->name;
        $package->name2 = $request->name2;
        $package->name3 = $request->name3;
        $package->name4 = $request->name4;
        $package->name5 = $request->name5;
        $package->packageType = $request->packageType;
        $package->location = $request->location;
        $package->price = $request->price;
        $package->features = $request->features;
        $package->details = $request->details;
        $package->packageType = $request->packageType;
        $package->image1 = $images['image1'];
        $package->image2 = $images['image2'];
        $package->image3 = $images['image3'];
        $package->image4 = $images['image4'];
        $package->image5 = $images['image5'];
        $package->description1 = $request->description1;
        $package->description2 = $request->description2;
        $package->description3 = $request->description3;
        $package->description4 = $request->description4;
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
        $images = [];
        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile('image' . $i)) {
                // Delete the old image if a new one is uploaded
                if ($package->{'image' . $i}) {
                    Storage::delete('public/packages/' . $package->{'image' . $i});
                }

                $file = $request->file('image' . $i);
                $filename = uniqid() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/packages', $filename);
                $images['image' . $i] = $filename;
            } else {
                $images['image' . $i] = $package->{'image' . $i};  // Preserve the existing image if no new image is uploaded
            }
        }

        $package->image1 = $images['image1'];
        $package->image2 = $images['image2'];
        $package->image3 = $images['image3'];
        $package->image4 = $images['image4'];
        $package->image5 = $images['image5'];

        $package->name = $request->name;
        $package->name1 = $request->name1;
        $package->name2 = $request->name2;
        $package->name3 = $request->name3;
        $package->name4 = $request->name4;
        $package->name5 = $request->name5;

        $package->packageType = $request->packageType;
        $package->location = $request->location;
        $package->price = $request->price;
        $package->features = $request->features;
        $package->details = $request->details;
        $package->packageType = $request->packageType;
        $package->description1 = $request->description1;
        $package->description2 = $request->description2;
        $package->description3 = $request->description3;
        $package->description4 = $request->description4;
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
        $package = Package::where('id',$id)->first();
        return view('user.packagedetail',compact('package'));
    }


    public function packages(Request $request){
        $packages = Package::paginate(4); // 3 items per page
        $user = Auth::user();
        $favPackages = [];

        if ($user) {
            $favPackages = $user->packages->pluck('id')->toArray();
        }

        if ($request->ajax()) {
            return view('user.component.package', compact('packages', 'favPackages'))->render();
        }

        return view('user.package', compact('packages', 'favPackages'));
    }



}
