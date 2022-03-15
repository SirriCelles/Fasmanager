<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\RoomType;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roomtypes = RoomType::all();
        return view('createroom',compact('roomtypes'));
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
        $validation = Validator::make($request->all(), [
            'room_type' => 'required',
            //'description' => 'required',
        ]);

        $error_array = array();
        $success_output = '';

        if ($validation->fails())
        {
            $error_array[] = $validation->messages()->first();
            // foreach ($validation->messages()->geMessages() as $field_name => $messages)
            // {
            //     $error_array[] = $messages;
            // }
        }
        else
        {
            if($request->get('button_action') == "insert") 
            {
                $roomtype = new RoomType([
                    'room_type' => $request->get('room_type'),
                    'description' => $request->get('description')
                ]);

                $roomtype->save();

                $success_output = '<div class="alert alert-success">Data Added</div>';
            }
        }

        $output = array(
            'error' => $error_array,
            'success' => $success_output
        );

        echo json_encode($output);

        

        // $roomtype->room_type = $request->input('room_type');
        // $roomtype->description = $request->input('description');

        // $roomtype->save();

        // return redirect()->back()->with('success','Room Type Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   
        $id = $request->input('id');
        
        $roomtype = RoomType::find($id);

        
        $response = array(
            'status' => true,
            'roomtype' => $roomtype
            // 'description' => $roomtype->description,
            //'roomtype_id'=> $roomtype->room_type_id
        );
        return response()->json($response, 200);

        // $response = array();
        // if($roomtype) 
        // {
        //     $response=[
        //         'status' => true,
        //         'roomtype' => $roomtype
        //     ];
        // }
        // else
        // {
        //     $response=[
        //         'status' => false,
        //         'roomtype' => 'Sorry this Room Type seems to have a problem'
        //     ];

        //     return response()->json($response, 200);
        // }

        // return view ('editRoomType')->with('roomtype', $roomtype);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */

    public function UpdateRoomType(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'room_type' => 'required',
            //'description' => 'required',
        ]);

        $error_array = array();
        $success_output = '';

        if ($validation->fails())
        {
            $error_array[] = $validation->messages()->first();
            // foreach ($validation->messages()->geMessages() as $field_name => $messages)
            // {
            //     $error_array[] = $messages;
            // }
        }
        else
        {
            // if($request->get('button_editaction') == "edit") 
            // {
                
            // }
            $id = $request->get('id');
                $roomtype = RoomType::find($id);
                $roomtype->room_type = $request->get('room_type'); 
                $roomtype->description = $request->get('description');
                $roomtype->save();

                $success_output =  '<div class="alert alert-success">Data Updated</div>';
        }

        $response = array(
            'error' => $error_array,
            'success' => $success_output
        );

        echo json_encode($response);

        //return response()->json($response, 200);

        // $roomtype_eid = $request->input('roomtype_eid');

        // $roomtype = RoomType::find($roomtype_eid);
        // $roomtype->room_type = $request->input('room_type');
        // $roomtype->description = $request->input('description');

        // $roomtype->save();

        //return redirect('createroom')->with('success', 'Row Successfully Updated');

    }


    public function update(Request $request)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DeleteRoomType(Request $request)
    {
        $id = $request->input('id');
        $roomtype = RoomType::find($id);
        $roomtype->rooms()->delete();
        $roomtype->delete();

        $response = array(
            'status' => true,
            'message' => "Room Deleted"
        );
        return response()->json($response, 200);

        // $rtype_d_id = $request->input('rtype_d_id');

        // $roomtype = RoomType::find($rtype_d_id);
        
        // $roomtype->rooms()->delete();

        // $roomtype->delete();


        // return redirect('createroom')->with('success', 'Row Deleted');
    }
}
