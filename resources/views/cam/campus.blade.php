@extends('layouts.ndesign')

@section('main_content')

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> --}}
    {{-- date picker.css --}}
    {{-- <link rel="stylesheet" href="{{URL::asset('bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>   
      
</head>
<body> --}}
   

<div class="container-fluid"> 
    {{-- new UI --}}
    <div class="card" id="campus_card" style=" border:none;" >
        <div class="row">
            <div class="col-md">
                <div class="card-header bg-white" style="border: none;" >
                    <div class="clearfix">
                        <div class="float-left">
                            <!-- Buttons -->
                            {{-- Add Modal button --}}
                            <button type="button" class="btn btn-success shadow my-2 mx-2 rounded-0" data-toggle="modal" data-backdrop="false" id="add_campus">
                                    <i class="material-icons" style="font-size: 20px;color:whitesmoke">add_box</i>
                                    Campus
                            </button>
                            {{-- the edit campus link --}}
                            <a href="#"  class="btn btn-outline-info shadow my-2 mx-2 rounded-0 edit" id="camCard_campus_id" name="camCard_campus_id">
                                <i class="material-icons" style="font-size:20px">edit</i>Edit
                            </a>
                            {{-- the delete campus button --}}
                            <button  class="btn btn-outline-danger shadow my-2 mx-2 rounded-0 delete" id="camCard_campus_id">
                                    <i class="material-icons" style="font-size:20px">delete</i>Delete
                            </button>
                        </div>
                        <div class="float-right">
                            {{-- the add  campus asset link  --}}
                            <a href="#" class="btn btn-secondary shadow my-2 mx-2 rounded-0" id="manageAssetBtn">
                                <i class="material-icons" style="font-size: 20px;color:whitesmoke">add_box</i>
                                Manage Assets
                            </a> 
                        </div>
                    </div>                   
                       
                </div> 
            </div>
            {{-- <div class="col-sm-4">
                <div class="card-header bg-white" style="border: none;">
                    <div class="clearfix">
                        <div class="dropdown">
                            <button class="bg-black float-right dropdown-toggle shadow my-2" data-toggle="dropdown">
                            </button>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item refresh"><i class="material-icons" style="font-size: 1em;">refresh</i>refresh</a>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>                 
        </div> --}}
        <div class="container-fluid">
            <div class="card-header cardBody" style="border-top:1px solid #e5e5e5;">
                {{-- <h5 class="card-title my-0 text-center " id="camCard_header_name" name="cam_header_name"></h5> --}}
                <div class="card-text">
                    <dl class="row my-0">
                        <dd class="col-xs-5" id="camCard_header_name"></dd>
                        <dt class="col-sm-5" id="camCard_name"></dt>                        
                    </dl>
                    <dl class="row my-0">
                        <dd class="col-xs-5" id="camCard_location_header"></dd>
                        <dt class="col-sm-5" id="camCard_location"></dt>                        
                    </dl>
                    <dl class="row my-0">
                        <dd class="col-xs-5" id="camCard_description_header"></dd>
                        <dt class="col-sm-7" id="camCard_description"></dt>
                    </dl>
                </div>
            </div>
            
        </div>
        {{-- <div class="card-footer bg-secondary" style="padding:2px;">
          <p></p>
        </div>        --}}
    </div>

    <table class="table table-bordered table-hover" id="campus_table">
            <thead class="text-center">               
                <tr>
                    <th>No</th>
                    <th class="glyphicon-text-color">
                        <input type="radio" disabled="disabled" checked="checked"> Select a campus to see details
                    </th>
                    <th>Location</th>

                    
                    {{-- <th>Location</th> --}}
                </tr>
            </thead>
            <tbody>
                @php
                    $campuses = App\Campus::all();
                @endphp               
                    @foreach ($campuses as $key=> $campus)

                <tr>
                    <td>{{$key+1}}</td>
                    <td>                        
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="cam_name_select" name="cam_name" value="{{$campus->campus_id}}">{{ $campus->campus_name }}
                            </label>
                        </div>                      
                         
                    </td>
                    <td>{{$campus->location}}</td>
                    
                    {{-- <td>{{ $campus->location }}</td> --}}
                    {{-- <td>
                        
                        <a href="#"  class="btn btn-outline-info" id="{{$campus->campus_id}}">
                            <i class="material-icons" style="font-size:20px">edit</i>Edit
                        </a>
                        <a href="#"  class="btn btn-outline-danger" id="{{$campus->campus_id}}">
                            <i class="material-icons" style="font-size:20px">delete</i>Delete
                        </a>
                    </td> --}}          
                </tr>       
                    @endforeach
            </tbody>
        </table>
</div>



@include('partials.addCampus')
@include('partials.editCampus')
@include('partials.addAsset')

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.cardBody').hide();

        // To refresh page at will.
        $(document).on('click', '.refresh', function(e){
            e.preventDefault();
            window.location.reload();
        });
        

        //script to show details of selected campus
        $(document).on('change','#campus_table, #cam_name_select',function(event){
            event.preventDefault();
            var selectedCampus = $("input[name='cam_name']:checked").val();
            $('.cardBody').show();
            
            //console.log(selectedCampus);

                $.ajax({
                    url: '{{route("campus.campusDetails")}}',
                    method: 'GET' ,
                    data: {
                        id: selectedCampus
                    },
                    dataType: "json",
                    success: function(data)
                    {
                        //console.log(data.campus);
                        var campus_id = data.campus.campus_id;

                        //console.log(campus_id);
                        $('#camCard_header_name').text("Name:")
                        $('#camCard_name').text(data.campus.campus_name);
                        $('#camCard_location').text(data.campus.location);
                        $('#camCard_description').text(data.campus.description);
                        $('#camCard_location_header').text("Location:");
                        $('#camCard_description_header').text("Description:");
                        $('#camCard_campus_id').val(campus_id);
                    
                    },

                    error: function(data) {
                        console.log(data);
                    }
                
                });            

                        
        }); 
//end of script

// sript  add campus (modal)
        $('#add_campus').click(function() {
           $('#addCampusModal').modal('show');
           $('#addCampusForm')[0].reset();
           $('#form_output').html('');
            
        });

        $('#addCampusForm').on('submit', function(event) {
            event.preventDefault();

            var form_data = $(this).serialize();
            //console.log(form_data);

            $.ajax({
                url: '{{route("campus.store")}}',
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
                        $('#addCampusForm')[0].reset();
                        setTimeout(function() {
                            $('#form_output').html('');
                            window.location.reload();
                        },2000)
                        
                    }
                }
            });
        });
// end of add campus.

// script to edit selected campus
        $(document).on('click', '.edit', function() {
            var id = $('#camCard_campus_id').val();
            if(id) {
                $('#editform_output').html('')
                       

                $.ajax({
                    url: '{{route("campus.show")}}',
                    method: 'GET',
                    data: {
                        id: id
                    },
                    dataTpye: "json",
                    success: function(data) 
                    {
                        //console.log(data.campus.campus_name);
                        $('#editCampusModal .edit_heading').html('<i class="material-icons">mode_edit</i>' + data.campus.campus_name);
                        $('#campus_name').val(data.campus.campus_name);
                        $('#location').val(data.campus.location);
                        $('#description').val(data.campus.description);
                        $('#campus_id').val(data.campus.campus_id);
                        $('#editCampusModal').modal('show');
                    },

                });
            }
        });
// end of script

// script to update edited campus

        $('#edit_action').click(function(event) {
            event.preventDefault();

            $.ajax({
                url: '{{route("campus.update")}}',
                method: "POST",
                data: {
                    campus_name: $("#campus_name").val(),
                    id: $("#campus_id").val(),
                    location: $("#location").val(),
                    description: $("#description").val()
                },
                dataTpye: "json",
                success: function(data)
                {
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
// end of script

// script to delete selected campus
        $(document).on('click', '.delete', function() {
            var id = $('#camCard_campus_id').val();
            if(id) {                       

                if(confirm("This Campus and all Blocks related to it  will be deleted. Are You sure you want to procceed?"))
                {
                    $.ajax({
                        url: "{{route('campus.delete')}}",
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
            }

        });

    });
//end of script.
</script>
{{-- linking home scripts --}}
<script src="<?php echo asset('js/manageAssets.js');?>"></script>
{{-- </body>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>      
   
</html> --}}


@endsection

