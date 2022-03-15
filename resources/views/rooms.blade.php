@extends('layouts.ndesign')

@section('main_content')


<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3" style="background-color:lavender;">

            <div class="list-group">
                <a href='http://localhost/Fasmanager/public/rooms' class="list-group-item active">
                <h4 class="list-group-item-heading">Rooms</h4>
                <p class="list-group-item-text"></p>
                </a>
                <a href="http://localhost/Fasmanager/public/createroom" class="list-group-item list-group-item-info">
                <h4 class="list-group-item-heading hover">Create a New Room Type</h4>
                <p class="list-group-item-text"></p>
                </a>
            </div>
           
        </div>

        {{-- <div>
         @yield('room_content')

        </div> --}}

        

         <button type="button" class="btn btn-success" data-toggle="modal"  id="addroom"><span class="glyphicon glyphicon-plus"></span>Add Room</button>
        <div class="col-sm-3">
            <form action="{{action('RoomController@searchRoom')}}" method="post" role="search">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-group">
                    <input type="text" class="form-control" name="search"placeholder="Search Room by name"> 
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div> 
        

                {{-- <div class="">
                @if (isset($rooms))

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
                            @foreach ($rooms as $room)
                            <tr>
                                <td>{{ $room->room_name }}</td>
                                <td>{{ $room->room_capacity }}</td>
                                <td>{{ $room->description }}</td>
                                <td>{{ $room->status }}</td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    
                @endif--}}
        

        

     {{-- implimenting the search functionality --}}


        <div class="container col-sm-8">
        
            @if(isset($rooms))

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Room Name</th>
                            <th>Room Size</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Room Type</th>
                            <th>Block</th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($rooms as $key => $room)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{ $room->room_name }}</td>
                            <td>{{ $room->room_capacity }}</td>
                            <td>{{ $room->description }}</td>
                            <td>{{ $room->status }}</td>

                        <?php $room_type_object= App\RoomType::find($room->roomtype_fk_id) ?>   
                            @if($room_type_object->count() >0)
                                <td>{{ $room_type_object->room_type}}</td>
                            @endif

                        <?php $block_object = App\Block::find($room->block_fk_id)?>
                            @if ($block_object->count() > 0)
                                <td>{{ $block_object->block_name}}</td>
                                
                            @endif

                            {{-- <td><a href="editroom/{{$room->room_id}}" class="btn btn-primary">
                            <span class=" glyphicon glyphicon-pencil"></span>
                            </a></td> --}}

                            <td>
                                <a href="#" class="btn btn-xs btn-info editroom" id="{{$room->room_id}}">
                                <span class="glyphicon glyphicon-edit"></span>Edit
                                </a>
                            </td>

                            <td><a href="#"  class="btn btn-xs btn-danger deleteroom" id="{{$room->room_id}}">
                                <span class="glyphicon glyphicon-trash"></span>Delete</a>
                            </td>

                            {{-- <td>
                                <form action="{{ action('RoomController@destroy')}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="delete_id" value="{{$room->room_id}}">
                                <button type="submit" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                                </button>
                                </form>
                            </td> --}}
                            
                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            
        </div>


               
    </div>
    
</div>
@include('add')
@include('editroom')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#addroom').click(function() {
            $('#addRoomModal').modal('show');
            $('#addRoomForm')[0].reset();
            $('#form_output').html('');
            
        });

        $('#addRoomForm').on('submit',function(event) {
            event.preventDefault();

            var form_data = $(this).serialize();
            //console.log(form_data);

            $.ajax({
                url: '{{route("rooms.store")}}',
                method: 'POST',
                data: form_data,
               
                dataType: "json",
                success: function(data) 
                {
                    console.log(data);
                    if(data.error.length > 0) 
                    {
                        var error_html ='';
                        for(var i = 0; i < data.error.length; i++)
                        {
                            error_html += '<div class="alert alert-danger">' +data.error[i]+ '</div>';
                        }
                        $('#form_output').html(error_html);
                    }
                    else
                    {
                        var confirmation = data.success;
                        $('#form_output').html(confirmation);
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                        //$('#addRoomForm')[0].reset();
                        
                    }
                },
            });
        });

        $(document).on('click', '.editroom', function() {
           
            var id = $(this).attr("id");
            console.log(id);

            $.ajax({
                url: '{{route("rooms.edit")}}',
                method: 'GET',
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) 
                {
                    
                    var block_key = data.block.block_id;
                    var roomtype_key = data.roomtype.room_type_id;
                    var status_output = data.room.status;
                    console.log(status_output);
                   
                   $("#editRoomForm input[name=room_name]").val(data.room.room_name);
                   $("#editRoomForm input[name=room_capacity]").val(data.room.room_capacity);
                   $("#editRoomForm input[name=description]").val(data.room.description);                    
                   //$("#editRoomForm input[name=status]").val(data.room.status);
                   $("#editRoomForm input[name=room_id]").val(data.room.room_id);

                    $("#room_type option[value=" +roomtype_key+ "]").prop("selected", true);
                    $("#block option[value=" +block_key+ "]").prop("selected", true);
                   //$("#editRoomForm input[name=room_type]").val(data.room.room_type_fk_id);
                    //$("#editRoomForm input[name=block]").val(data.room.block_fk_id);

                    $("#editRoomForm input[name=status][value='" +status_output+"']").prop('checked', true);
                    
                    
                  

                   $('#editRoomModal').modal('show');  
                     
                
                },
                error: function(data)
                {
                    console.log(data);
                }
            });
        });

        $('#edit_submit').click(function(event) {
            event.preventDefault();
            $('#editform_output').html('');

            $.ajax({
                url: '{{route("rooms.update")}}',
                method: 'POST',
                data: {
        
                    
                    room_type: $("#room_type").val(),
                    block: $("#block").val(),
                    room_name: $("#editRoomForm input[name=room_name]").val(),
                   room_capacity: $("#editRoomForm input[name=room_capacity]").val(),
                   description: $("#editRoomForm input[name=description]").val(),
                    //room_type: $("#editRoomForm input[name=room_type]").val(),
                    //block: $("#editRoomForm input[name=block]").val(),
                    status: $("#editRoomForm input[name='status']:checked").val(),
                   id: $("#editRoomForm input[name=room_id]").val(),
                },
               
                dataType: "json",
                success: function(data) 
                {
                    console.log(room_type);
                   console.log(data);
                    if(data.error.length > 0) 
                    {
                        var error_html ='';
                        for(var i = 0; i < data.error.length; i++)
                        {
                            error_html += '<div class="alert alert-danger">' +data.error[i]+ '</div>';
                        }
                        $('#editform_output').html(error_html);
                    }
                    else
                    {
                        var confirmation = data.success;
                        $('#editform_output').html(confirmation);
                        //$("#editRoomForm input[name=status]").removeAttr('checked', true);
                        
                        setTimeout(function() {
                            window.location.reload();
                        }, 1000);
                        //$('#addRoomForm')[0].reset();
                        
                    } 
                } 
            });
        });

        $(document).on('click', '.deleteroom', function() {
            var id = $(this).attr('id');
            console.log(id);

            if(confirm("This Room will be deleted. Are You sure you want to procceed?"))
            {
                $.ajax({
                    url: '{{route("rooms.delete")}}',
                    method: 'GET',
                    data:{
                        id:id
                    },
                    dataType: "json",
                    success: function(data) 
                    {
                        alert(data.message);
                        location.reload();
                    },
                });
            }

            else{
                return false;
            }
        });
    });

</script>

@endsection

    

       


    





