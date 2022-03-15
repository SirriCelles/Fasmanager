<!-- The Modal -->
<div class="modal" id="addEquipmentTypeModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #e6f2ff;">
    
            <!--modal header -->
            <div class="modal-header p-2">                            
                <h6 class="modal-title">                
                Creat New Equipment Type</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>                                                     
            </div>
        
            <!-- Modal body -->
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="bg-light" style="width=80%">
                                              
                        <div id="form_alert">some random text</div>
                    </div>
                    <form class="form-group" style="padding: 0;" id="addEquipmentTypeForm">
                        
                            {{csrf_field()}}
                        <div class="row m-2">
                            <div class="">                                                                                                                                                                                                                       
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="etype" id="etype" placeholder="New category">
                                    <div class="valid-feedback"></div>
                                    <div class="invalid-feedback">Please fill out this field</div>                                    
                                </div>
                                @php
                                    $etypes = App\EquipmentType::all();
                                @endphp                                                                                                                                           
                                <div class="form-group">
                                    <label for="usage">Sub-Type of</label>
                                    <select class="form-control" id="eSubtype" name="eSubtype">
                                        <option value="All Types" selected>All Types</option>
                                        @foreach ($etypes as $etype)
                                            <option value="{{$etype->type}}">{{$etype->type}}</option>
                                        @endforeach                                                                                
                                    </select>
                                </div>                                                                                                                                                           
                            </div>            
                        </div>                        
                    </form>                                            
                </div>
                {{-- delete alert box --}}
                <div class="card-footer bg-white" id="deleteEtypeCard">
                    <div class="card-text text-center">                                        
                        <div class="alert alert-warning alert-dismissible fade show" id="deleteEtypeAlert">
                            <div class="row mb-3">
                                <div class="">
                                    <strong>Are you sure you want to procceed??</strong>
                                    This Equipment Type and all Equipment related to it  will be Deleted!                                                        
                                </div>                                                                                               
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <button type="button" name="yes"  class="btn btn-danger yesDelete">Yes</button>                                                    
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" name="no" class="btn btn-secondary noDelete">No</button>
                                </div>                                                    
                            </div>
                            <div class="row mt-3 delPbar">
                                <div class="col-md-8">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width:50%">deleting...</div>
                                    </div>
                                </div>
                            </div>                                                                                                     
                        </div>
                    </div>
                </div>  
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="d-flex flex-row">
                    <div class="m-3">                        
                        <input type="submit" class="btn btn-outline-secondary rounded-0" value="ok" id="equipmentTypeSubmit">
                    </div>
                    <div class="m-3" id="update_etype_div">
                        <input type="hidden" id="update_etype_id" value="" name="update_etype_id">
                        <button type="submit" class="btn btn-outline-secondary rounded-0" id="update_etype">
                                <i class="material-icons" style="font-size:20px">update</i>Update
                        </button>
                    </div>
                    <div class="m-3" id="delete_etype_div">
                        <button type="submit" class="btn btn-danger rounded-0" id="delete_etype">
                            <i class="material-icons" style="font-size:20px">delete</i>Delete
                        </button>
                    </div>
                    <div class="m-3">
                        <button type="button" class="btn btn-outline-danger rounded-0" data-dismiss="modal">Close</button>
                    </div>
                </div>            
            </div>   
        </div>
    </div>
</div>