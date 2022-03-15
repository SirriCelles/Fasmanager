{{-- Add Room Type Modal --}}

<div id="addRoomModal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="myModalLabel"><span class="">
                </span>Add New Room</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
            <span id="form_output"></span>

                <div class="" style="background-color:lavender;">                               
                    
                    <form id="addRoomForm"  method="post">
                        {{csrf_field()}}
                        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}                                                     
                        <div class="form-group">
                            <label for="room_name">Room Name:</label>
                            <input type="text" class="form-control" name="room_name">
                        </div>
                        <div class="form-group">
                            <label for="room_capacity">Room Size:</label>
                            <input type="number" class="form-control" name="room_capacity">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <input type="text" class="form-control" name="description" placeholder="Room Details">
                        </div>
                        <?php  $roomtypes = App\RoomType::all(['room_type_id', 'room_type']);?>
                        <div class=form-group>
                        <label>Choose a Room Type</label>
                        <select name="room_type" class="browser-default custom-select">
                            <option  value="" selected disabled>--Select here </option>
                            @foreach ($roomtypes as $roomtype)
                            <option value="{{$roomtype->room_type_id}}">{{$roomtype->room_type}}</option>
                                
                            @endforeach
                        </select>
                        </div>

                        <?php $blocks = App\Block::all(['block_id', 'block_name']); ?>
                        <div class=form-group>
                        <label>Select a Room location</label>
                        <select name="block" class="browser-default custom-select">
                           <option value="" selected disabled>--Select here--</option>
                            @foreach ($blocks as $block)
                                <option value="{{$block->block_id}}">{{$block->block_name}}</option>                               
                            @endforeach
                            
                        </select>
                        </div>
                        <div class="from-inline">
                            <label for="status">Status:</label>
                            <input type="radio" name="status" value="active">active
                            <input type="radio" name="status"  value="in-active">in-active
                        </div>       
                                
                            <div class="modal-footer">
                                {{-- <input type="hidden" name="roomtype_id" id="roomtype_id" value=""> --}}
                                {{-- <input type="hidden" name="button_action" id="button_action" value="insert"> --}}
                                <input type="submit"  name="submit" id="submit" value="Add" class="btn btn-info">
                                <button  type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                                {{-- <button type="submit" class="btn btn-primary" name="submit" id=""><span class="glyphicon glyphicon-ok"></span>Create</button>                                               --}}
                            </div>        
                                            
                    </form>                       

                </div>                                                      
            
            </div>
        </div>
    </div>
</div>  
{{-- End of Add Room Type Modal --}}




 

                    