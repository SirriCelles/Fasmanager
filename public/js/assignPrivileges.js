$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click', '#assignPrivilege', function(){
        $('#assignPrivilegeModal').modal('show');
        $('#assignPrivilegeForm')[0].reset();

        $('#chooseRole').change(function() {
            var chooseRole_id = $(this).children("option:selected").val();
            console.log(chooseRole_id);

            $.ajax({
                url: '{{ route("privileges.show_rolePrivileges") }}',
                method: 'GET',
                data: 
                {
                    id: chooseRole_id
                },
                dataType: "json",
                success: function(data)
                {
                    //console.log(data);
                },
            });
         });
        
    });

   

    $('#assignPrivilegeForm').on('submit', function() {

    });
});