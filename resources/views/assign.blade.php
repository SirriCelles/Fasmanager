
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

                <div class="" style="background-color:lavender;">
                    <form  id="assignPrivilegeForm">
                    {{ csrf_field() }}
                    
                        {{-- <input type="hidden" name="_token" id="id" >  --}}
                        <?php $roles = App\Role::all() ?>
                        <div class="form-group">
                            <label for="role" class="col-form-label">Select a Role:</label>
                                <select name="role"  id="chooseRole" class="form-control input-lg dynamic" id="role">
                                    <option valaue="" selected disabled> Select a Role</option>
                                    @foreach ($roles as $role)
                                    
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        
                                        
                                    @endforeach
                                </select>                                               
                        </div>
                                                            
                        <fieldset><legend>Privileges</legend>
                        
                            <?php $privileges = App\Privilege::all()?>            
                                @foreach ($privileges as $privilege)
                                    
                                    {{-- <option   value="{{ $privilege->id }}">{{ $privilege->name }}</option> --}}
                                    <div  class="checkbox">
                                        <label for="privilege">
                                            <input type="checkbox" name="privilege" value="{{$privilege->id}}" id="privilege">{{$privilege->name}}
                                        </label>
                                    </div>
                                    
                                @endforeach
                            
                        </fieldset> 
                        <div class="modal-footer">
                            <input type="submit" class="btn btn-primary" name="submit" id="submit_privilege" value="Save">  
                            <button  type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                                                                        
                        </div>        
                    </form>
                </div> 
               
            </div>
        </div>
    </div>
</div>  


           




