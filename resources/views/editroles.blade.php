


    <div id="editRoleModal" class="modal fade"  tabindex="-1" role="dialog">
        <div class="modal-dialog" role="dailog">
            <div class="modal-content">
                <form id="editRoleForm">
                
                {{-- <input type="hidden" name="_method" value="PUT"> --}}
                
                    <div class="modal-header text-center">
                        <h4 class="modal-title" id="myModalLabel"><span class="">
                        </span>Edit Role</h4>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <span id="editform_output"></span>
                        <div class="" style="background-color:lavender;">                               
                                                       
                            <div class="form-group">
                                <label for="name">Role Name:</label>
                                <input type="text" class="form-control" name="name" id="name" >
                            </div>
                            <div class="form-group">
                                <label for="name">Slug:</label>
                                <input type="text" class="form-control" name="slug"  id="slug" >
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <input type="text" class="form-control" name="description" id="description">
                            </div>
                           
                                
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="id" value="">
                            <input type="submit"  name="submit" id="edit_action" value="Update" class="btn btn-info">
                            <button  type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                            {{-- <button type="submit" class="btn btn-primary" name="submit" id=""><span class="glyphicon glyphicon-ok"></span>Create</button>                                               --}}
                        </div> 
                </form>
            </div>
        </div>
    </div> 




        














{{-- <div class="container">
                        <div class="col-sm-2"></div>
                            <form action="{{ action('RoleController@updateRole')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="role_id" value="{{$role->id}}">
                                    <fieldset>
                                    <legend>Edit</legend>
                                        
                                        <div class="form-group">
                                            <label for="name">Role Name:</label>
                                            <input type="text" class="form-control" name="name" value="{{ $role->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Slug:</label>
                                            <input type="text" class="form-control" name="slug" value="{{ $role->slug }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description:</label>
                                            <input type="text" class="form-control" name="description" value="{{$role->description}}">
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                </fieldset>
                            
                            </form>
                        </div>
                    </div> --}}