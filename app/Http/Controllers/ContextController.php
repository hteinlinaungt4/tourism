<?php

namespace App\Http\Controllers;

use App\Models\Context;
use Illuminate\Http\Request;

class ContextController extends Controller
{
    public function index(){
        $context=Context::find(1);
        return view('admin.context.index',compact('context'));
    }

    public function update(Request $request,$id){
       $contact = Context::findorFail($id);
       $contact->description = $request->description;
       $contact->description1 = $request->description1;
       $contact->save();
       return redirect()
       ->route('admin.context')
       ->with(['successmsg' => 'Context Updated successfully!']);
    }
}
