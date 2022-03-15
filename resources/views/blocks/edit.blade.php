{{-- Edit Block--}}
<div id="editBlockModal" class="modal fade"  tabindex="-1" role="dialog">
    <div class="modal-dialog" role="dailog">
        <div class="modal-content">
            <form id="editBlockForm" method="post">
            {{csrf_field()}}
            {{-- <input type="hidden" name="_method" value="POST"> --}}
                <div class="modal-header text-center">
                    <h4 class="modal-title" id="myModalLabel"><span class="">
                    </span>Edit Room Type</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <span id="editform_output"></span>
                    <div class="" style="background-color:lavender;">  
                    <input type="hidden" name="campus_fk_id" id="campus_fk_id" value="">                             
                        <div class="form-group">
                            <label for="room_name">Block Name:</label>
                            <input type="text" class="form-control" name="block_name" id="block_name">
                        </div>
                        <div class="form-group">
                            <label for="room_capacity">Number of Rooms:</label>
                            <input type="number" class="form-control" name="num_of_rooms" id="num_of_rooms"/>
                        </div>
                        <?php $campuses = App\Campus::all(); ?>
                        <div class=form-group>
                        <select name="campus" id="campus" class="browser-default custom-select">
                            
                            @foreach ($campuses as $campus)

                            @if ($campus->campus_id == $block->campus_fk_id)
                                <option value="{{ $campus->campus_id}}" selected>{{ $campus->campus_name}}</option>

                            @else
                                <option value="{{$campus->campus_id}}">{{$campus->campus_name}}</option>
                                
                            @endif
                                
                            @endforeach
                        </select>
                        </div>                                               
                        
                    </div>                                                      
                
                </div>
                    
                <div class="modal-footer">
                    <input type="hidden" name="block_id" id="block_id" value="">
                    <input type="submit"  name="submit" id="edit_action" value="Update" class="btn btn-info">
                    <button  type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                </div>
            </form>
        </div>
    </div>
</div> 
     {{-- Edit Block --}}     



 

    

    



       

        
        
    
