    
<div class="container">
    <!-- The Asset Modal -->
  <div class="modal fade" id="assetModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Manage Assets</h4>
                    <div class="dropdown">
                        <button class="bg-black float-right dropdown-toggle shadow my-2" data-toggle="dropdown">
                        </button>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item" data-dismiss="modal"><i class="material-icons" style="font-size: 1.1em;">close</i>close</a>
                            <a href="#" class="dropdown-item refresh"><i class="material-icons" style="font-size: 1.1em;">refresh</i>refresh</a>                            
                        </div>
                    </div>                    
                    
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    {{-- Nav tabs --}}
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link btn-outline-secondary shadow my-1" data-toggle="tab" href="#viewAsset">View Asset</a>
                        </li>
                        <li class="nav-item" id="seeDetailsNavTab">
                            <a class="nav-link btn-outline-secondary shadow my-1" href="#viewAssetDetails">See Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-secondary shadow my-1 addAssetTab" href="#addAsset">Add Asset</a>
                        </li>
                        <li class="nav-item" id="goToAddAssetTab">
                            <a class="nav-link btn-outline-secondary shadow my-1" href="#goToAddAssetTab">Add Asset</a>
                        </li>
                        
                    </ul>

                    {{-- Tab panes --}}
                    <div class="tab-content mt-4">
                        {{-- simple UI to view details of selected asset --}}
                        <div class="tab-pane container fade" id="viewAsset">
                            
                            <p class="glyphicon-text-color">
                                <input type="radio" disabled="disabled" checked="checked"> Select asset to see details
                            </p>
                            <table class="table table-borderedless table-hover" id="" style="width:80%;">                                     
                                <thead>                              
                                                                                     
                                    <tr>
                                        {{-- <th>Number</th> --}}
                                        <th>Asset Name</th>
                                        <th>Location</th>                                                                                                                
                                    </tr>
                                </thead>
                                @php
                                    $assets = App\Asset::with('campus')->get();

                                @endphp
                                <tbody>                                                         
                                @foreach ($assets as $key => $asset )                                    
                                     <tr>
                                        {{-- <td>{{$key+1}}</td> --}}
                                        <td>                        
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" 
                                                    id="viewAssetName" name="viewAssetName" value="{{$asset->id}}">{{$asset->name}}
                                                </label>
                                            </div>   
                                        </td>
                                        <td>{{$asset->campus->campus_name}}</td>                                                
    
                                    </tr>       
                                @endforeach
                                </tbody>
                            </table>
                        </div>                                  
                        
                        {{-- tab to show full details of selected asset --}}
                        <div class="container tab-pane fade" id="viewAssetDetails">                                
                            <div class="card" style="border:none;">
                                <div class="card-header bg-white" style="border: none;">                                        
                                    <div class="row">
                                        <div class="col-md-8">
                                            {{-- buttons --}}
                                            {{-- the edit button --}}
                                            <button type="button" class="btn btn-outline-info shadow mb-1 editAsset" id="assetId">
                                                <i class="material-icons" style="font-size:20px;">edit</i>Edit
                                            </button>
        
                                            {{-- to delete selected asset --}}
                                            <button type="button" class="btn btn-outline-danger shadow mb-1 deleteAsset" id="assetId">
                                                <i class="material-icons" style="font-size:20px;">delete</i>Delete
                                            </button> 
                                        </div>
                                    </div>
                                    {{-- delete alert box --}}
                                    <div class="card-footer bg-white" id="deleteAssetCard">
                                        <div class="card-text text-center">                                        
                                            <div class="alert alert-warning alert-dismissible fade show" id="deleteAssetAlert">
                                                <div class="row mb-3">
                                                    <div class="col-xs-12">
                                                        <strong>Are you sure you want to procceed??</strong>
                                                        This Asset will be Deleted!                                                        
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
                                                <div class="row mt-3" id="delPbar">
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
                                 {{-- card to show asset details --}}
                                <div class="card-footer" style="border: none;">
                                    <h5 class="card-title my-0 text-center"></h5>
                                    <div class="card-text">                                        
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <dl class="row my-0">                                            
                                                        <dd class="col-xs-5">Name:</dd>
                                                        <dt class="col-sm-5 assetName"></dt>                                                                                      
                                                    </dl>                                                    
                                                    <dl class="row my-0">                                            
                                                        <dd class="col-xs-5">Type:</dd>
                                                        <dt class="col-sm-5 type"></dt>                                                                                      
                                                    </dl>                                                    
                                                    <dl class="row my-0">                                            
                                                        <dd class="col-xs-5">Purchased value:</dd>
                                                        <dt class="col-sm-5 pvalue"></dt>                                                                                      
                                                    </dl>
                                                    <dl class="row my-0">                                            
                                                        <dd class="col-xs-5">Purchased date:</dd>
                                                        <dt class="col-sm-5 pdate"></dt>                                                                                      
                                                    </dl>
                                                    <dl class="row my-0">                                            
                                                        <dd class="col-xs-5">Operating status:</dd>
                                                        <dt class="col-sm-5 ostatus"></dt>                                                                                      
                                                    </dl>
                                                    <div id="dp_level">
                                                        <dl class="row my-0">                                            
                                                            <dd class="col-xs-5">Depreciation level:</dd>
                                                            <dt class="col-sm-5 dpLevel"></dt>                                                                                      
                                                        </dl>
                                                    </div>                                                                                                                                                                                                          
                                                </div>
                                                <div class="col-md-6">
                                                    <dl class="row my-0">                                            
                                                        <dd class="col-xs-5">Category:</dd>
                                                        <dt class="col-sm-5 category"></dt>                                                                                      
                                                    </dl>
                                                    <dl class="row my-0">                                            
                                                        <dd class="col-xs-5">Location:</dd>
                                                        <dt class="col-sm-5 location"></dt>                                                                                      
                                                    </dl>
                                                    <dl class="row my-0">                                            
                                                        <dd class="col-xs-5">Economic value:</dd>
                                                        <dt class="col-sm-5 evalue"></dt>                                                                                      
                                                    </dl>                                                    
                                                    <dl class="row my-0">                                            
                                                        <dd class="col-xs-5">Amount:</dd>
                                                        <dt class="col-sm-5 number"></dt>                                                                                      
                                                    </dl>                                                    
                                                    <dl class="row my-0">                                            
                                                        <dd class="col-xs-5">Frequency of use:</dd>
                                                        <dt class="col-sm-5 usage"></dt>                                                                                      
                                                    </dl>                                                                                                        
                                                </div>
                                            </div>
                                            <div class="row mt-1">
                                                <div class="col-sm-12">
                                                    <dl class="row my-0">                                            
                                                            <dd class="col-xs-5">Owned by:</dd>
                                                            <dt class="col-sm-5 ownership"></dt>                                                                                      
                                                        </dl>                                      
                                                    <dl class="row my-0">                                            
                                                        <dd class="col-xs-5">Description:</dd>
                                                        <dt class="col-sm-7 desc"></dt>                                                                                      
                                                    </dl> 
                                                </div>
                                            </div>                                            
                                        </div>                      
                                    </div>
                                </div>
                                    
                               
                            </div>

                        </div>

                        {{-- form to add new asset in the tangible category --}}
                        <div class="container tab-pane fade" id="addAsset">
                            
                            <form id="assetForm">
                                <input type="hidden" id="upDateId" name="upDateId">
                                {{csrf_field()}}
                                <div class="my-3">
                                    <span id="assetform_output"></span>
                                </div>
                                    
                                <div class="row mb-3 mx-3">
                                    <div class="form-group mr-5">
                                        <label for="assetcategory" class="mx-sm-2">Asset category</label>
                                        <select class="form-control form-control-sm mb-2 mr-sm-2" id="assetCategory" name="assetCategory">
                                            <option selected disabled>Choose the Asset Category</option>

                                            @foreach ($assetCategory as $category)
                                        <option value="{{$category}}">{{$category}}</option>
                                            @endforeach
                                            
                                            
                                        </select>
                                    </div>
                                    <div class="form-group" id="tAssetDiv">
                                        <label for="assetType" class="mx-sm-2">Tangible asset type</label>
                                        <select class="form-control form-control-sm mb-2 mr-sm-2" name="t_assetType" id="t_assetType">
                                            <option value="" selected disabled>Choose the Asset type</option>
                                            @foreach ($tangibleAssetType as $tAsset)
                                        <option value="{{$tAsset}}">{{$tAsset}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    
                                    <div class="form-group" id="bAssetDiv">
                                        <label for="buildingType" class="mx-sm-2">Building type</label>
                                        <select class="form-control form-control-sm mb-2 mr-sm-2" name="buildingType" id="buildingType">
                                            <option value="" selected disabled>Choose Building type</option>
                                            @foreach ($buildingType as $name)
                                        <option value="{{$name}}">{{$name}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>

                                    <div class="form-group" id="iAssetDiv">
                                        <label for="it_assetType" class="mx-sm-2">Intangible asset type</label>
                                        <select class="form-control form-control-sm mb-2 mr-sm-2" name="it_assetType" id="it_assetType">
                                            <option value="" selected disabled>Choose the Asset type</option>
                                            @foreach ($intangibleAssetType as $itAsset)
                                        <option value="{{$itAsset}}">{{$itAsset}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    
                                </div>

                                <div class="row mb-3 mx-3">                                        
                                    <div class="form-group mr-4">
                                        <label for="t_name" class="mx-sm-2">Name</label>
                                        <input type="text" class="form-control form-control-sm mb-2 mr-sm-2" name="name" id="name">
                                    </div>

                                    @php
                                        $campuses = App\Campus::all();
                                        

                                    @endphp
                                    <div class="form-group">
                                        <label for="location" class="mx-sm-2">Location</label>
                                        <select class="form-control form-control-sm mb-2 mr-sm-2" name="assetLocation" id="assetLocation">
                                            <option selected disabled>Campus of asset location</option>
                                            @foreach ($campuses as $campus)
                                                                                
                                             <option value="{{ $campus->campus_id}}">{{ $campus->campus_name }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>

                                    <div class="form-group mr-4">
                                        <label for="purchasedValue" class="mx-sm-2">Purchased value</label>
                                        <input type="number" class="form-control form-control-sm mb-2 mr-sm-2" name="purchaseValue" id="purchaseValue">
                                    </div>
                                    <div class="form-group">
                                            <label for="t_num" class="mx-sm-2">Number</label>
                                            <input type="number" class="form-control form-control-sm mb-2 mr-sm-2" name="number" id="number">
                                        </div>                                                                                                             
                                </div>
                                
                                <div class="row mb-3 mx-3">
                                    <div class="form-group mr-4">
                                        <label for="t_evalue" class="mx-sm-2">Economic Value</label>
                                        <input type="number" class="form-control form-control-sm mb-2 mr-sm-2" name="economicValue" id="economicValue">
                                    </div>

                                    <div class="form-group mr-4">
                                            <label for="purchasedDate" class="mx-sm-2">Purchased date</label>
                                            <input type="text" class="form-control form-control-sm mb-2 mr-sm-2" name="purchasedDate" id="purchasedDate">
                                        </div>   

                                   
                                   
                                </div>

                                <div class="row mb-3 mx-3">

                                    <div class="form-group mr-4">
                                            <label for="t_ownership" class="mx-sm-2">Ownership</label>
                                            <input type="text" class="form-control form-control-sm mb-2 mr-sm-2" name="ownership" id="ownership">
                                        </div> 
                                   
                                    <div class="form-group mr-4">
                                        <label for="ostatus" class="mx-sm-2">Operating Status</label>
                                        <select class="form-control form-control-sm mb-2 mr-sm-2" name="operatingStatus" id="operatingStatus">
                                            <option selected disabled>current operating status</option>
                                            @foreach ($operatingStatus as $ostatus)
                                        <option value="{{$ostatus}}">{{$ostatus}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mr-4">
                                        <label for="t_usefreg" class="mx-sm-2">Usage</label>
                                        <select class="form-control form-control-sm mb-2 mr-sm-2" name="usage" id="usage">
                                            <option selected disabled>How frequent asset is used</option>
                                            @foreach ($useFrequency as $frequency)
                                        <option value="{{$frequency}}">{{$frequency}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group ml-4" id="depLevelDiv">
                                        <label for="t_depreciationLevel" class="mx-sm-2">Level of Depreciation</label>
                                        <select class="form-control form-control-sm mb-2 mr-sm-2" name="depreciationLevel" id="depreciationLevel">
                                            <option selected disabled>Depreciation level</option>
                                            @foreach ($depreciationLevel as $depLevel)
                                        <option value="{{$depLevel}}">{{$depLevel}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="description" class="mx-sm-2">Description</label>
                                    <textarea type="text" rows="4" class="form-control form-control-sm mb-2 mr-sm-2" name="assetDescription" id="assetDescription"></textarea>
                                </div>

                                <div class="modal-footer">
                                    {{-- <input type="hidden" name="roomtype_id" id="roomtype_id" value=""> --}}
                                    <input type="submit" id="asset_submit" value="Save" class="btn btn-info">
                                    <button id="updateAsset" class="btn btn-info">Update</button>
                                    <button  type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                                    {{-- <button type="submit" class="btn btn-primary" name="submit" id=""><span class="glyphicon glyphicon-ok"></span>Create</button>                                               --}}
                                </div>     
                                           
                            
                            </form>
                            
                        </div>

                       
                    </div>

                </div>
                
                {{-- <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div> --}}
                
            </div>
        </div>
      </div>
</div>
