@extends('layouts.ndesign')

@section('main_content')
@php
    $etypes = App\EquipmentType::withCount('equipment')->get();
    $campuses = App\Campus::all();
    $eItems = App\Equipment::with('etype')->get();
    //$etypes->load('equipment');

    //$all_types = DB::table('etype')->where('subtype', '=', 'All Types')->get();
    //$other_types = DB::table('etype')->where('subtype', '=', 'All Types')->get();
    //$all_types = $etypes->where('subtype','All Types')->get();  
     //dd($all_types);    
    // foreach ($etypes as $etype) {       
    //     $array = [];
    //     array_push($array,$etype->subtype);        
    //     $arrlength = count($array);
    //     //$varr = print_r($array);
        
    //     // for ($i=0; $i < $arrlength ; $i++) {           
    //     //     if($array[$i] == ){
    //     //         echo "<ul>                   
    //     //                 <li>
    //     //                 <a href='#'>$etype->type</a>
    //     //                 </li>               
    //     //             </ul>";
    //     //     }
    //     //     if($array[$i] !== $all_types) {
    //     //         echo $etype->type.$etype->id.$etype->subtype;
    //     //     }
    //     // }  
        
    // }   
    
@endphp
    <div class="container-fluid">
        <!-- Nav tabs --> 
        <ul class="nav nav-tabs">
            <li class="nav-item">
            <a class="nav-link active btn-outline-primary shadow my-1 rounded-0" data-toggle="tab" href="#viewEquipment">
                <img src="<?php echo asset('/images/equip.png')?>" alt="equipment icon" style="width:20px;" class="rounded">
                Equipment</a>
            </li>
            <li class="nav-item">
            <a class="nav-link btn-outline-primary shadow my-1 rounded-0" data-toggle="tab" href="#equipmentReport">Report</a>
            </li>
            <li class="nav-item">
            <a class="nav-link btn-outline-primary shadow my-1 rounded-0" data-toggle="tab" href="#">Menu 2</a>
            </li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- This a tab that display all equipements -->
            <div class="tab-pane active container-fluid" id="viewEquipment">
                <div class="row">
                    <!-- column to display all equipment type-->
                    <div class="col-sm-2">                        
                       <div class="mt-4" >
                           <div class="list-group list-group-flush" id ="etype_list" >
                                @foreach ($etypes as $etype)                                                            
                                <li class="list-group-item list-group-item-action 
                                    list-group-item-light d-flex justify-content-between align-items-center" 
                                    style="border: none margin: 0px;" value="{{$etype->id}}">                                                                        
                                    {{$etype->type}}                                    
                                    <span class="badge badge-primary badge-pill">{{$etype->equipment_count}}</span>                                                                                                                                                          
                                </li>
                                @endforeach                               
                            </div>
                        </div>      
                                                                                               
                    </div>
                    <!-- start of colunm-->
                    <div class="col-sm-10">
                        <div class="bg-light">
                            <div class="m-3">
                                <h4>All Types</h4>
                            </div>
                            <div>
                                <div class="clearfix">
                                    <div class="float-left">
                                        <div class="d-flex">
                                            <div class="mr-4">
                                                <button type="button" class="btn btn-info shadow rounded-0" data-toggle="modal" id="addEquipmentTypeButton">
                                                    <i class="material-icons" style="font-size: 20px;color:whitesmoke">add_box</i>New Type
                                                </button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-info shadow rounded-0" data-toggle="modal" id="addEquipmentButton">
                                                    <i class="material-icons" style="font-size: 20px;color:whitesmoke">add_box</i>New Equipment
                                                </button>
                                            </div>
                                                                                        
                                        </div>
                                    </div>
                                    <div class="float-right">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control"  id="searchEquipment" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="submit">
                                                    <i class="material-icons" style="font-size:20px">search</i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>                                 
                            </div>
                        </div>                       
                       <div>
                            <table class="table table-bordered table-hover table-sm mt-3">
                                <thead>
                                    <tr>
                                        <th>Barcode</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Brand</th>
                                        <th>Status</th>
                                        <th>Condition</th>
                                    </tr>
                                </thead>
                                <tbody id="equipmentTableBody">
                                    @foreach ($eItems as $eItem)
                                    <tr id="{{ $eItem->id }}" class="equip_row">
                                        
                                        <td>{{ $eItem->id }}</td>
                                        <td>{{$eItem->etype->type}}</td>
                                        <td>{{$eItem->description}}</td>
                                        <td>{{$eItem->brand}}</td>
                                        <td>{{$eItem->current_status}}</td>
                                        <td>{{$eItem->econdition}}</td>                                                                               
                                    </tr>                                    
                                    @endforeach                                   
                                </tbody>
    
                            </table>
                        </div>
                    </div>
                    <!-- end of colunm-->                    
                </div>
            </div>
            <div class="tab-pane container" id="equipmentReport">...</div>
            <div class="tab-pane container" id="">...</div>
        </div>
    </div>

@include('assets/addEquipment')
@include('assets/etype')


    
@endsection