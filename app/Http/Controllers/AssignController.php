<?php

namespace App\Http\Controllers;
use App\Role;
use App\Privilege;
use App\User;
use App\PrivilegeRole;
use Auth;
use Illuminate\Http\Request;


class AssignController extends Controller
{
    //

    public function index()

    {  
              
        
    }

    public function show(Request $request)
    {
        $id = $request->get('id');
        //dd($id);
        $role = Role::find($id);
        
         $rolePrivilege = $role->privileges()->get();
         
         
        $response = array();

        if($rolePrivilege->count() > 0)
        {
            $response = 
            [
                'status' => true,
                'privOutput' => $rolePrivilege
            ];
        }
        else
        {
            $response = 
            [
                'status' => false,
                'privOutput' => false
            ];
        }

        return response()->json($response, 200);

        


    }

    public function store(Request $request)
    {
        $role_id = $request->input('id');        
        $privileges_checked = $request->input('privileges_checked');
        //dd($privileges_checked);
        $privileges_unchecked = $request->input('privileges_unchecked');
        //dd($privileges_unchecked);
        foreach ($privileges_checked as $privilege){

            $privilegeRole = PrivilegeRole::updateOrCreate(
                ['role_id' => $role_id, 'privilege_id' => $privilege]
            );
        }

        foreach ($privileges_unchecked as $privilege_unchecked) {
            $privilegeNotRole = PrivilegeRole::where(['role_id' => $role_id, 'privilege_id' => $privilege_unchecked])->delete();

        }


            
//$privilegeRole = PrivilegeRole::where(['role_id' => $role_id, 'privilege_id' => $privilege])->updateOrCreate();
           
        

        $response = array();
        $message =  '<div class="alert alert-info"> Current record Saved </div>';

        $response =[
            'status' => true,
            'message' => $message
        ];

           return response()->json($response, 200);
        
    }

    

    public function update(Request $request)
    {
        $id = $request->input('id');
        $role = Role::find($id);
        $role->privileges()->detach();
        //dd($role);

        $privileges_checked = $request->input('privileges_checked');

        $privileges_unchecked = $request->input('privileges_unchecked');
        
        foreach($privileges_checked as $input)
        {
            //dd($input);
            $role->privileges()->attach($input);
        }

        foreach($privileges_unchecked as $output)
        {
            $role->privileges()->detach($output);
        }

        $response = array();
        $message =  '<div class="alert alert-info"> Current record Saved </div>';

        $response =[
            'status' => true,
            'message' => $message
        ];

           return response()->json($response, 200);
    }

    public function assignPrivileges(Request $request)

    {
        $role_id = $request->input('role');
        //dd($role_id);
        //dd($role_id);
        //$privilege_id[] = $request->input('privilege');
        
        
        $role = Role::find($role_id);

        
        

        
        

        // $privilege = Privilege::find($privilege_id);

        // $privilege->roles()->attach($role_id);

        $p_input = $request->input('privilege');
        foreach($p_input as $input) {
            $role->privileges()->attach($input);
            

        }

        
        // $p_array = array($p_input);
        // $role->privileges()->sync($p_array);
              
        
       
        return redirect('assign')->with('success', 'privilege has been assigned');
           
    }
}
