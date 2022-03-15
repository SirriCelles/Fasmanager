<?php

namespace App\Http\Controllers;

use App\Block;
use App\Campus;
use Validator;
use App\Http\Requests\StoreAddBlock;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $block = Block::all();

        $campus = Campus::all();

        $num = count($campus);

        $i = 1;


        //$num = count($campus);

        return view('blocks.blocks')->with('blocks',$block)->with('campuses',$campus)->with('num', $num)->with('i', $i);
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
        //setting form validation logic
        $validation = Validator::make($request->all(), [
            'block_name' => 'required',
            'campus' => 'required'
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
            $block = new Block([
                'block_name' => $request->get('block_name'),
                'numof_rooms' => $request->get('num_of_rooms'),
                'campus_fk_id' => $request->get('campus')
            ]);
            $block->save();
            $success_output = '<div class="alert alert-success">Block Added</div>';
            
        }

        $output = array(
            'error' => $error_array,
            'success' => $success_output
        );

        echo json_encode($output);
        
        //creating records
        // $campus = Campus::all();
        // $block = new Block;

        // $block->block_name = $request->input('block_name');
        // $block->numof_rooms = $request->input('num_of_rooms');
        // $block->campus_fk_id = $request->input('campus_name');

       

        

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

        $block = Block::find($id);
        $campus = Campus::find($block->campus_fk_id);
        //$block_cam = Block::find($id);

        
        $response=[];
        if($block){
             
            $response=[
                'status'=>true,
                'block'=>$block,
                'campus' => $campus
            ];
        }else{
                
            $response=[
                'status'=>false,
                'block'=>"block not found"
            ];
        }
        return response()->json($response, 200);
        
        // $output = array(
        //     'status' => true,
        //     'block' => $block
        // );
         
            
                // 'campus_fk' => $blocks->campus_fk_id,
                //'campus' => $campus
                //'block_cam' => $block_cam->campus->campus_id

            //  echo json_encode($output);
        //return response()->json($response,200);
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
        // $blocks = Block::find($id);

        // $campus = Campus::all();

        // return view('/blocks/edit')->with('blocks', $blocks)->with('campuses', $campus);
    }


    
        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateBlock(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'block_name' => 'required',
            'campus' => 'required'
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
            $block = Block::find($id);
            
            $block->block_name = $request->input('block_name');
            $block->numof_rooms = $request->input('numof_rooms');
            $block->campus_fk_id = $request->input('campus');
          
            $block->save();
            $success_output = '<div class="alert alert-success">Block Updated</div>';
            
        }

        $response = array();
    
        
            $response =
            [
                'error' => $error_array,
                'success' => $success_output
            ];
        
            
        

        return response()->json($response, 200);
        
        // Updates the edit.blade
    //     $block_d_id = $request->input('block_d_id');
    //     $campus = Campus::all();
    //     $block = Block::find($block_d_id);

    //     $block->block_name = $request->input('block_name');
    //     $block->numof_rooms = $request->input('num_of_rooms');
    //     $block->campus_fk_id = $request->input('campus_name');

    //     $block->save();

    //     return redirect('blocks/blocks')->with('campuses', $campus)->with('success', 'Block Updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($request)
    {
        //

        
    }

    public function DeleteBlock(Request $request)
    {
        $id = $request->input('id');

        $block = Block::find($id);
        $block->delete();

        $response = array(
            'status' => true,
            'message' => "Data Deleted"
        );
        return response()->json($response, 200);
    }

    public function searchBlock(Request $request)
    {
        $search = $request->get('search');
        $block = Block::where('block_name','LIKE','%'.$search.'%')->select('block_name', 'numof_rooms', 'campus_fk_id')->get();
        
        
        if($block->count() > 0) 


            return view('blocks/blocks')->with('searchs', $search)->with('blocks', $block);
            // compact('search_r','room_names'));

        else return redirect('blocks/blocks')->with('error', 'No details found. Try with a different name');

       
    }

    
}
