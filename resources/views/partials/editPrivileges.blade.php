
{{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>ADD ROLE</button> --}}


    <div id="editPrivilegeModal" class="modal fade"  tabindex="-1" role="dialog">
        <div class="modal-dialog" role="dailog">
            <div class="modal-content">
                <form id="editPrivilegeForm">
                    <div class="modal-header text-center">
                        <h4 class="modal-title" id="myModalLabel"><span class="">
                        </span>Edit Privilege</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <span id="editform_output"></span>
                        <div class="" style="background-color:lavender;">                               
                          
                           <div class="form-group">
                                <label>Privilege</label>
                                <input class="form-control" id="name" name="name"  type="text">
                           </div>
                           <div class="form-group">
                                    <label for="pslug">Slug</label>
                                    <input type="text" class="form-control" name="pslug" id="pslug">
                                </div>
                           <div class="form-group">
                                    <label for="key">Icon</label>
                                    <input type="text" class="form-control" name="icon" id="icon" >
                                </div>
                                <div class="form-group">
                                    <label for="key">Path</label>
                                    <input type="text" class="form-control" name="path" id="path">
                                </div>
                                <div class="form-group">
                                    <label for="name">Description:</label>
                                    <input type="text" class="form-control" name="description" id="description">
                                </div> 
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="radio" class="" name="status" value="1">active
                                    <input type="radio" class="" name="status" value="0">inactive
                                </div>
                                                                             

                        </div>                                                      
                    
                    </div>
                        
                    <div class="modal-footer">
                        <input type="hidden" name="priv_id" id="priv_id" value="">
                        <input type="submit"  name="submit" id="edit_action" value="Update" class="btn btn-info">
                        <button  type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                </div>
                </form>
            </div>
        </div>
    </div> 




        