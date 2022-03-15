<!-- Modal to add new equipment -->
<div class="modal fade" id="addEquipmentModal">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content" style="background-color: #e6f2ff; border: 2px;">
            <!--modal header -->
            <div class="modal-header p-2" style="border: none;">                
                <h6 class="modal-title modal-edit">
                    <i class="material-icons">add</i>
                    Add a new equipment</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>                                                   
            </div>
            <div class="modal-header p-1 m-2 rounded">              
                <div class="d-flex flex-row">
                    <div>
                        <button type="submit" class="btn btn-primary rounded-0" id="saveNewEquipment">
                                <i class="material-icons" style="font-size:20px;">save</i>Save
                        </button> 
                    </div>
                    {{-- <div>
                        <button type="submit" class="btn btn-primary rounded-0" id="saveNewEquipment">
                                <i class="material-icons" style="font-size:20px;">save</i>Save
                        </button> 
                    </div> --}}
                </div>                                   
            </div>

            <!--Modal body -->
            <div class="modal-body" style="border: none;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">                            
                           <form class="form-group" style="padding: 0;" id="defaultEform">
                                {{csrf_field()}}
                               <div class="row">
                                <div class="col-sm-7">                                                                                      
                                    <div class="form-group">
                                        <label for="description" class="col-sm-3">Description:</label>
                                        <input type="text" class="form-control-sm" name="Description" id="eDescription">                                    
                                    </div>                                     
                                    <div class="form-group">
                                        <label for="type" class="col-sm-3">Type:</label>
                                        <select class="form-control-sm" id="eqmType" name="Type">
                                            <option selected disabled>Select a type</option>
                                            @foreach ($etypes as $etype)
                                                <option value="{{$etype->id}}">{{$etype->type}}</option>
                                            @endforeach                                                                                    
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="location" class="col-sm-3">Location:</label>
                                        <select class="form-control-sm" id="eLocation" name="eLocation">
                                            <option selected disabled>Select item</option>
                                            @foreach ($campuses as $campus)
                                                <option value="{{$campus->id}}">{{$campus->campus_name}}</option>
                                            @endforeach                                                                                    
                                        </select>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="manufacturer" class="col-sm-3">Manufacturer:</label>
                                        <input type="text" class="form-control-sm" name="Manufacturer" id="eManufacturer">                                    
                                    </div>
                                    <div class="form-group">
                                        <label for="brand" class="col-sm-3">Brand:</label>
                                        <input type="text" class="form-control-sm" name="Brand" id="eBrand">                                    
                                    </div>
                                    <div class="form-group">
                                        <label for="model" class="col-sm-3">Model:</label>
                                        <input type="text" class="form-control-sm" name="Model" id="eModel">                                    
                                    </div>                                                                                                                                           
                                </div>
                                <div class="col-sm-5">
                                        <span id="addform_alert" style="width: 80%;"></span>
                                    </div> 
                               </div>
                           </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 border" style="background-color:white;">
                            <div class="container-fluid mt-3">                                   
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#general">General</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#finance">Finance</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#notes">Notes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#service">Service</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#history">History</a>
                                    </li>
                                </ul>
                                
                                <!-- Tab panes -->
                                <!-- Tab to display the general info of equipement-->
                                <div class="tab-content" style="background-color: #e6f2ff;">
                                    <div id="general" class="container tab-pane active"><br>                                        
                                        @include('assets/general')
                                    </div>  
                                    <!-- Tab to display the financial info of equipement-->                                  
                                    <div id="finance" class="container tab-pane fade"><br>
                                        @include('assets/finance')                                  
                                    </div>
                                    <div id="notes" class="container tab-pane fade"><br>
                                        will contain notes about the equipment be it hand writen or just a link to a given equipments.
                                        it will also contain some attachments
                                    </div>
                                    <div id="service" class="container tab-pane fade"><br>
                                        this will contain all information about the precise location of our equipment 
                                        it will also contain information about who is using that equipement--
                                    </div>
                                    <div id="history" class="container tab-pane fade"><br>
                                        will conatin the check out and check in history of a particular equipement--
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- the footer -->
            <div class="modal-footer m-3" id="addEquipmentModalFooter" style="border: none;">
                <div class="d-flex flex-row">
                    <div class="mr-3">
                        <input type="hidden" id="update_equipment_id" value="" name="update_equipment_id">
                        <button type="button" class="btn btn-primary rounded-0" id="updateEquipment">
                            <i class="material-icons" style="font-size:20px;">update</i>Update
                        </button>                        
                    </div>                    
                    <div class="mx-3" id="deleteEquipment_div">
                        <button type="submit" class="btn btn-danger rounded-0" id="delete_equipment">
                            <i class="material-icons" style="font-size:20px">delete</i>Delete
                        </button>
                    </div>
                    <div>
                        <button type="button" class="btn btn-secondary rounded-0 mx-3" data-dismiss="modal">Close</button>
                    </div>
                </div>                
                
            </div>
        </div>
    </div>
</div>

{{-- delete modal --}}
<div class="modal fade bg-warning" id="delete_eqm_modal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title"></h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div id="confirm_eqm">
                <small>Are you sure you want to delete this Equipment?
                </small>
            </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
                <button type="button" class="btn btn-danger delete_eqm">yes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        </div>
        
        </div>
    </div>
</div>

