@extends('layouts.ndesign')

@section('main_content')

<div class="container-fluid">
    <div class="table-wrapper">
        <div class="table-title">            
            {{-- <div class="">
                <h2>Manage <b>Roles</b></h2>
            </div> --}}
            <div class="">
                <button type="button" class="btn btn-info shadow my-2 rounded-0" data-toggle="modal" id="add_role">
                    <i class="material-icons" style="font-size: 20px;color:whitesmoke">add_box</i>Add a Role
                </button>                    
            </div>                 
        </div>
        <table class="table table-hover table-bordered text-center mt-2">
            <thead>                               
                <tr>
                    <th>No</th>
                    <th>Role Name</th>
                    <th>Slug</th>
                    <th>Description</th>
                    <th> Action</th>
                    
                    
                </tr>
            </thead>
            <tbody>                                
                    @foreach ($roles as $key=> $role)

                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->slug }}</td>
                    <td>{{ $role->description }}</td>                   
                    
                        {{-- <a href="editroles/{{$role->id}}" class="btn btn-info" id="editRoleModal">
                        <span class=" glyphicon glyphicon-edit"></span>
                        </a> --}}
                        {{-- <span data-toggle="" href="#" class="btn btn-info" id="editbtn"><span class="glyphicon glyphicon-edit"></span></span> --}}
                    <td>
                        
                        <a href="#" class="badge badge-secondary shadow my-2 font-weight-light edit" id="{{$role->id}}">
                            <i class="material-icons" style="font-size:20px">edit</i>Edit
                        </a>

                        <a href="#" class="badge badge-danger shadow my-2 delete" id="{{$role->id}}">
                            <i class="material-icons" style="font-size:20px">delete</i>
                        </a>                        
                    </td>
                        
                    
                    
                    {{-- <td>
                        <form action="{{ action('RoleController@destroy')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="role_id" value="{{$role->id}}">
                        <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </td>                                                      --}}
                </tr>        
                    @endforeach
                
            </tbody>
        </table>


    </div>
</div>
@include('partials.addRoles')
 
@include('editroles')

             
<script>

$(document).ready(function(){
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }); 

         $('#add_role').click(function() {
           $('#addRoleModal').modal('show');
           $('#addRoleForm')[0].reset();
           $('#form_output').html('');
            
        });

        $('#addRoleForm').on('submit', function(event)
        {
            event.preventDefault();
            var form_data = $(this).serialize();
            console.log(form_data);

            $.ajax({
                url: '{{route("roles.store")}}',
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
                           error_html += '<div class="alert alert-danger">' + data.error[i] + '</div>';
                       }
                       $('#form_output').html(error_html);
                    }
                    else
                    {
                        $('#form_output').html(data.success);
                        $('#addRoleForm')[0].reset();
                        setTimeout(function()
                        {
                            //$('#form_output').html('');
                            window.location.reload();
                        },1000)
                        
                    }
                }
            });
        });

        $(document).on('click', '.edit', function() {
            $('#editform_output').html('')
            var id = $(this).attr("id");
            console.log(id);

            $.ajax({
                url: '{{route("roles.show")}}',
                method: 'GET',
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data)
                {
                                     
                                        
                    //console.log(data);
                    $("#name").val(data.role.name);
                    $("#slug").val(data.role.slug);
                    $("#description").val(data.role.description);
                    $("#id").val(data.role.id);
                   
                    $("#editRoleModal").modal('show');

                },
            });
         });

            $('#edit_action').click(function(event){
                event.preventDefault();

                $.ajax({
                   url: '{{route("roles.update")}}',
                    method: "POST",
                    data: {
                        name: $("#name").val(),
                        slug: $("#slug").val(),
                        description: $("#description").val(),
                        id: $("#id").val()
                    },
                    dataType: "json",
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
                                //$('#editform_output').html('');
                                window.location.reload();
                            },1000);
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

             if(confirm("This Role and All Users with this Role will be deleted.  Are You sure you want to procceed?"))
             {
                 $.ajax({
                    url: "{{route('roles.delete')}}",
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
        
   
          

