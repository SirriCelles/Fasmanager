<?php

namespace App\Http\Controllers;
use App\EquipmentType;
use Validator;

use Illuminate\Http\Request;

class EquipmentTypeController extends Controller
{
    //
    public function create(Request $request) 
    {
        //
        $validation = Validator::make($request->all(), [
            'etype' => 'required',
            
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
            $etype = new EquipmentType([
                'type' => $request->get('etype'),
                'subtype' => $request->get('eSubtype')
            ]);
            $etype->save();
    
            $success_output = '<div class="alert alert-succes alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$request->get('etype')." ".'Added</div>';  
        }

        
        $response = [
            'error' => $error_array,
            'success' => $success_output
        ];

         return response()->json($response, 200);

    }

    public function edit(Request $request)
    {
        $id = $request->get('id');
        $etype = EquipmentType::find($id);

        $data = [
            'etype' => $etype,
            'status' => true
        ];
       

        return response()->json($data, 200);
        
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'etype' => 'required',
            
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
            $id = $request->get('id');
            $etype =  EquipmentType::find($id);
            
            $etype->type = $request->input('etype');
            $etype->subtype = $request->input('eSubtype');

            $etype->save();
    
            $success_output = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$request->get('etype')." ".'Added</div>';  
        }

        
        $response = [
            'error' => $error_array,
            'success' => $success_output
        ];

         return response()->json($response, 200);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $etype = EquipmentType::find($id);
        //$asset->campus()->dissociate();
        $etype->delete();

        $message = '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>'.$etype->type." ".'has been deleted</div>';
        $response = array(
            'status' => true,
            'message' => $message
        );
        return response()->json($response, 200);
    }
}
