@extends('layouts.ndesign')

@section('main_content')

<div class="container-fluid">
    <div class="table-wrapper">
        <div class="table-title">            
            <div class="clearfix" >
                <span class="float-left">
                    <button type="button" class="btn btn-info shadow my-2  rounded-0" data-toggle="modal" id="add_priv">
                        <i class="material-icons pr-1" style="font-size: 20px;color:whitesmoke">add_box</i>Add Privilege
                    </button>
                </span>
                <div class="float-right">
                    <button type="button" class="btn btn-primary shadow my-2 rounded-0" data-toggle="modal" id="assignPrivilege">
                        <i class='fas fa-id-badge pr-1' style='font-size:20px;'></i>Assign Privileges
                    </button>
                </div>
            </div>            
        </div>
        <div class="table table-responsive-md">        
            <table class="table table-bordered">
                <thead class="thead-light text-center">                               
                    <tr>
                        <th>No</th>
                        <th>Privilege Name</th>
                        <th>Path</th>                     
                        <th>Status</th>
                        <th>Description</th> 
                        <th></th>
                        <th></th>                
                                                      
                    </tr>
                </thead>
                <tbody class="font-weight-light text-center">                                
                        @foreach ($privileges as $key=> $privilege)

                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ $privilege->name }}</td>
                        {{-- <td>{{ $privilege->pslug }}</td> --}}
                        {{-- <td>{{ $privilege->icon }}</td> --}}
                        <td>{{ $privilege->path }}</td>                 
                        
                        <td>{{ $privilege->status }}</td>
                        <td>{{ $privilege->description }}</td>

                        <?php $privilege_id=strval($privilege->id)
                            ?>
                        <td>                            
                            <a href="#" class="badge badge-secondary shadow font-weight-light edit" id="{{$privilege->id}}">
                                <i class="material-icons" style="font-size:15px">edit</i>Edit
                            </a>                                                                            
                        </td>
                        <td>                                                                           
                            <a href="#" class="badge badge-danger shadow font-weight-light delete" id="{{$privilege->id}}">
                                <i class="material-icons" style="font-size:20px">delete</i>
                            </a>                        
                        </td>                           
                            
                    </tr>        
                        @endforeach
                    
                </tbody>
            </table>
        </div>
        {{-- <div class="clearfix">
             <div class="hint-text">Showing <b>{{$privileges->count()}}</b> out of <b>{{$privileges->total()}}</b> entries</div>
                {{ $privileges->links() }}
        </div> --}}


    </div>
</div>

@include('partials.editPrivileges')  
  
@include('partials.addPrivileges') 
@include('partials.assignPrivileges')      




<script>

$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#assignPrivilege').click(function(){
        $('#assignPrivilegeModal').modal('show');
        $('#assignPrivilegeForm')[0].reset();
        $('#assignform_output').html('');
    });

        $(document).on('change', '#assignPrivilegeForm #chooseRole',
            function(event){
            event.preventDefault();
            var selectedRole_id = $(this).children("option:selected").val();
            //console.log(selectedRole_id);
            

            $.ajax({
                url: '{{ route("privileges.show_rolePrivileges") }}',
                method: 'GET',
                data: 
                {
                    id: selectedRole_id
                },
                dataType: "json",
                success: function(data)
                {
                    var rolePrivileges = [];
                    rolePrivileges = data.privOutput;        
                    var privilege;
                    const message =  '<div class="alert alert-info alert-dismissible">\
                        <button type="button" class="close" data-dismiss="alert">&times;</button>There is No privilege for this Role</div>';
                    

                    $("#assignPrivilegeForm input[name=this_role_id]").val(selectedRole_id);

                    if(Object.keys(rolePrivileges).length > 0)
                    {
                        rolePrivileges.forEach(privilege => {
                        //console.log(privilege.id);
                            $("#assignPrivilegeForm input[name=privilege][value='" +privilege.id+"']").prop('checked', true);
                        });
                    }
                    else
                    {
                        var displayTime;
                         $('#assignform_output').html(message);
                        //displayTime = setInterval(function(){
                           //window.location.reload();
                            //$('#addPrivilegeForm')[0].reset();
                        //},3000);
                        
                    }
                    
                },
                error: function(data) 
                {
                    console.log(data);
                }
            });
        });

        $(document).on('click', '#assignPrivilegeForm #submit_privilege', function(event){
            event.preventDefault();
             
            var id = $("#this_role_id").val();
            
            var privileges_checked_array = [];
            $.each($("#assignPrivilegeForm input[name=privilege]:checked"), function() {
                privileges_checked_array.push($(this).val());
            });
            console.log(privileges_checked_array);

            var privileges_unchecked_array = [];
            $.each($("#assignPrivilegeForm input[name='privilege']:not(:checked)"), function() {
                privileges_unchecked_array.push($(this).val());
            });
            console.log(privileges_unchecked_array);
            //console.log(privileges_checked_array);


            $.ajax({
                url: '{{ route("privileges.store_rolePrivileges")}}',
                method: 'POST',
                data: 
                {
                    id: id,
                    privileges_checked: privileges_checked_array,
                    privileges_unchecked: privileges_unchecked_array
                },
                dataTpye: "json",
                success: function(data)
                {   var confirmation = data.message
                    console.log(confirmation);
                    console.log(data);
                    $('#assignform_output').html(confirmation);
                    //$('#addPrivilegeForm')[0].reset();
                    setTimeout(function() {
                        window.location.reload();
                    },3000)
                }
            });
        });

   
    $('#add_priv').click(function() {
        $('#addPrivilegeModal').modal('show');
        $('#addPrivilegeForm')[0].reset();
        $('#form_output').html('');
        
    });

    $('#addPrivilegeForm').on('submit', function(event) {
        event.preventDefault();

        var form_data = $(this).serialize();
        console.log(form_data);

        $.ajax({
            url: '{{route("privileges.store")}}',
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
                    //$('#addPrivilegeForm')[0].reset();
                    setTimeout(function() {
                        window.location.reload();
                    },2000)
                    
                }
            },
        });
    });

        $(document).on('click', '.edit', function() {
            //$('#editform_output').html('')
            var id = $(this).attr("id");
            console.log(id);

            $.ajax({
                method: 'GET',
                url: '{{route("privileges.get_privilege")}}' ,
                data: {
                    id: id
                },
                success: function(data) {
                    //console.log(data.status); 
                    var priv_id = data.privilege.id;
                    console.log(priv_id);
                    var status_output = data.privilege.status;
                    //$("#edit-error-bag").hide();
                    $("#editPrivilegeForm input[name=name]").val(data.privilege.name);
                    $("#editPrivilegeForm input[name=pslug]").val(data.privilege.pslug);
                    $("#editPrivilegeForm input[name=icon]").val(data.privilege.icon);
                    $("#editPrivilegeForm input[name=path]").val(data.privilege.path);
                    
                    $("#editPrivilegeForm input[name=description]").val(data.privilege.description);
                    

                    $("#editPrivilegeForm input[name=status][value=" +status_output+ "]").prop('checked', true);
                    $("#priv_id").val(priv_id);
                    $('#editPrivilegeModal').modal('show');
                },

                error: function(data) {
                    console.log(data);
                }
            });

        });

        $('#editPrivilegeForm').on('submit', function(event) {
                event.preventDefault();
            var id = $("#priv_id").val();
            console.log(id);
            $.ajax({
                type: 'POST',
                url: '{{ route("privileges.update") }}',
                data: 
                {
                    id:  id, //$("#priv_id").val(),
                    name: $("#editPrivilegeForm input[name=name]").val(),
                    pslug: $("#editPrivilegeForm input[name=pslug]").val(),
                    icon: $("#editPrivilegeForm input[name=icon]").val(),
                    path: $("#editPrivilegeForm input[name=path]").val(),
                    status: $("#editPrivilegeForm input[name='status']:checked").val(),
                    description: $("#editPrivilegeForm input[name=description]").val(),
                },
                dataTpye: "json",
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
                        $('#editform_output').html(error_html);
                    }
                    else
                    {
                        var confirm = data.success
                        $('#editform_output').html(confirm);
                        setTimeout(function(){
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

             if(confirm("This Block will be deleted. Are You sure you want to procceed?"))
             {
                 $.ajax({
                    url: "{{route('privileges.delete')}}",
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
  
  
                                {{-- <a onclick="editPrivilegeForm(this)" rel="{{$privilege_id}}" href="#" class="btn btn-info open-modal" data-toggle="modal" value="{{$privilege->id}}"><span class=" glyphicon glyphicon-edit"></a>
                                <a onclick="deletePrivilegeForm(this)" rel="{{$privilege_id}}" href="#" class="btn btn-danger" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></a> --}}
                        
                        
                        {{-- <td><a href="editroles/{{$role->id}}" class="btn btn-primary">
                        <span class=" glyphicon glyphicon-pencil"></span>
                        </a></td> --}}
                        {{-- <td><a href="editroles/{{$role->id}}" class="btn btn-info" id="editRoleModal">
                        <span class=" glyphicon glyphicon-pencil"></span>
                        </a></td>
                        <td>
                            <form action="{{ action('RoleController@destroy')}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="role_id" value="{{$role->id}}">
                            <button type="submit" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash"></span></button>
                            </form>
                        </td>                                                      --}}
