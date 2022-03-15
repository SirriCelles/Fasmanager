

    {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#deletePrivilegeModal"><span class="glyphicon glyphicon-plus"></span></button> --}}


    <div id="deleteRoleModal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="dailog">
            <div class="modal-content">
                <form id="deleteRoleForm">
                {{-- {{ method_field('DELETE') }} --}}
                    <div class="modal-header text-center">
                        <h4 class="modal-title" id="delete-title">
                        Delete Role</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>                                       
                  
                                                  
                 
                
                    <div class="modal-body">
                        <input id="deleterole_id" name="deleterole_id" type="hidden">
                            <p>
                                Are you sure you want to delete this Role?
                            </p>
                            <p class="text-warning">
                                <small>
                                    This action cannot be undone and all data will be lost.
                                </small>
                            </p>                                                                        
                    
                    </div>
                    <div class="modal-footer">
                        
                            <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                        {{-- <button  type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button> --}}
                        <button class="btn btn-danger" id="btn-deleterole" type="submit" name="submit"><span class="glyphicon glyphicon-trash"></span>Delete</button>                                              
                    </div> 
                </form> 
            </div>
        </div>
    </div>  