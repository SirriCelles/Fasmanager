{{-- Edit Campus  Modal --}}
<div id="editCampusModal" class="modal fade"  tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title edit_heading"></h5>
    
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <span id="editform_output"></span>
    
                    {{-- <div class="" style="background-color:lavender;">                                --}}
                        
                        <form id="editCampusForm">
                            {{csrf_field()}}
                            
                            <div class="form-group">
                                    <label for="room_name">Campus Name:</label>
                                    <input type="text" class="form-control" name="campus_name" id="campus_name">
                                </div>
                                <div class="form-group">
                                    <label for="room_name">Location:</label>
                                    <input type="text" class="form-control" name="location" id="location">
                                </div>
                                <div class="form-group">
                                    <label for="room_name">Description:</label>
                                    <textarea type="text" class="form-control" name="description" id="description" rows="4"></textarea>
                                </div>
    
                                                                       
                            <div class="modal-footer">
                                <input type="hidden" name="campus_id" id="campus_id" value="">
                                <input type="submit"  name="submit" id="edit_action" value="Update" class="btn btn-info">
                                <button  type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                                {{-- <button type="submit" class="btn btn-primary" name="submit" id=""><span class="glyphicon glyphicon-ok"></span>Create</button>                                               --}}
                            </div>        
                                                
                        </form>                       
    
                    </div>                                                      
                
                </div>
            </div>
        </div>
    </div>  
    {{--  Edit Campus Modal --}}