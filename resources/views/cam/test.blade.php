<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#add_campus').click(function() {
           $('#addCampusModal').modal('show');
           $('#addCampusForm')[0].reset();
           $('#form_output').html('');
            
        });

        $('#addCampusForm').on('submit', function() {
            event.preventDefault();

            var form_data = $(this).serialize();
            console.log(form_data);

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

        $(document).on('click', '.edit', function() {
            $('#editform_output').html('')
            var id = $(this).attr("id");
            //console.log(id);

            $.ajax({
                url: '{{route("campus.show")}}',
                method: 'GET',
                data: {
                    id: id
                },
                dataTpye: "json",
                success: function(data) 
                {
                    console.log(data);
                    $('#campus_name').val(data.campus.campus_name);
                    $('#location').val(data.campus.location);
                    $('#campus_id').val(data.campus.campus_id);
                    $('#editCampusModal').modal('show');
                },

            });
        });

        $('#edit_action').click(function(event) {
            event.preventDefault();

            $.ajax({
                url: '{{route("campus.update")}}',
                method: "POST",
                data: {
                    campus_name: $("#campus_name").val(),
                    id: $("#campus_id").val(),
                    location: $("#location").val()
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

        $(document).on('click', '.delete', function() {
            var id = $(this).attr('id');
            console.log(id);

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

        });

    });
</script>