<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    
    public function AllType(){
        $types = PropertyType::latest()->get();
        return view('backend.type.all_type',compact('types'));
    }// end method
    public function AddType(){
        return view('backend.type.add_type');
    }// end method

    public function StoreType(Request $request){
    //validation
    $request->validate([
    'type_name'=> 'required|unique:property_types|max:200',
    'type_icon'=> 'required'
    ]);

//insert property
PropertyType::insert([
    'type_name'=>$request->type_name,
    'type_icon'=>$request->type_icon,
]);
$notification= array(
    'message' => 'Property Successfully Created',
    'alert-type' => 'success'
 );


 return redirect()->route('all.type')->with($notification);
    }// end method

    public function EditType($id){
        $types = PropertyType::findOrFail($id);
        return view('backend.type.edit_type',compact('types'));
    }// end method

    public function UpdateType(Request $request){
       $pid=$request->id;
    
    //update property
    PropertyType::findOrFail($pid)->update([
        'type_name'=>$request->type_name,
        'type_icon'=>$request->type_icon,
    ]);
    $notification= array(
        'message' => 'Property Successfully Updated',
        'alert-type' => 'success'
     );
    
    
     return redirect()->route('all.type')->with($notification);
        }// end method

        public function DeleteType($id){
        
         //delete property
         PropertyType::findOrFail($id)->delete();
         $notification= array(
             'message' => 'Property Successfully Deleted',
             'alert-type' => 'success'
          );
         
        return redirect()->back()->with($notification);
        }
        // end method
}