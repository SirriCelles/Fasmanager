<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\EquipmentType;
use App\Campus;
use Validator;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentStatus = [
            'Excellent',
            'Good',
            'Bad',
            'in Storage',
            'Loaned out',
            'Beyond repair',
            'Other'
        ];

        $useFrequency = [
            'Hourly',
            'Daily',
            'Weekly',
            'Bi-weekly',
            'Monthly',
            'On command',
            'Other'
        ];

        $depreciationLevel = [
            'Working',
            'Needs maintainance',
            'Beyond repair',
            'Other'
        ];        

        
        return view('/assets/equipment')->with('currentStatus',$currentStatus)->with('useFrequency',$useFrequency)->with('depreciationLevel',$depreciationLevel);
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
            'Description' => 'required',
            'Type' => 'required',
            //'eLocation' => 'required',
            'Manufacturer' => 'required',
            'Brand' => 'required',
            'Condition' => 'required',
            'Custodian' => 'required',
            'current_status' => 'required',
            'use_frequency' => 'required',
            'Notes' => 'required',
            'purchased_date' => 'required',
            'purchased_price' => 'required',           
        ]);
        //$description = $request->input('Description');
        //$defaulform = $request->get('defaultform')." apend ".$description;
        //dd($defaulform);             

        $errors = [];
        $success = '';
        if($validation->fails())
        {
            foreach ($validation->messages()->all() as $field_name => $messages)
            {
                $errors[] = $messages;
            }
        }
        else 
        {
            $item = new Equipment();
            $item->description = $request->get('Description');
            $item->brand = $request->get('Brand');
            $item->manufacturer = $request->get('Manufacturer');
            $item->model = $request->get('Model');
            $item->equipmentType_id = $request->get('Type');
            $item->econdition = $request->get('Condition');
            $item->purchased_date = $request->get('purchased_date');
            $item->purchased_value = $request->get('purchased_price');
            $item->serial_number = $request->get('serial_number');
            $item->current_value = $request->get('current_value');
            $item->scrap_value = $request->get('ScrapValue');
            $item->use_frequency = $request->get('use_frequency');
            $item->current_status = $request->get('current_status');        
            $item->vendor = $request->get('Vendor');
            $item->notes = $request->get('Notes');
            $item->custodian = $request->get('Custodian');
            $item->date_of_start_use = $request->get('in_use_from');
            $item->expiration_date = $request->get('exDate');
            $item->depreciation_level = $request->get('depreciation_level');
            $item->image_path = $request->get('Image');

            $item->save();   
            
            $success = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>New Equipment added</div>';

        }

        $data = [
            'error' => $errors,
            'success' => $success
        ];

        return response()->json($data, 200);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->input('id');
        //dd($id);

        $eqm = Equipment::find($id);
        $etype = $eqm->etype->type;
        $data = [
            'eqm' => $eqm,
            'etype'=>$etype,
            'status' => true
        ];
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'Description' => 'required',
            'Type' => 'required',
            //'eLocation' => 'required',
            'Manufacturer' => 'required',
            'Brand' => 'required',
            'Condition' => 'required',
            'Custodian' => 'required',
            'current_status' => 'required',
            'use_frequency' => 'required',
            'Notes' => 'required',
            'purchased_date' => 'required',
            'purchased_price' => 'required',           
        ]);

        $errors = [];
        $success = '';
        if($validation->fails())
        {
            foreach ($validation->messages()->all() as $field_name => $messages)
            {
                $errors[] = $messages;
            }
        }
        else
        {
            $id = $request->get('id');
            //dd($id);
            $item = Equipment::find($id);
            $item->description = $request->get('Description');
            $item->brand = $request->get('Brand');
            $item->manufacturer = $request->get('Manufacturer');
            $item->model = $request->get('Model');
            $item->equipmentType_id = $request->get('Type');
            $item->econdition = $request->get('Condition');
            $item->purchased_date = $request->get('purchased_date');
            $item->purchased_value = $request->get('purchased_price');
            $item->serial_number = $request->get('serial_number');
            $item->current_value = $request->get('current_value');
            $item->scrap_value = $request->get('ScrapValue');
            $item->use_frequency = $request->get('use_frequency');
            $item->current_status = $request->get('current_status');        
            $item->vendor = $request->get('Vendor');
            $item->notes = $request->get('Notes');
            $item->custodian = $request->get('Custodian');
            $item->date_of_start_use = $request->get('in_use_from');
            $item->expiration_date = $request->get('exDate');
            $item->depreciation_level = $request->get('depreciation_level');
            $item->image_path = $request->get('Image');

            $item->save();   
            
            $success = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$request->get('Description').' Updated</div>';
        }

        $data = [
            'error' => $errors,
            'success' => $success
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->get('id');
        dd($id);
        $item = Equipment::find($id)->delete();

        $message = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>Equipment Deleted</div>';

        $data = [
            'status' => true,
            'message' => $message
        ];
    }
}
