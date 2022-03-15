$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#manageAssetBtn').click(function(){
        $('#assetModal').modal("show");//show asset
        $('.nav-tabs a[href="#viewAsset"]').tab("show"); //to show all assets once modal is open
        $('#assetForm')[0].reset();
        $('#assetform_output').html('');
        $("#tAssetDiv").hide();
        $("#bAssetDiv").hide();
        $("#iAssetDiv").hide();
        $('#updateAsset').hide();
        $("#purchasedDate").datepicker({
            format: 'yyyy/mm/dd'
        });
        $('#deleteAssetCard').hide();
        
        $('#goToAddAssetTab').hide();
        $('#delPbar').hide();
            //$('.nav-tabs a[href="#viewAssetDetails"]').tab("show");
            
       
    });

    $('.nav-tabs a[href="#addAsset"]').click(function(){
        $(this).tab('show');
        //$('.nav-tabs a[href="#viewAssetDetails"]').tab("show");        
    });        
    
    

    //dynamically display form fields depending on the catergory choosen
    $("#assetCategory").on({
        change: function() {
            var assetCategory = [
                'Tangible Asset',
                'Intangible Asset',
                'Building'
            ];
            var categorySelected = $(this).children("option:selected").val();
            if(categorySelected == assetCategory[0]) {
                $("#tAssetDiv").show();
                
                $("#bAssetDiv").hide();
                $("#iAssetDiv").hide();
                
            }
            else if(categorySelected == assetCategory[1]) {
                $("#iAssetDiv").show();
                $("#tAssetDiv").hide();
                $("#bAssetDiv").hide();
                $("#depLevelDiv").hide();
                
            }

            else if(categorySelected == assetCategory[2]){
                $("#bAssetDiv").show();
                $("#tAssetDiv").hide();
                $("#iAssetDiv").hide();
            }
        }
    });

//adding a new resource to the asset table
    $('#assetForm').on('submit', function(event) {
        event.preventDefault();
        
        var addAssetUrl = $('#baseURL').val() + '/cam/campus';      
              
        $.ajax({
            method: 'POST',
            url: addAssetUrl,
            data: {
                assetCategory: $('#assetCategory').val(),
                t_assetType: $('#t_assetType').val(),
                buildingType: $('#buildingType').val(),
                it_assetType: $('#it_assetType').val(),
                name: $('#name').val(),
                assetLocation: $('#assetLocation').val(),
                purchaseValue: $('#purchaseValue').val(),
                economicValue: $('#economicValue').val(),
                purchasedDate: $('#purchasedDate').val(),
                number: $('#number').val(),
                ownership: $('#ownership').val(),
                operatingStatus: $('#operatingStatus').val(),
                usage: $('#usage').val(),
                depreciationLevel: $('#depreciationLevel').val(),
                assetDescription: $('#assetDescription').val(),
            },
            
            dataType: "json",
            success:function(data)
            {
                //console.log(data);
                if(data.error.length > 0)
                {
                    var validationError = '';
                    for(var i = 0; i < data.error.length; i++)
                    {
                        validationError += '<div class="alert alert-danger alert-dismissible" style="padding:1px;"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.error[i] + '</div>';
                    }
                    $('#assetform_output').html(validationError);
                }

                else
                {
                    $('#assetform_output').html(data.success)
                    setTimeout(function(){
                        $('#assetform_output').html('');
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

    //showing all existing assets
    $("#seeDetailsNavTab").hide();    
    $("#viewAsset").on('change', '#viewAssetName',function(){
        var selectedAssetId = $("input[name='viewAssetName']:checked").val();
        $("#dp_level").hide(); 

        $.ajax({
            type: 'GET',
            url: $('#baseURL').val() + '/cam/campus/showAsset',
            data : 
            {
                selectedAssetId: selectedAssetId
            },
            dataType: 'json',
            success: function(data)
            {
                //console.log(data.asset.depreciationLevel);
                if(data.asset.buildingType !== null){
                    $(".type").text(data.asset.buildingType);
                }
                else if(data.asset.tangibleAssetType !== null){
                    $(".type").text(data.asset.tangibleAssetType);
                }
                else if(data.asset.intangibleAssetType !== null) {
                    $(".type").text(data.asset.intangibleAssetType);
                }               
                $(".assetName").text(data.asset.name);
                $(".category").text(data.asset.category);                
                $(".location").text(data.assetLocation);
                $(".pvalue").text(data.asset.purchasedValue);
                $(".pdate").text(data.asset.purchasedDate);
                $(".evalue").text(data.asset.economicValue);
                $(".number").text(data.asset.number);
                $(".ownership").text(data.asset.ownership);
                $(".ostatus").text(data.asset.operatingStatus);
                $(".usage").text(data.asset.useFrequency);                
                $(".desc").text(data.asset.description);
                $("#assetId").val(data.asset.id);
                if(data.asset.depreciationLevel !== null){
                    $(".dpLevel").text(data.asset.depreciationLevel);
                    $("#dp_level").show();
                }                
                $("#seeDetailsNavTab").show(300);                
                $('.nav-tabs a[href="#viewAssetDetails"]').tab("show");
                $("#seeDetailsNavTab").click(function(){
                    $('.nav-tabs a[href="#viewAssetDetails"]').tab("show");
                });
            },
        });    
              
        
    });

    //Editing Selected Asset
    $(".editAsset").on({
        click: function(){
            var id = $("#assetId").val();        
            //$('.nav-tabs a[href="#addAsset"]').text("Edit Asset");
            $('#assetForm')[0].reset();
            $('#assetform_output').html('');
            $("#tAssetDiv").hide();
            $("#bAssetDiv").hide();
            $("#iAssetDiv").hide();
            $("#depLevelDiv").hide();
            $("#purchasedDate").datepicker({
                format: 'yyyy/mm/dd'
            });            
            $('.nav-tabs a[href="#addAsset"]').hide();

            $.ajax({
                type: 'GET',
                url: $("#baseURL").val() + '/cam/campus/editAsset',
                data:{
                    id: id
                },
                dataType: "json",
                success: function(data)
                {
                    //console.log(data);
                    if(data.asset.buildingType !== null){
                        $("#buildingType").val(data.asset.buildingType);
                        $("#bAssetDiv").show();
                    }
                    else if(data.asset.tangibleAssetType !== null){
                        $("#t_assetType").val(data.asset.tangibleAssetType);
                        $("#tAssetDiv").show();

                    }
                    else if(data.asset.intangibleAssetType !== null) {
                        $("#it_assetType").val(data.asset.intangibleAssetType);
                        $("#iAssetDiv").show();
                    }
                    $('#upDateId').val(data.asset.id);  
                    $("#assetCategory").val(data.asset.category);
                    $("#name").val(data.asset.name);
                    $("#assetLocation").val(data.campus_id);
                    //$("#assetLocation").text(data.campus_name);
                    $("#purchaseValue").val(data.asset.purchasedValue);
                    $("#economicValue").val(data.asset.economicValue);
                    $("#purchasedDate").val(data.asset.purchasedDate);
                    $("#number").val(data.asset.number);
                    $("#ownership").val(data.asset.ownership);
                    $("#operatingStatus").val(data.asset.operatingStatus);
                    $("#usage").val(data.asset.useFrequency);                
                    $("#assetDescription").text(data.asset.description);
                    if(data.asset.depreciationLevel !== null){
                        $("#depreciationLevel").val(data.asset.depreciationLevel);
                        $("#depLevelDiv").show();                   
                    }
                    $('#asset_submit').hide();
                    $('#updateAsset').show();
                    $('#goToAddAssetTab').show(300);
                    $('.nav-tabs a[href="#addAsset"]').tab('show');
                },
            });          

        },        
    });

    //possible way to add new asset while still on edit asset form
    $('#goToAddAssetTab').click(function(event){
        event.preventDefault();
        $('#assetForm').trigger("reset");            
            $('#assetform_output').html('');
            $("#tAssetDiv").hide();
            $("#bAssetDiv").hide();
            $("#iAssetDiv").hide();
            $("#depLevelDiv").hide();
            $("#purchasedDate").datepicker({
                format: 'yyyy/mm/dd'
            });
            $("#assetDescription").text('');
            $('#asset_submit').show();
            $('#updateAsset').hide();
        $('.nav-tabs a[href="#addAsset"]').tab('show');
    });
    
    //update edited asset
    $('#assetForm').on('click','#updateAsset', function(event){
        event.preventDefault();
        var formData = $('#assetForm').serialize();
        //console.log(formData);

        $.ajax({
            type: 'POST',
            url: $('#baseURL').val() + '/cam/campus/updateAsset',
            data: formData,
            dataType: "json",
            success: function(data)
            {
                //console.log(data);
                if(data.error.length > 0)
                {
                    var validationError = '';
                    for(var i = 0; i < data.error.length; i++)
                    {

                        validationError += '<div class="alert alert-danger alert-dismissible" style="padding:2px;"><button type="button" class="close" data-dismiss="alert">&times;</button>' + data.error[i] + '</div>';
                    }
                    $('#assetform_output').html(validationError);
                }

                else
                {
                    $('#assetform_output').html(data.success)
                    setTimeout(function(){
                        $('#assetform_output').html('');
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


    //To delete an asset
    $('.deleteAsset').click(function(){        
        $('#deleteAssetCard').toggle(1000);
        $('.noDelete').click(function(){
            $('#deleteAssetCard').hide();            
        });

        $('.yesDelete').click(function(){
            $('#delPbar').show(500);
            var id = $("#assetId").val();
            //console.log(id);

            $.ajax({
                method: 'GET',
                url: $('#baseURL').val() + '/cam/campus/deleteAsset',
                data: 
                {
                    id: id
                },
                dataType: "json",
                success: function(data)
                {
                    setTimeout(function(){
                        $('#deleteAssetCard').html(data.message);
                    },3000);
                    setTimeout(function(){
                        window.location.reload();
                    },3000);
                },
            });
        });
    });

    
    
});

// function resetForm() {
//     document.getElementById("#assetForm").reset();
// }