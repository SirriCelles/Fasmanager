
<div class="container-fluid">
        <form class="form-group" style="padding: 0;" id="generalEform">
                {{csrf_field()}}
            <div class="row">
                <div class="col-sm-7">                                                                                                                                                                                                                       
                    <div class="form-group">
                        <label for="snumber" class="col-sm-4">Serial number:</label>
                        <input type="text" class="form-control-sm" name="serial_number" id="eSN">                                    
                    </div>
                    <div class="form-group">
                        <label for="condition" class="col-sm-4">Condition:</label>
                        <input type="text" class="form-control-sm" name="Condition" id="eCondition">                                    
                    </div>
                    <div class="form-group">
                        <label for="custodian" class="col-sm-4">Custodian:</label>
                        <input type="text" class="form-control-sm" name="Custodian" id="eCustodian">                                    
                    </div>                    
                    <div class="form-group">
                        <label for="status" class="col-sm-4">Current Status:</label>
                        <select class="form-control-sm" id="current_status" name="current_status">
                            <option selected disabled>Select item</option>
                            @foreach ($currentStatus as $status)
                                <option value="{{$status}}">{{$status}}</option>
                            @endforeach                                                                
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="usage" class="col-sm-4">Use frequency:</label>
                        <select class="form-control-sm" id="use_frequency" name="use_frequency">
                            <option selected disabled>Select item</option>
                            @foreach ($useFrequency as $freq)
                                <option value="{{$freq}}">{{$freq}}</option> 
                            @endforeach
                                                                   
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="depLevel" class="col-sm-4">Depreciation level:</label>
                        <select class="form-control-sm" id="eDeplevel" name="depreciation_level">
                            <option selected disabled>Select item</option>
                            @foreach ($depreciationLevel as $depLevel)
                                <option value="{{$depLevel}}">{{$depLevel}}</option>
                            @endforeach                                                                    
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image" class="col-sm-4">Image:</label>
                        <input type="file" class="form-control-sm" name="Image" id="eImage">                                    
                    </div>
                    <div class="form-group">
                        <label for="notes" class="col-sm-4">Notes</label>
                        <textarea type="text" class="form-control" rows="3" name="Notes" id="eNotes" placeholder="Please enter Brief details of the item"></textarea>                                    
                    </div>                                                                                                                                                                                       
                </div>
                <div class="col-sm-5"> 
                    <span class="mt-5" style="background: white;">
                        <div class="card m-3" style="height: 70%;">
                            <img class="card-img-top" src="<?php echo asset('images/laptopdisplay.jpg');?>" alt="image of equipment" style="width: 100%" id="eImageViewer">                                                                                 
                            <div class="card-body">                                
                                <h5 class="card-title">name</h5>
                                <p class="card-text">description</p>
                            </div>
                        </div>
                    </span>                    
                </div>
            </div>
        </form>                                            
    </div>