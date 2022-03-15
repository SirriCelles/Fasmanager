

    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span>ADD ROLE</button>


    <div id="myModal" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="dailog">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title" id="myModalLabel"><span class="">
                    </span>Add New Role</h4>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">

                    <div class="" style="background-color:lavender;">                               
                        
                        <form id=""  method="post" action="">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                               
                                    <div class="form-group">
                                        <label for="name">Role Name:</label>
                                        <input type="text" class="form-control" name="name" id="">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Description:</label>
                                        <textarea type="text" class="form-control" name="description" id=""></textarea>
                                    </div>
                                    
                                     <div class="modal-footer">
                                        {{-- <button  type="button" class="btn btn-secondary" data-dismiss="modal" >Close</button> --}}
                                        <button type="submit" class="btn btn-primary" name="submit" id=""><span class="glyphicon glyphicon-ok"></span>Add</button>                                              
                                    </div>        
                                                  
                        </form>                       

                    </div>                                                      
                
                </div>
            </div>
        </div>
    </div>  

       
    

   

    <script>
        $(document).ready(function() {
            
           $("#myModal").click(function() {
               
               $("#myModal").modal();
            
            });
        });
    </script>
        
{{-- $('#btn-add').click(function () --}}

{{-- $("#assignPrivilege").submit(function(e) {
                    e.preventDefault();
                     $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        });
                        var content = {
                            role: $("#role").val(),
                            privilege: $("#privilege").val(),

                        };
                     
                    $.ajax({
                        type: 'POST',
                        url: "{{ url ('/assign') }}",
                        data: JSON.stringify(content),
                        dataType: 'json',
                        success: function(data) {
                        
                            $(".close").click();
                            alert("Data added");

                            window.location.reload();
                        },
                        error: function(data) {
                            console.log(data);
                        }
                    
                    });

                }); --}}

@stop

