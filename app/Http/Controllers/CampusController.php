<?php

namespace App\Http\Controllers;

use App\Campus;
use Validator;
//use App\University;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $campus = Campus::all();
        
        // return view('cam.campus')->with('campuses', $campus);
        return view('cam.campus');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //setting form validation logic
        $validation = Validator::make($request->all(), [
            'campus_name' => 'required',
            'location' => 'required',
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
            $campus = new Campus([
                'campus_name' => $request->get('campus_name'),
                'location' => $request->get('location'),
                'description' => $request->get('description')
                
            ]);
            $campus->save();
                       

            $success_output = '<div class="alert alert-success">'.$request->get('campus_name')." ".'Added</div>';
            
        }

        $output = array(
            'error' => $error_array,
            'success' => $success_output
        );

        echo json_encode($output);
        
    }

    public function campusDetails(Request $request) 
    {
        $id = $request->get('id');
        $campus = Campus::find($id);

        $response=[];
        if($campus){
             
            $response=[
                'status'=>true,
                'campus' => $campus
            ];
        }else{
                
            $response=[
                'status'=>false,
                'campus'=>"campus not found"
            ];
        }
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)

    {
        $id = $request->input('id');
        $campus = Campus::find($id);

        $response=[];
        if($campus){
             
            $response=[
                'status'=>true,
                'campus' => $campus
            ];
        }else{
                
            $response=[
                'status'=>false,
                'campus'=>"campus not found"
            ];
        }
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validation = Validator::make($request->all(), [
            'campus_name' => 'required',
            'location' => 'required',
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
            $campus =  Campus::find($id);

            $cam_name = $request->input('campus_name');
            $campus->campus_name = $request->input('campus_name');
            $campus->location = $request->input('location');
            $campus->description = $request->get('description');
                
            $campus->save();

            $success_output = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$cam_name." ".'updated</div>';
            
            
        }

        $response = array();
    
        
            $response =
            [
                'error' => $error_array,
                'success' => $success_output
            ];
        
            
        

        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->input('id');

        $campus = Campus::find($id);
        $campus->blocks()->delete();
        $campus->delete();

        $response = array(
            'status' => true,
            'message' => "Data Deleted"
        );
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $campus = Campus::find($id);

        // return view('cam/edit')->with('campus',$campus);
    }

    public function UpdateCampus(Request $request)
     {
    //     // Updates the cam/edit.blade

    //     $campus_id = $request->input('campus_id');

    //     $campus = Campus::find($campus_id);

    //     $campus->campus_name = $request->input('campus_name');
    //     $campus->numof_blocks = $request->input('num_of_blocks');
    //     $campus->location = $request->input('location');

    //     $campus->save();

    //     return redirect('cam/campus')->with('success', 'Row Successfully Updated');
    }



    public function DeleteCampus(Request $request)
    {
        // $cam_d_id = $request->input('cam_d_id');

        // $campus = Campus::find($cam_d_id);
        // $campus->blocks()->delete();
       
        

        // $campus->delete();
        
       

        // return redirect('cam/campus')->with('success', 'Row Successfully Deleted');
    }

    
}
