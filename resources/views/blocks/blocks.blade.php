@extends('layouts.ndesign')

@section('main_content')


 
<div class="container">
    <div class="row">     
        <div class="col-sm-4 right">
            <form action="{{action('BlockController@searchBlock')}}" method="post" role="search">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="input-group">
                    <input type="text" class="form-control" name="search"
                        placeholder="Search Block by name"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <div class="">
            <button type="button" class="btn btn-success" data-toggle="modal"  id="add_block"><span class="glyphicon glyphicon-plus"></span>Add Block</button>
        </div>                   
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Block Name</th>
                    <th>Number of Rooms</th>
                    <th>Campus</th>
                    <th></th>                  
                </tr>
            </thead>
            <tbody>  
                @foreach ($blocks as $key => $block)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ $block->block_name }}</td>
                    <td>{{ $block->numof_rooms }}</td>
                <?php $campus_object = App\Campus::find($block->campus_fk_id);?>
                @if ($campus_object->count() > 0) 
                    <td>{{$campus_object->campus_name}}</td>
                @endif
                    <td>
                        <a href="#"  class="btn btn-xs btn-info edit" id="{{$block->block_id}}">
                        <span class="glyphicon glyphicon-edit"></span>Edit</a>

                        <a href="#"  class="btn btn-xs btn-danger delete" id="{{$block->block_id}}">
                        <span class="glyphicon glyphicon-trash"></span>Delete</a>
                    </td>
                    
                    {{-- <td><a href="blocks/{{$block->block_id}}/edit" class="btn btn-primary">
                    <span class=" glyphicon glyphicon-pencil"></span>
                    </a></td>
                    <td>
                        <form action="{{ action('BlockController@DeleteBlock')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="block_id" value="{{$block->block_id}}">
                        <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </td> --}}                             
                </tr>

        
                @endforeach
                {{-- @endfor --}}
            </tbody>
        </table>
      
    {{-- @endif --}}
        
    </div>


</div>

{{-- Add Block  Modal --}}
<div id="addBlockModal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title" id="myModalLabel"><span class="">
                </span>Add New Block</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <span id="form_output"></span>

                <div class="" style="background-color:lavender;">                               
                    
                    <form id="addBlockForm"  method="post">
                        {{csrf_field()}}
                        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                        <div class="form-group">
                            <label for="room_name">Block Name:</label>
                            <input type="text" class="form-control" name="block_name" >
                        </div>
                        <div class="form-group">
                            <label for="room_capacity">Number of Rooms:</label>
                            <input type="number" class="form-control" name="num_of_rooms"/>
                        </div>

                        <?php $campuses = App\Campus::all()?>
                        <div class=form-group>
                        <label>Selected a Campus</label>
                        <select name="campus"  class="browser-default custom-select">
                            <option value="" selected disabled>---Select here--</option>
                            @foreach ($campuses as $campus)
                            <option value="{{$campus->campus_id}}">{{$campus->campus_name}}</option>
                                
                            @endforeach
                        </select>
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
{{--  Add Block Modal --}}

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
                        <?php $campuses = App\Campus::all();
                            
                         ?>
                        <div class=form-group>
                        <select name="campus" id="editcampus" class="browser-default custom-select">
                            
                            @foreach ($campuses as $campus)

                            
                                <option value="{{$campus->campus_id}}">{{$campus->campus_name}}</option>
                                
                                                          
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

        
    

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#add_block').click(function() {
           $('#addBlockModal').modal('show');
           $('#addBlockForm')[0].reset();
           $('#form_output').html('');
            
        });

        $('#addBlockForm').on('submit', function(event){
            event.preventDefault();

            var form_data = $(this).serialize();
            console.log(form_data);

            $.ajax({
                url: '{{route("blocks.store")}}',
                method: 'POST',
                data: form_data,
                dataType: "json",
                success: function(data)
                {
                     if(data.error.length > 0) 
                    {
                       var error_html ='';
                       for(var i = 0; i < data.error.length; i++) 
                       {
                           error_html += '<div class="alert alert-danger">' + data.error[i] + '</div>';
                       }
                       $('#form_output').html(error_html);
                    }
                    else
                    {
                        $('#form_output').html(data.success);
                        $('#addBlockForm')[0].reset();
                        setTimeout(function() {
                            window.location.reload();
                        },2000)
                        
                    }
                }
            });
        });

        $(document).on('click', '.edit', function() {
            $('#editform_output').html('')
            var id = $(this).attr("id");
            console.log(id);

            $.ajax({
                url: '{{route("blocks.show")}}',
                method: 'GET',
                data: {
                    id: id
                },
                dataTpye: "json",
                success: function(data)
                {
                                     
                    //$("#campus").val(data.block.campus_fk_id);
                    var campus_key = data.campus.campus_id;
                    var campus_name = data.campus.campus_name;
                     console.log(campus_key);
                    console.log(campus_name);
                    
                    //console.log(data);
                    $("#block_name").val(data.block.block_name);
                    $("#num_of_rooms").val(data.block.numof_rooms);
                    $("#block_id").val(data.block.block_id);
                    $("#editcampus option[value=" +campus_key+ "]").prop("selected", true);
                    /*{$("#editcampus").filter(function() {
                        return $(this).val() == campus_key;
                    }).prop('selected', true);}*/
                    $("#editBlockModal").modal('show');

                },
            });
        });

        $('#edit_action').click(function(event) {
            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                url: '{{route("blocks")}}',
                method: "POST",
                data: {
                    block_name: $("#block_name").val(),
                    numof_rooms: $("#editBlockForm input[name=num_of_rooms]").val(),
                    id: $("#block_id").val(),
                    campus: $("#editcampus").val()
                },
                dataTpye: "json",
                success: function(data)
                {
                    console.log(data.success);
                     if(data.error.length > 0) 
                    {
                       var error_html ='';
                       for(var i = 0; i < data.error.length; i++) 
                       {
                           error_html += '<div class="alert alert-danger">' + data.error[i] + '</div>';
                       }
                       $('#editform_output').html(error_html);
                    }
                    else
                    {
                        var confirm = data.success
                        $('#editform_output').html(confirm);
                        setTimeout(function(){
                            $('#editform_output').html('');
                            window.location.reload();
                        },2000);                        
                    }

                },
                error: function(data)
                {
                    console.log(data);
                }

            });
        });

        $(document).on('click', '.delete', function() {
            var id = $(this).attr('id');
            console.log(id);

             if(confirm("This Block will be deleted. Are You sure you want to procceed?"))
             {
                 $.ajax({
                    url: "{{route('blocks.delete')}}",
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





@endsection

