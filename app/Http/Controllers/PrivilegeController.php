<?php

namespace App\Http\Controllers;
use App\Privilege;
use App\Role;
use Validator;
use Illuminate\Http\Request;

class PrivilegeController extends Controller
{
    //
    // public function start()
    // {
    //     $privilege = Privilage::all();

    //     return view('admin')->with('privilege', $privilege);
    // }
    public function index()
    {   
        
        
        
        $privilege = Privilege::all();
        //dd(url("$privilege->path"));
        
        return view('privileges')->with('privileges', $privilege);
    }

    public function store(Request $request) {

        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'path' => 'required',
            'pslug' => 'required'
        ]);

        $error_array = array();
        $success_output = ''; 
 
        if($validation->fails()) 
        {
            foreach($validation->messages()->all() as $field_name => $messages) 
            {
                $error_array[] = $messages;
            }
            
            
        }
        else
        {
            
            $privilege = new Privilege([
                'name' => $request->get('name'),
                'pslug' => $request->get('pslug'),
                'icon' => $request->get('icon'),
                'path' => $request->get('path'),
                
                'status' => $request->get('status'),
                'description' => $request->get('description'),
                
            ]);

            $privilege->save();
            $success_output = '<div class="alert alert-success">New Data Added</div>';
        }

        $response = array();
    
        
        $response =
        [
            'error' => $error_array,
            'success' => $success_output
        ];
    
        
    

    return response()->json($response, 200);



        // $request->validate([
        //     //'key' => 'required',
        //     'name' => 'required',
        //     //'description' => 'nullable',
        // ]);

        // $privileges = new Privilege;

       
        // $privileges->name = $request->input('name');
        // $privileges->icon = $request->input('icon');
        // $privileges->path = $request->input('path');
        
        // $privileges->status = $request->input('status');
        // $privileges->pslug = $request->input('pslug');
        // $privileges->description = $request->input('description');

        // $privileges->save();

        // return redirect('privileges')->with('success', 'Privilege Added');
    }

    public function show(Request $request) {
        $id=$request->input('id');
        $privilege = Privilege::find($id);
        
  
        
        $response=[];
        if($privilege){
             
            $response=[
                'status'=>true,
                'privilege'=>$privilege
            ];
        }
        else
        {
                
            $response=[
                'status'=>false,
                'privilege'=>"Privilege not found"
            ];
        }
        return response()->json($response, 200);
    }


    
    public function update(Request $request) {
        
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'path' => 'required',
            'pslug' => 'required'
        ]);

        $error_array = array();
        $success_output = ''; 
 
        if($validation->fails()) 
        {
            foreach($validation->messages()->all() as $field_name => $messages) 
            {
                $error_array[] = $messages;
            }
            
            
        }
        else
        {
            $id = $request->input('id');
            //dd($id);
            $privilege = Privilege::find($id);
     
            $privilege->name = $request->get('name');
            $privilege->icon = $request->get('icon');
            $privilege->path = $request->get('path');
            $privilege->pslug = $request->get('pslug');
            $privilege->status = $request->get('status');
            $privilege->description = $request->get('description');
    
            $privilege->save();
            $success_output =  '<div class="alert alert-success">Data Updated</div>';
        }

        $response = array();
    
        
            $response =
            [
                'error' => $error_array,
                'success' => $success_output
            ];

        return response()->json($response);
        
       

        // return response()->json([
        //     'error' => false,
        //     'privilege' => $privilege,
        // ], 200);
        // $response=[];
        // if($privilege){
             
        //     $response=[
        //         'status'=>true,
        //         'privilege'=>$privilege
        //     ];
        // }else{
                
        //     $response=[
        //         'status'=>false,
        //         'privilege'=>"Privilege not found"
        //     ];
        // }
        // return response()->json($response, 200);
        
    }   
    
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $privilege = Privilege::find($id)->delete();

        $response = array(
            'status' => true,
            'message' => "Data Deleted"
        );
        return response()->json($response, 200);

    }
   
}
