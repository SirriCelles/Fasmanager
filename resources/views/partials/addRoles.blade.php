 
    <div id="addRoleModal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="dailog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title" id="myModalLabel"><span class="">
                    </span>Add New Role</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <span id="form_output"></span>
                    <div class="" style="background-color:lavender;">                               
                        
                        <form id="addRoleForm" >
                                                                                          
                            <div class="form-group">
                                <label for="name">Role Name:</label>
                                <input type="text" class="form-control" name="name" >
                            </div>
                            <div class="form-group">
                                <label for="slug">Slug:</label>
                                <input type="text" class="form-control" name="slug">
                            </div>
                            <div class="form-group">
                                <label for="name">Description:</label>
                                <textarea type="text" class="form-control" name="description"></textarea>
                            </div>
                            
                            <div class="modal-footer">
                            {{-- <input type="hidden" name="id" id=id" value=""> --}}
                            <input type="submit"  name="submit" id="add_action" value="Add" class="btn btn-info">
                            <button  type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                            {{-- <button type="submit" class="btn btn-primary" name="submit" id=""><span class="glyphicon glyphicon-ok"></span>Create</button>                                               --}}
                        </div>                
                                                  
                        </form>                       

                    </div>                                                      
                
                </div>
            </div>
        </div>
    </div>  