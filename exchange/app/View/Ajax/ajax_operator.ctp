
<?php if (!empty($remitter)) { ?>    
    <div class="form-group input-group col-md-12">
        <span class="input-group-addon sadd">Name</span>
        <input  type="text" name="name" value="<?php echo $remitter['TmpRemitterInfo']['name']; ?>" class="form-control" placeholder="@khan">
    </div>
    <div class="form-group input-group col-md-12">
        <span class="input-group-addon sadd">Mobile No</span>
        <input type="text"value="<?php echo $remitter['TmpRemitterInfo']['mobile_no']; ?>" name="mobile_no" class="form-control" placeholder="@mobile no" onkeyup = "removeChar(this);">
    </div>
    <div class="form-group input-group col-md-12">
        <span class="input-group-addon sadd">Address</span>
        <input type="text" value="<?php echo $remitter['TmpRemitterInfo']['address']; ?>" name="address" class="form-control" placeholder="@Rt,Saudi Arabia">
    </div>
    <div class="col-md-12 success form-actions">                                                            
        <button type="submit" class="btn btn-primary">Submit</button>                            
    </div>
<?php } else { ?>    
    <div class="form-group input-group col-md-12">
        <span class="input-group-addon sadd">Name</span>
        <input  type="text" name="name" class="form-control" placeholder="@khan">
    </div>
    <div class="form-group input-group col-md-12">
        <span class="input-group-addon sadd">Mobile No</span>
        <input type="text" name="mobile_no" class="form-control" placeholder="@mobile no" onkeyup = "removeChar(this);">
    </div>
    <div class="form-group input-group col-md-12">
        <span class="input-group-addon sadd">Address</span>
        <input type="text" name="address" class="form-control" placeholder="@Rt,Saudi Arabia">
    </div>
    <div class="col-md-12 success form-actions">                                                            
        <button type="submit" class="btn btn-primary">Submit</button>                            
    </div>
<?php } ?>
                        