<?php

namespace App\Http\Controllers;

use App\Room;
use App\Block;
use App\RoomType;
use Validator;
use App\Http\Requests\StoreAddRoom;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    //query all rooms in the rooms table from our Datbase.
    public function index()
    {
        $room = Room::all();
        // $blocks = Block::all();

        // $roomtypes = RoomType::all();

        return view('rooms')->with('rooms', $room);



    }

        // return view('room', [
        //     "blocks" => $blocks,
        //     "roomtypes" => $roomtypes,
        // ]);
        
        //with('roomtypes', $r)->with('blocks', $bl);

        //(compact('roomtype'))->with(compact('blocks')); 
        //  [
        //     'blocks' => $blocks,
            
        //     ]);

        //this method will output a drop down menu in our view page
    // public function AddRoom()
    // {
    //     $roomtypes = RoomType::all(['room_type_id', 'room_type']);

    //     $blocks = Block::all(['block_id', 'block_name']);


    //     //return view('add', compact('roomtypes', 'blocks'));


    //      return view('add')->with('roomtypes', $roomtypes)->with('blocks', $blocks);

    // }
    

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
    public function store( Request $request)
    {
        //settin validation message
        $validation = Validator::make($request->all(), [
            'room_name' => 'required',
            'room_type' => 'required',
            'block' => 'required', 
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
            //creating new records
            $room = new Room([

                'room_name' => $request->get('room_name'),
                'room_capacity' => $request->get('room_capacity'),
                'description' => $request->get('description'),
                'status' => $request->get('status'),
                'roomtype_fk_id' => $request->get('room_type'),
                'block_fk_id' => $request->get('block'),
            ]);
            
            $room->save();

            $success_output = '<div class="alert alert-success">Room Added</div>';

            // $room->room_name = $request->input('room_name');
            // $room->room_capacity = $request->input('room_capacity');
            // $room->description = $request->input('description');
            // $room->status = $request->input('status');
            // $room->roomtype_fk_id = $request->input('room_type');
            // $room->block_fk_id = $request->input('block');
            
            
        }

        $output = array(
            'error' => $error_array,
            'success' => $success_output
        );

        echo json_encode($output);
        

        

        //return redirect()->back()->with('success', 'New Room Added');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */



    public function edit(Request $request)
    {
        
        $id = $request->input('id');

        $room = Room::find($id);
        $block = Block::find($room->block_fk_id);
        $roomtype = RoomType::find($room->roomtype_fk_id);

        $response = array();

        if($room) 
        {
            $response =[
                
                'room' => $room,
                'block'=> $block,
                'roomtype' => $roomtype
            ];
        }
        else{
            $response=[
                'status' => false,
                'room' => "Room Not found"
            ];
        }

        
        return response()->json($response, 200);
        //dd($room);
        //return view('editroom')->with('room', $room)->with('roomtypes', $roomtypes)->with('blocks', $blocks);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //settin validation message
        $validation = Validator::make($request->all(), [
            'room_name' => 'required',
            'room_type' => 'required',
            'block' => 'required',
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
            $room = Room::find($id);
        
            $room->room_name = $request->get('room_name');
            $room->room_capacity = $request->get('room_capacity');
            $room->description = $request->get('description');
            $room->status = $request->get('status');
            $room->roomtype_fk_id = $request->input('room_type');
            $room->block_fk_id = $request->get('block');
            $room->save();

            $success_output =  '<div class="alert alert-success">Data Updated</div>';

        }

        $response = array(
            'error' => $error_array,
            'success' => $success_output
        );

        echo json_encode($response); 



        // $room_id=$request->input('room_id');

        // $room = Room::find($room_id);
        
        // $room->room_name = $request->input('room_name');
        // $room->room_capacity = $request->input('room_capacity');
        // $room->description = $request->input('description');
        // $room->roomtype_fk_id = $request->input('room_type');
        // $room->block_fk_id = $request->input('block_name');
        // $room->status = $request->input('active');
        

        // $room->save();

        // return redirect('/rooms')->with('room', $room)->with('success', 'Room Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        
         //$this->id = $delete_id;
         $id = $request->input('id');
        $room = Room::find($id);

        $room->delete();
        

        $response = array(
            'status' => true,
            'message' => "Data Deleted"
        );
        return response()->json($response, 200);
        // return redirect('/rooms')->with('success', 'Record deleted');

    }

    // $blocks = DB::table('blocks')->select('block_id', 'block_name')->get();
    // dd($blocks);

// implimenting the search functionality in rooms.
    // public function search() 
    // {
    //     //
    //     return redirect('/rooms');
    // }

    public function searchRoom(Request $request)
    {
        $search = $request->get('search');
        $room = Room::where('room_name','LIKE','%'.$search.'%')->select('room_name', 'room_capacity', 'description','status','block_fk_id', 'roomtype_fk_id')->get();
        
        
        if($room->count() > 0) 


            return view('rooms')->with('searchs', $search)->with('rooms', $room);
            // compact('search_r','room_names'));

        else return redirect('/rooms')->with('error', 'No details found. Try with a different name');

       
    }
}
