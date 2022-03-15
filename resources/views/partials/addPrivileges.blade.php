

    <div id="addPrivilegeModal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="dailog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="myModalLabel">Add New Privilege</h5>                    
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <span id="form_output"></span>
                    <div class="bg-light">                               
                        
                        <form id="addPrivilegeForm">
                            {{ csrf_field() }}
                                                               
                                <div class="form-group">
                                    <label for="name">Privilege Name</label>
                                    <input type="text" class="form-control" name="name" placeholder=Name>
                                </div>
                                <div class="form-group">
                                    <label for="pslug">Slug</label>
                                    <input type="text" class="form-control" name="pslug" placeholder=slug>
                                </div>
                                <div class="form-group">
                                    <label for="icon">Icon</label>
                                    <input type="text" class="form-control" name="icon">
                                </div>
                                <div class="form-group">
                                    <label for="path">Path</label>
                                    <input type="text" class="form-control" name="path">
                                </div>
                                
                                <div class="form-group">
                                    <label for="name">Description:</label>
                                    <textarea type="text" class="form-control" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="radio" class="" name="status" value={{true}} id="active">active
                                    <input type="radio" class="" name="status" value={{false}} id="in-active">inactive
                                </div>
                                 
                                    
                                <div class="modal-footer">
                                    {{-- <input type="hidden" name="roomtype_id" id="roomtype_id" value=""> --}}
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

       