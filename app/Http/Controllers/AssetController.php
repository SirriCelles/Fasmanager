<?php

namespace App\Http\Controllers;

use App\Asset;
use App\Campus;
use Validator;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
      */
    public function index()
    {
        //
        $assetCategory = [
            'Tangible Asset',
            'Intangible Asset',
            'Building'
        ];

        $tangibleAssetType = [
            'Land',
            'Vehicle',
            'Stock',
            'Cash',
            'Marketable Sercurities',
            'Other'
        ];

        $intangibleAssetType = [
            'Lease',
            'Dept',
            'Patent',
            'Trademark',
            'Tradename',
            'Software',
            'Goodwill',
            'Intellectual Property'
        ];

        $buildingType = [
            'Block',
            'Dormitory',
            'Canteen',
            'Church',
            'Lab',
            'Garage',
            'Research Center',
            'Gym(sport space)',
            'Other'
        ];

        $operatingStatus = [
            'Excellent',
            'Good',
            'Fair',
            'Poor',
            'Bad',
            'Beyond repair',
            'Other'
        ];

        $useFrequency = [
            'Hourly',
            'Daily',
            'Weekly',
            'Bi-weekly',
            'Mothly',
            'On command',
            'Other'
        ];

        $depreciationLevel = [
            'Working',
            'Needs maintainance',
            'Beyond repair',
            'Other'
        ];

         return view('cam/campus')->with('assetCategory', $assetCategory )->with('tangibleAssetType', $tangibleAssetType)->with('intangibleAssetType', $intangibleAssetType)
        ->with('buildingType',$buildingType)->with('operatingStatus', $operatingStatus)->with('useFrequency', $useFrequency)
        ->with('depreciationLevel', $depreciationLevel);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //this is to show all available assets
        $id = $request->input('selectedAssetId');
        $asset = Asset::find($id);
        $assetLocation = $asset->campus->campus_name;

        $response = [];
        if($asset){
            $response = [
                'status' => true,
                'asset' => $asset,
                'assetLocation' => $assetLocation
            ];
        }
        else{
            $response = [
                'status' => false,
                'asset' => "Asset not found, verify id"
            ];           

        }

        return response()->json($response, 200);
         
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //setting validation logic
        $validation = Validator::make($request->all(), [
                'assetCategory' => 'required',
                'name' => 'required',
                'assetLocation' => 'required',
                'purchasedDate' => 'required',
                'purchaseValue' => 'required',
                'economicValue' => 'required',
                'number' => 'required',
                'ownership' => 'required',
                'operatingStatus' => 'required',
                'usage' => 'required',
                'assetDescription' => 'required',
                
                
        ]);

        $val_errors = array();
        $val_success = '';
        
        if($validation->fails())
        {
            foreach ($validation->messages()->all() as $field_name => $messages)
            {
                $val_errors[] = $messages;
            }
        }

        else
        {
            $asset = new Asset();
            $asset->name = $request->get('name');
            
            $asset->number = $request->input('number');
            $asset->category = $request->input('assetCategory');
            $asset->tangibleAssetType = $request->input('t_assetType');
            $asset->intangibleAssetType = $request->input('it_assetType');
            $asset->buildingType = $request->input('buildingType');
            $asset->campus_fk_id = $request->input('assetLocation');
            $asset->purchasedDate = $request->input('purchasedDate');
            $asset->purchasedValue = $request->input('purchaseValue');
            $asset->economicValue = $request->input('economicValue');
            $asset->ownership = $request->input('ownership');
            $asset->operatingStatus = $request->input('operatingStatus');
            $asset->useFrequency = $request->input('usage');
            $asset->description = $request->input('assetDescription');
            $asset->depreciationLevel = $request->input('depreciationLevel');

            $asset->save();

            $val_success = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>'.$request->get('name')." ".'Added</div>';
            
        }

        $output = [
            'error' => $val_errors,
            'success' => $val_success
        ];

        return response()->json($output, 200);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $id = $request->input('id');
        $asset = Asset::find($id);
        $assetLocation = $asset->campus->campus_name;
        $campus_id = $asset->campus->campus_id;

        $response = [];
        if($asset){
            $response = [
                'status' => true,
                'asset' => $asset,
                'campus_name' => $assetLocation,
                'campus_id' => $campus_id
            ];
        }
        else{
            $response = [
                'status' => false,
                'asset' => "Asset not found, verify id"
            ];           

        }

        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //setting validation logic
        $validation = Validator::make($request->all(), [
            'assetCategory' => 'required',
            'name' => 'required',
            'assetLocation' => 'required',
            'purchasedDate' => 'required',
            'purchaseValue' => 'required',
            'economicValue' => 'required',
            'number' => 'required',
            'ownership' => 'required',
            'operatingStatus' => 'required',
            'usage' => 'required',
            'assetDescription' => 'required',
            
            
        ]);

        $val_errors = array();
        $val_success = '';
        
        if($validation->fails())
        {
            foreach ($validation->messages()->all() as $field_name => $messages)
            {
                $val_errors[] = $messages;
            }
        }

        else
        {
            $id = $request->get('upDateId');
            $asset = Asset::find($id);        
            $asset->name = $request->get('name');        
            $asset->number = $request->input('number');
            $asset->category = $request->input('assetCategory');
            $asset->tangibleAssetType = $request->input('t_assetType');
            $asset->intangibleAssetType = $request->input('it_assetType');
            $asset->buildingType = $request->input('buildingType');
            $asset->campus_fk_id = $request->input('assetLocation');
            $asset->purchasedDate = $request->input('purchasedDate');
            $asset->purchasedValue = $request->input('purchaseValue');
            $asset->economicValue = $request->input('economicValue');
            $asset->ownership = $request->input('ownership');
            $asset->operatingStatus = $request->input('operatingStatus');
            $asset->useFrequency = $request->input('usage');
            $asset->description = $request->input('assetDescription');
            $asset->depreciationLevel = $request->input('depreciationLevel');

            $asset->save();

            $val_success = '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>'.$request->get('name')." ".'Updated</div>';
            
        }

        $output = [
            'error' => $val_errors,
            'success' => $val_success
        ];

        return response()->json($output, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $asset = Asset::find($id);
        //$asset->campus()->dissociate();
        $asset->delete();

        $message = '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>'.$asset->name." ".'has been deleted</div>';
        $response = array(
            'status' => true,
            'message' => $message
        );
        return response()->json($response, 200);
    }
}
