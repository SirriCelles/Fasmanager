 {{-- Edit Room--}}
            <div id="editRoomModal" class="modal fade"  tabindex="-1" role="dialog">
                <div class="modal-dialog" role="dailog">
                    <div class="modal-content">
                        <form id="editRoomForm">
                        {{csrf_field()}}
                        {{-- <input type="hidden" name="_method" value="POST"> --}}
                            <div class="modal-header text-center">
                                <h4 class="modal-title" id="myModalLabel"><span class="">
                                </span>Edit Room</h4>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <div class="modal-body">
                                <span id="editform_output"></span>
                                <div class="" style="background-color:lavender;">                               
                                
                                    <div class="form-group">
                                        <label for="room_name">Room Name:</label>
                                        <input type="text" class="form-control" name="room_name"  id="room_name">
                                                                            
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="room_capacity">Room Size:</label>
                                        <input type="text" class="form-control" name="room_capacity" id="room_capacity">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <input type="text" class="form-control" name="description" id="description">

                                    </div>

                                    <div class=form-group>
                                    <label>Selected Room Type</label>                                   
                                        <select name="room_type" id="room_type" class="browser-default custom-select">
                                            <?php $roomtypes = App\RoomType::all();?>
                                            @foreach ($roomtypes as $roomtype)
                                           
                                                <option value="{{$roomtype->room_type_id}}" >{{$roomtype->room_type}}</option>
                                                                                        
                                            @endforeach 
                                        </select>
                                    </div>

                                    <div class=form-group>
                                     <label>Selected a Room location</label>
                                        <select name="block" id="block" class="browser-default custom-select">
                                            
                                            <?php $blocks = App\Block::all();?>
                                            @foreach ($blocks as $block)
                                                
                                                <option value="{{$block->block_id}}">{{$block->block_name}}</option>
                                                                                           
                                            @endforeach
                                        
                                        </select>
                                    </div>   


                                    {{-- <div class="from-inline">
                                        <label for="">Status:</label>
                                        <input type="radio" name="status" value="active" id="active">active
                                        <input type="radio" name="" value="in-active" id="in-active">in-active
                                    </div>    --}}
                                    <div class="radio">
                                        <label>Status</label>
                                        <label><input type="radio" name="status" value="active" id="active">active</label>
                                        <label><input type="radio" name="status" value="in-active" id="inactive">in-active</label>
                                    </div>
                                    {{-- <div class=form-group>
                                        <select name="status" id="status" class="browser-default custom-select">
                                                                                  
                                            <option value="" selected></option>
                                        
                                       
                                            <option value=""></option>
                                            
                                                                                        
                                        </select>
                                    </div>                          --}}
                               </div>                                                         
                                
                            </div>
                                
                            <div class="modal-footer">
                                <input type="hidden" name="room_id" id="room_id" value="">
                                {{-- <input type="hidden" name="button_editaction" id="button_editaction" value="edit"> --}}
                                <input type="submit"  name="submit" id="edit_submit" value="Update" class="btn btn-info">
                                <button  type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
     {{-- Edit Room --}}    

{{-- <div class="container"> 
    <div class="col-sm-8">
    <form action="{{action('RoomController@update')}}" method="post">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input  type="hidden" name="room_id" value="{{$room->room_id}}"/>
        <fieldset>
            <legend>Edit Room</legend>
            
            
                
                
                <div>
                    
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
        </fieldset>
    
    </form>
    </div>
</div> --}}





























{{-- <div class="col-sm-4 right">
<form action="editroom" method="post" role="search">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="input-group">
        <input type="text" class="form-control" name="search"
            placeholder="Search Room by name"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
</form>
</div>

<div class="container col-sm-8">
    @if (isset($room_names))
        <p>Results for all rooms called <strong> {{ $searchs }}</strong>:</p>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Room Name</th>
                    <th>Room Size</th>
                    <th>Description</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($room_names as $room_name)
                <tr>
                    <td>{{ $room_name->room_name }}</td>
                    <td>{{ $room_name->room_capacity }}</td>
                    <td>{{ $room_name->description }}</td>
                    <td>{{ $room_name->status }}</td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
        
    @endif
</div> --}}