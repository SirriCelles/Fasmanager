
<div  id="assignPrivilegeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="form">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="myModalLabel">Assign Privileges To Roles</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <span id="assignform_output"></span>

                <div class="bg-light">
                    <form  id="assignPrivilegeForm">
                    {{ csrf_field() }}
                    
                        {{-- <input type="hidden" name="_token" id="id" >  --}}
                        <?php $roles = App\Role::all() ?>
                        <div class="form-group">
                            <label for="role" class="col-form-label"><h5>Select a Role</h5></label>
                                <select name="role"  id="chooseRole" class="form-control input-lg dynamic">
                                    <option valaue="" selected disabled> Select a Role</option>
                                    @foreach ($roles as $role)
                                    
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        
                                        
                                    @endforeach
                                </select>                                               
                        </div>
                        <br>
                                                            
                        <fieldset><legend><h5>Privileges</h5></legend>
                            {{-- <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="selectall" id="selectall">
                                    <b>Select all<b>
                                </label>
                            </div> --}}                                                        
                            <?php $privileges = App\Privilege::all()?>            
                                @foreach ($privileges as $privilege)
                                    
                                    {{-- <option   value="{{ $privilege->id }}">{{ $privilege->name }}</option> --}}
                                    <div  class="checkbox">
                                        <label for="privilege">
                                            <input type="checkbox" class="font-weight-bold" name="privilege" value="{{$privilege->id}}" id="privilege">
                                            <i class="{{$privilege->icon}}" style='font-size:15px; padding:10px;'></i>
                                            {{$privilege->name}}
                                        </label>
                                    </div>
                                    
                                @endforeach
                            
                        </fieldset> 
                        <div class="modal-footer">
                        <input type="hidden" name="this_role_id" id="this_role_id" value="">
                            <input type="submit" class="btn btn-primary" name="submit" id="submit_privilege" value="Save">  
                            <button  type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                                                                        
                        </div>        
                    </form>
                </div> 
               
            </div>
        </div>
    </div>
</div>  


           




