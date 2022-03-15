

    {{-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#deletePrivilegeModal"><span class="glyphicon glyphicon-plus"></span></button> --}}


    <div id="deletePrivilegeModal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="dailog">
            <div class="modal-content">
                <form id="deletePrivilegeForm">
                    <div class="modal-header text-center">
                        <h4 class="modal-title" id="delete-title">
                        Delete Privilege</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>                                       
                  
                                                  
                 
                
                    <div class="modal-body">
                            <p>
                                Are you sure you want to delete this Privilege?
                            </p>
                            <p class="text-warning">
                                <small>
                                    This action cannot be undone and all data will be lost.
                                </small>
                            </p>                                                                        
                    
                    </div>
                    <div class="modal-footer">
                        <input id="privilege_id" name="privilege_id" type="hidden" value="0">
                            <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                        {{-- <button  type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button> --}}
                        <button class="btn btn-danger" id="btn-delete" type="button"><span class="glyphicon glyphicon-trash"></span>Delete</button>                                              
                    </div> 
                </form> 
            </div>
        </div>
    </div>  