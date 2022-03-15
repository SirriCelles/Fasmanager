@extends('layouts.ndesign')

@section('main_content')


 
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4" style="background-color:lavender;">

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


            

        {{-- Add Room Type Modal --}}
            <div id="addRoomTypeModal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title" id="myModalLabel"><span class="">
                            </span>Add New Room Type</h4>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                        <span id="form_output"></span>

                            <div class="" style="background-color:lavender;">                               
                                
                                <form id="addRoomTypeForm"  method="post" action="createroom">
                                    {{csrf_field()}}
                                    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                                                                    
                                    <div class="form-group">
                                        <label for="room_type">Type Of Room:</label>
                                        <input type="text" name="room_type" class="form-control" id="">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <textarea type="text" name="description" class="form-control" id=""></textarea>
                                    </div>
                                    
                                        
                                            
                                        <div class="modal-footer">
                                            {{-- <input type="hidden" name="roomtype_id" id="roomtype_id" value=""> --}}
                                            <input type="hidden" name="button_action" id="button_action" value="insert">
                                            <input type="submit"  name="submit" id="action" value="Add" class="btn btn-info">
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

    {{-- Edit Room TYpe --}}
            <div id="editRoomTypeModal" class="modal fade"  tabindex="-1" role="dialog">
                <div class="modal-dialog" role="dailog">
                    <div class="modal-content">
                        <form id="editRoomTypeForm" method="post">
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
                                <div class="alert alert-danger" id="edit-error-bag">
                                        <ul id="edit-rootype-errors">
                                        </ul>
                                </div>                               
                                    <div class="form-group">
                                        <label for="room_name">Type of Room:</label>
                                        <input type="text" class="form-control" name="room_type" id="room_type">
                                    </div>
                                    <div class="form-group">
                                        <label for="room_capacity">Description:</label>
                                        <input type="text" class="form-control" name="description" id="description"/>
                                    </div>                                        

                                </div>                                                      
                            
                            </div>
                                
                            <div class="modal-footer">
                                <input type="hidden" name="roomtype_id" id="roomtype_id" value="">
                                <input type="hidden" name="button_editaction" id="button_editaction" value="edit">
                                <input type="submit"  name="submit" id="edit_action" value="Update" class="btn btn-info">
                                <button  type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
     {{-- Edit Room TYpe --}}     

    {{-- Delete Room Type Modal --}}
    <div id="deleteRoomTypeModal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="dailog">
            <div class="modal-content">
                <form id="deleteRoomTypeForm">
                {{-- {{ method_field('DELETE') }} --}}
                    <div class="modal-header text-center">
                        <h4 class="modal-title" id="delete-title">
                        Delete Room Type</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>                                     
        
                    <div class="modal-body">
                        <input id="deleterole_id" name="deleterole_id" type="hidden">
                            <p>
                                Are you sure you want to delete this Room?
                            </p>
                            <p class="text-warning">
                                <small>
                                    All Rooms with this Room Type will be deleted.
                                </small>
                            </p>                                                                        
                    
                    </div>
                    <div class="modal-footer">
                        
                            {{-- <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel"> --}}
                        <button  type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button>
                        <button class="btn btn-danger" id="btn-deleterole" type="submit" name="submit"><span class="glyphicon glyphicon-trash"></span>Delete</button>                                              
                    </div> 
                </form> 
            </div>
        </div>
    </div> 
    {{-- Delete Room Type Modal --}} 
               

            <div class="col-sm-7" style="padding-left: 50px">

                <button type="button" class="btn btn-success" data-toggle="modal" data-target="" id="add_roomtype"><span class="glyphicon glyphicon-plus"></span>Create New Room</button>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Room Type</th>
                            <th>Description</th>
                            <th></th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach ($roomtypes as $key => $roomtype)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{ $roomtype->room_type }}</td>
                            <td>{{ $roomtype->description }}</td> 

                            <?php ?>
                            <td>
                                <a href="#"  class="btn btn-xs btn-info edit" id="{{$roomtype->room_type_id}}">
                                <span class="glyphicon glyphicon-edit"></span>Edit</a></td>

                            <td><a href="#"  class="btn btn-xs btn-danger delete" id="{{$roomtype->room_type_id}}">
                                <span class="glyphicon glyphicon-trash"></span>Delete</a>
                                
                                {{-- <form action="{{action('RoomTypeController@DeleteRoomType')}}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="rtype_d_id" value="{{ $roomtype->room_type_id}}">
                                <button type="submit" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                                </button>
                                </form> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                

            </div>
            
            
        </div>


    </div>

<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#add_roomtype').click(function() {
            $('#addRoomTypeModal').modal('show');
            $('#addRoomTypeForm')[0].reset();
            $('#form_output').html('');
            $('#button_action').val('insert');
            $('#action').val('Add');
            $('#editform_output').html('');

        });

        $('#addRoomTypeForm').on('submit', function(event) {
            event.preventDefault();

            var form_data = $(this).serialize();
            //console.log(form_data);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: '{{ route("createroom.store") }}',
                method: "POST",
                data: form_data,
                dataType: "json",
                success: function(data)
                {
                    console.log(data);
                    if(data.error.length > 0) 
                    {
                       var error_html ='';
                       for(var count = 0; count < data.error.length; count++) 
                       {
                           error_html += '<div class="alert alert-danger">' + data.error[count] + '</div>';
                       }
                       $('#form_output').html(error_html);
                    }
                    else
                    {
                        $('#form_output').html(data.success);
                        $('#addRoomTypeForm')[0].reset();
                        $('#action').val('Add');
                        $('.modal-title').text('Add Data');
                        $('#button_action').val('insert');
                        setTimeout(function() {
                            window.location.reload();
                        },3000)
                        
                    }
                }
            });
            
        });


        $(document).on('click', '.edit', function() {
             
        //$('.edit').click(function() {

            var id = $(this).attr("id");
            console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
           
            $.ajax({
                url: "{{route('createroom.get_roomtype')}}",
                method: 'GET',
                data:{
                    id: id
                },
                dataType: "json",
                success: function(data) 
                {
                    console.log(data.status);
                    console.log(data.roomtype.room_type);
                    $('#edit-error-bag').hide();
                    $('#room_type').val(data.roomtype.room_type);
                    $('#description').val(data.roomtype.description);
                    $('#roomtype_id').val(data.roomtype.room_type_id);

                    $('#editRoomTypeModal').modal('show');
                    //$('#action').val('Edit');
                    //$('.modal-title').val('Edit Room Type');
                    //$('#button_action').val('Update');


                },
                error: function(data)
                {
                    console.log(data);
                }
            });
        });

        $('#edit_action').click(function(event) {
            event.preventDefault(); 
             
            //('#button_editaction').val('edit');

            //var editform_data = $(this).serialize();
            
          

            $.ajax({
                url: '{{route("createroom.update")}}',
                method: "POST",
                data: {
                    id: $("#roomtype_id").val(),
                    room_type: $("#room_type").val(),
                    description: $("#description").val(),
                },
                dataType: "json",
                success: function(data)
                {
                    //console.log(data);
                    if(data.error.length > 0) 
                    {
                       var error_html ='';
                       for(var i = 0; i < data.error.length; i++) 
                       {
                           error_html += '<div class="alert alert-danger">' + data.error[i] + '</div>';
                       }
                       $('#editform_output').html(error_html);
                       console.log(error_html);

                    }
                    else
                    {   console.log(data.success);
                        var confirmation = data.success;
                        $('#editform_output').html(confirmation);
                        setTimeout(function(){
                            window.location.reload();
                        },3000);
                        
                        //alert(data.success);
                    }
                },

                 error: function(data)
                {
                    console.log(data);
                },

            });
        });

        $(document).on('click', '.delete', function() {
            var id = $(this).attr('id');
            console.log(id);

             if(confirm("All rooms with this Room Type will be deleted. Are You sure you want to delete this Room Type?"))
             {
                 $.ajax({
                    url: "{{route('createroom.delete')}}",
                    method: "get",
                    data:
                    {
                        id: id
                    },
                    dataType: "json",
                    success: function(data) 
                    {
                        
                        alert(data.message);
                        location.reload();
                    },
                    
                 });
             }
             else
             {
                 return false;
             }

        });

    });

    
</script>


@stop


    
        
        
        
        
        
    



