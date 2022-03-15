<?php

namespace App\Http\Controllers;

use App\CheckAdmin;
use App\User;
use App\Role;
use App\Privilege;
use Auth;
use Session;
use Validator;


use Illuminate\Http\Request;

class RoleController extends Controller
{
    //
    public function index()
    {  
        $manage_roles_priv =  Privilege::where("pslug", "manage-roles")->first();
        if($this->checkPrivilege($manage_roles_priv)){
            $role = Role::all();

            return view('roles')->with('roles', $role);
        }else{
            $message = "You do not have the right access!";
            Session::flash("error", $message);
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {   
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required'
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
            $role = new Role([
                'name' => $request->get('name'),
                'slug' => $request->get('slug'),
                'description' => $request->get('description')
            ]);
            $role->save();
            $success_output = '<div class="alert alert-success">New Role Added</div>';
        }

        
        $output = array(
            'error' => $error_array,
            'success' => $success_output
        );

        echo json_encode($output);

        // $role->name = $request->input('name');
        // $role->slug = $request->input('slug');
        // $role->description = $request->input('description');
        // $role->name = $request->input('slug');

       
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        $role = Role::find($id);
        
        $response=[];
        if($role){
             
            $response=[
                'status'=>true,
                'role'=>$role,
                
            ];
        }else{
                
            $response=[
                'status'=>false,
                'role'=>"Sorry this record encountered an errror"
            ];
        }
        return response()->json($response, 200);

    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required'
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
            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->slug = $request->input('slug');
            $role->description = $request->input('description');

            $role->save();
            $success_output = '<div class="alert alert-success">Data Updated</div>';

        }
        $response = array();
    
        
            $response =
            [
                'error' => $error_array,
                'success' => $success_output
            ];

        return response()->json($response);
         
        
        //return redirect('roles')->with('success', 'Done');
    }


    // public function updateRole(Request $request)
    // {
    //      $role_id = $request->input('role_id');
    //      $role = Role::find($role_id);
    //      $role->name = $request->input('name');
    //      $role->name = $request->input('slug');
    //      $role->description = $request->input('description');

    //     $role->save();
    //     return redirect('roles')->with('success', 'Done');
    // }


    public function destroy($id)
    {
         $id = $request->get('id');
         $role = Role::find($id);
         $role->users()->delete();

         $role->delete();
         $response = array(
            'status' => true,
            'message' => "Data Deleted"
        );
        return response()->json($response);
    }



    // public function destroy(Request $request)
    // {
    //      $role_id = $request->input('role_id');
    //      $role = Role::find($role_id);
    //      $role->users()->delete();

    //      $role->delete();
    //     return redirect('roles')->with('danger','Role Deleted!!');
    // }

    // public function userRole(Request $request)
    // {
    //     return view('user');
    // }

   

    public function permissionDenied()
    {
        return view('nopermission');
    }
}
