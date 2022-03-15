@extends('layouts.ndesign')

@section('main_content')


 
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3" style="background-color:lavender;">

                <div class="list-group">
                    <a href='http://localhost/Fasmanager/public/cam/campus' class="list-group-item active">
                    <h4 class="list-group-item-heading">Room Type</h4>
                    <p class="list-group-item-text"></p>
                    </a>
                    {{-- <a href='http://localhost/Fasmanager/public/addblocks' class="list-group-item list-group-item-info">
                    <h4 class="list-group-item-heading hover">Add Block</h4>
                    <p class="list-group-item-text"></p>
                    </a> --}}
                </div>
        </div>
                <div  style="padding: 50px; ">
                    <div class="container col-sm-4">
                        <form action="{{action('RoomTypeController@UpdateRoomType')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="roomtype_eid" value="{{$roomtype->room_type_id}}">
                                <fieldset>
                                <legend>Edit</legend>
                                    
                                    <div class="form-group">
                                        <label for="room_name">Type of Room:</label>
                                        <input type="text" class="form-control" name="room_type" value="{{ $roomtype->room_type}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="room_capacity">Description:</label>
                                        <input type="text" class="form-control" name="description" value="{{ $roomtype->description}}"/>
                                    </div>

                                    
                                    <div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                            </fieldset>
                        
                        </form>
                        
                </div>


                </div>
    

    



       

        
        
    </div>


</div>





@endsection

