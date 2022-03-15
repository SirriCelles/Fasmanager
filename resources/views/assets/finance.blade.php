<div class="container-fluid">
    <form class="form-group" style="padding: 0;" id="financeEform">
            {{csrf_field()}}
        <div class="row">
            <div class="col-sm-8">                                                                                                                                                                                                                       
                <div class="form-group">
                    <label for="" class="col-sm-4">Vendor:</label>
                    <input type="text" class="form-control-sm" name="Vendor" id="eVendor">                                    
                </div>                                                                                                           
                <div class="input-group mb-2">
                    <label for="" class="col-sm-4">Purchased Date:</label>                    
                    <div class="input-group-append date form_date">
                        <input type="text" class="form-control-sm" name="purchased_date" id="purchased_date" readonly>
                        <span class="add-on bg-info">
                            <i class="material-icons" style="font-size:20px">date_range</i>
                        </span>
                    </div>                                    
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4">Purchased Price:</label>
                    <input type="number" class="form-control-sm" name="purchased_price" id="purchased_price">                                    
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4">Current Value:</label>
                    <input type="number" class="form-control-sm" name="current_value" id="current_value">                                    
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-4">Scrap Value:</label>
                    <input type="number" class="form-control-sm" name="ScrapValue" id="eScrapValue">                                    
                </div>
                <div class="input-group">
                    <label for="" class="col-sm-4">In Use From:</label>                    
                    <div class="input-group-append date form_date">
                        <input type="text" class="form-control-sm" name="in_use_from" id="in_use_from" readonly>
                        <button class="btn btn-info" type="button" style="padding: 3px;" id="eUseFromDateBtn">
                            <i class="material-icons" style="font-size:20px">date_range</i>
                        </button>
                    </div>                                    
                </div>
                <div class="input-group mt-3">
                    <label for="" class="col-sm-4">Expires In:</label>                    
                    <div class="input-group-append date form_date">
                        <input type="text" class="form-control-sm" name="exDate" id="exDate" readonly>
                        <button class="btn btn-info" type="button" style="padding: 3px;" id="exDateBtn">
                            <i class="material-icons" style="font-size:20px; padding:1px;">date_range</i>
                        </button>
                    </div>                                   
                </div>                                                                                        
            </div>            
        </div>
    </form>                                            
</div>