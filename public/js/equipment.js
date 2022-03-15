$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //implimenting the search/filter function
    $('#searchEquipment').on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $('#equipmentTableBody tr').filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    //Implimenting the add new equipment type function
    $('#addEquipmentTypeButton').click(function() {
        $('#equipmentTypeSubmit').show();
        $('#update_etype_div').hide();
        $('#delete_etype_div').hide();
        $('#deleteEtypeCard').hide();
        $('.delPbar').hide();        
        $('#form_alert').html('');
        $('#addEquipmentTypeForm')[0].reset();
        $('#addEquipmentTypeModal').modal({backdrop: "static"});
        
    });
    
//adding new equipment type
    $('#equipmentTypeSubmit').click(function(){ 
        var formData = $('#addEquipmentTypeForm').serialize();
        //url = $('#baseURL').val() + '/assets/etype';
        
        $.ajax({
            url: $('#baseURL').val() + '/assets/etype',
            method: 'POST',
            data : formData,
            dataType: 'json',
            success: function(data)
            {   if(data.error.length > 0) 
                {
                   var error_html ='';
                   for(var i = 0; i < data.error.length; i++) 
                   {
                       error_html += '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.error[i] + '</div>';
                   }
                   $('#form_alert').html(error_html);
                   
                }
                else 
                {
                    $('#form_alert').html(data.success);
                    setTimeout(function() {
                        window.location.reload();
                    },4000);
                }
                
            },
            error: function(data)
            {
                console.log(data);
            }
        });
        
    });

    //editing an equipement Type
    $('#etype_list li').dblclick(function(event) {
        event.preventDefault();
        $('#update_etype_div').show();
        $('#equipmentTypeSubmit').hide();
        $('#delete_etype_div').show();
        $('#deleteEtypeCard').hide();
        $('.delPbar').hide();
        $('#form_alert').html('');        
        var id = $(this).val();        

        $.ajax({
            url: $('#baseURL').val() + '/assets/equipment/edit_etype',
            type: 'GET',
            data: {
                id: id
            },
            dataType: "json",
            success: function(data)
            {
                // $('#addEquipmentTypeModal #etype').val(data.etype.type);
                $('#etype').val(data.etype.type);
                $('#eSubtype').val(data.etype.subtype);
                $('#update_etype_id').val(data.etype.id);
                $('#addEquipmentTypeModal').modal({backdrop: "static"});
            },
            error: function(data)
            {
                console.log(data);
            }
        });        
        
    });

    //update etype
    $('#update_etype').click(function(event){
        event.preventDefault();
        var formData = $('#addEquipmentTypeForm').serialize();
        var id = $('#update_etype_id').val();
        //console.log(id);
        $.ajax({
            url: $('#baseURL').val() + '/assets/etype/update',
            type: 'POST',
            data: {
                id: id,
                etype: $('#etype').val(),
                eSubtype: $('#eSubtype').val()
            },
            dataType: "json",
            success: function(data)
            {
                if(data.error.length > 0) 
                {
                   var error_html ='';
                   for(var i = 0; i < data.error.length; i++) 
                   {
                       error_html += '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.error[i] + '</div>';
                   }
                   $('#form_alert').html(error_html);
                   
                }
                else 
                {
                    $('#form_alert').html(data.success);
                    setTimeout(function() {
                        window.location.reload();
                    },4000);
                }
            },
            error: function(data)
            {
                console.log(data);
            }
        });   
    });

    //deleting etype
    $('#delete_etype').click(function(event){
        event.preventDefault();
        $('#deleteEtypeCard').toggle(1000);
        $('.noDelete').click(function(){
            $('#deleteEtypeCard').hide();            
        });

        $('.yesDelete').click(function(){
            $('.delPbar').show(500);
            var id = $("#update_etype_id").val();
            console.log(id);

            $.ajax({
                method: 'GET',
                url: $('#baseURL').val() + '/assets/etype/delete',
                data: 
                {
                    id: id
                },
                dataType: "json",
                success: function(data)
                {
                    setTimeout(function(){
                        $('#deleteEtypeCard').html(data.message);
                    },3000);
                    setTimeout(function(){
                        window.location.reload();
                    },3000);
                },
            });
        });
    });

    //opening the modal for new equipment addition
    $('#addEquipmentButton').on("click", function(){
        $('#defaultEform')[0].reset();
        $('#generalEform')[0].reset();
        $('#financeEform')[0].reset();
        $('#updateEquipment').hide();
        $('#delete_equipment').hide();
        $(".form_date").datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true,
            todayBtn: true,
            pickerPosition: "top-left"
        });        
        $('#addEquipmentModal').modal({backdrop: "static"});
    });

    $('#saveNewEquipment').click(function(event){
        event.preventDefault(); 
        // var defaultform = $('#defaultEform').serialize();
        // var generalform = $('#generalEform').serialize();
        // var financeform = $('#financeEform').serialize();
        // var Description = $('input[name="Description"]').val(); 
        var Type = $('#eqmType').val();
        var use_frequency = $('#use_frequency option:selected').val();
        var Notes = $('#eNotes').val();      
        
        $.ajax({
            url: $('#baseURL').val() + '/assets/equipment/store',
            type: 'POST',
            data: 
            {
                Description: $('input[name="Description"]').val(),
                Type: Type,
                Manufacturer: $('input[name="Manufacturer"]').val(),
                Brand: $('input[name="Brand"]').val(),
                Model: $('input[name="Model"]').val(),
                serial_number: $('input[name="serial_number"]').val(),
                Condition: $('input[name="Condition"]').val(),
                Custodian: $('input[name="Custodian"]').val(),
                current_status: $('#current_status').val(),
                use_frequency: use_frequency,
                depreciation_level: $('input[name="depreciation_level"]').val(),
                Image: $('input[name="Image"]').val(),
                Notes: Notes,
                Vendor: $('input[name="eVendor"]').val(),
                purchased_date: $('input[name="purchased_date"]').val(),
                purchased_price: $('input[name="purchased_price"]').val(),
                current_value: $('input[name="current_value"]').val(),
                ScrapValue: $('input[name="ScrapValue"]').val(),
                in_use_from: $('input[name="in_use_from"]').val(),
                exDate: $('input[name="exDate"]').val()              

            },
            dataType: 'json',
            success: function(data)
            {
                if(data.error.length > 0) 
                {
                   var error_html ='';
                   for(var i = 0; i < data.error.length; i++) 
                   {
                       error_html += '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.error[i] + '</div>';
                   }
                   $('#addform_alert').html(error_html);
                   
                }
                else 
                {
                    $('#addform_alert').html(data.success);
                    setTimeout(function() {
                        window.location.reload();
                    },4000);
                }
            },
            error: function(data) 
            {
                console.log(data);
            }
        });
    });

    //edit existing equipment   
    $(".equip_row").on("dblclick",function(event) {
        event.preventDefault();
        $('#saveNewEquipment').hide();
        $('#updateEquipment').show();
        $('#delete_equipment').show();
        $(".form_date").datepicker({
            format: 'yyyy/mm/dd',
            autoclose: true,
            todayBtn: true,
            pickerPosition: "top-left"
        });
        $('.modal-edit').text("Edit") 
        var id = this.id;
        console.log(id);

        $.ajax({
            url: $('#baseURL').val() + '/assets/equipment/edit',
            type: 'GET',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data)
            {                
                $('#eDescription').val(data.eqm.description);
                $('#eqmType').val(data.eqm.equipmentType_id);
                $('#eManufacturer').val(data.eqm.manufacturer);
                $('#eBrand').val(data.eqm.brand);
                $('#eModel').val(data.eqm.model);
                $('#eSN').val(data.eqm.serial_number);
                $('#eCondition').val(data.eqm.econdition);
                $('#eCustodian').val(data.eqm.custodian);
                $('#current_status').val(data.eqm.current_status);
                $('#use_frequency').val(data.eqm.use_frequency);
                $('#depreciation_level').val(data.eqm.depreciation_level);
                $('#eImage').val(data.eqm.image_path);
                $('#eNotes').val(data.eqm.notes);
                $('#eVendor').val(data.eqm.vendor);
                $('#purchased_date').val(data.eqm.purchased_date);
                $('#purchased_price').val(data.eqm.purchased_value);
                $('#current_value').val(data.eqm.current_value);
                $('#eScrapValue').val(data.eqm.scrap_value);
                $('#in_use_from').val(data.eqm.date_of_start_use);
                $('#exDate').val(data.eqm.expiration_date);
                $('#update_equipment_id').val(data.eqm.id);

                $('#addEquipmentModal').modal({backdrop: "static"});
            },
            error: function(data)
            {
                console.log(data);
            }
        });
        
    });

    //update an equipement
    $('#updateEquipment').click(function(event){
        event.preventDefault();
        var id = $('#update_equipment_id').val();
        
        $.ajax({
            url: $('#baseURL').val() + '/assets/equipment/update',
            method: 'POST',
            data: {
                id: id,
                Description: $('input[name="Description"]').val(),
                Type: $('#eqmType').val(),
                Manufacturer: $('input[name="Manufacturer"]').val(),
                Brand: $('input[name="Brand"]').val(),
                Model: $('input[name="Model"]').val(),
                serial_number: $('input[name="serial_number"]').val(),
                Condition: $('input[name="Condition"]').val(),
                Custodian: $('input[name="Custodian"]').val(),
                current_status: $('#current_status').val(),
                use_frequency: $('#use_frequency option:selected').val(),
                depreciation_level: $('input[name="depreciation_level"]').val(),
                Image: $('input[name="Image"]').val(),
                Notes: $('#eNotes').val(),
                Vendor: $('input[name="eVendor"]').val(),
                purchased_date: $('input[name="purchased_date"]').val(),
                purchased_price: $('input[name="purchased_price"]').val(),
                current_value: $('input[name="current_value"]').val(),
                ScrapValue: $('input[name="ScrapValue"]').val(),
                in_use_from: $('input[name="in_use_from"]').val(),
                exDate: $('input[name="exDate"]').val() 
            },
            dataType: 'json',
            success: function(data)
            {
                if(data.error.length > 0) 
                {
                   var error_html ='';
                   for(var i = 0; i < data.error.length; i++) 
                   {
                       error_html += '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.error[i] + '</div>';
                   }
                   $('#addform_alert').html(error_html);
                   
                }
                else 
                {
                    $('#addform_alert').html(data.success);
                    setTimeout(function() {
                        window.location.reload();
                    },4000);
                }
            },
            error: function(data) 
            {
                console.log(data);
            }
        });

    });

    //deleting Equipment
    $('#delete_equipment').click(function(event){
        event.preventDefault();
        var id = $('#update_equipment_id').val();
        $('#delete_eqm_modal').modal("show");
        $('.delete_eqm').click(function(){
            $.ajax({
                url: $('#baseURL').val() + '/assets/equipment/delete',
                method: 'GET',
                data:{
                    id: id
                },
                dataType: 'json',
                success: function(data)
                {
                    $('#confirm_eqm').html(data.message);
                    setTimeout(function() {
                        window.location.reload();
                    },4000);
                },
                error: function(data)
                {
                    console.log(data);
                }
            });

        });
    });
    
    
});
    // var equipement_num;
    // function getEdetails(obj) {
    //     this.equipement_num = obj.id;
    //     console.log(equipement_num);
        
    // }

    


// (function() {
    //     'use strict';
    //     window.addEventListener('load', function() {
    //     // Get the forms we want to add validation styles to
    //     var forms = document.getElementsByClassName('needs-validation');
    //     // Loop over them and prevent submission
    //     var validation = Array.prototype.filter.call(forms, function(form) {
    //         form.addEventListener('click', '#equipmentTypeSubmit', function(event) {
    //         if (form.checkValidity() === false) {
    //             event.preventDefault();
    //             event.stopPropagation();
    //         }
    //         form.classList.add('was-validated');
    //         }, false);
    //     });
    //     }, false);
    // })();