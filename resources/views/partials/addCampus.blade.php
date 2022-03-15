{{-- Add Campus  Modal --}}
<div id="addCampusModal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title" id="myModalLabel"><i class="material-icons">add_circle
                    </i>Campus</h4>
    
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <span id="form_output"></span>
    
                    {{-- <div class="" style="background-color:lavender;">                                --}}
                        
                        <form id="addCampusForm"  method="post">
                            {{csrf_field()}}
                            
                            <div class="form-group">
                                <label for="campus_name">Campus Name:</label>
                                <input type="text" class="form-control" name="campus_name">
                            </div>
                            <div class="form-group">
                                <label for="room_name">Location:</label>
                                <input type="text" class="form-control" name="location">
                            </div>
    
                            <div class="form-group">
                                <label for="room_name">Description:</label>
                                <textarea type="text" class="form-control" name="description" rows="4"
                                    placeholder="Details of the Campus structure. (e.g Campus is for Faculty of Science.)"></textarea>
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
    {{--  Add Campus Modal --}}