<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        
    <div class="col-lg-12">
<!--                <h1 class="page-header">
            Exchange House <small>Information</small>
        </h1>-->
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Exchange House Information
            </li>
        </ol>
    </div>
       
        
        <div class="col-lg-6">
            <div class="panel panel-success">
                <div class="panel-heading" style="color: #fff;background-color: #428bca;border-color: #357ebd;">
                    <h3 class="panel-title">Update Exchange House Information</h3>
                </div>
                <div class="panel-body">
                    
            <?php
                echo $this->Session->Flash();
                echo $this->Form->create(false, array('action' => 'update_houseinfo','type' => 'post','role'=>'form')); 
            ?>  
                 <div class="form-group input-group col-md-12">
                    <label class="input-group-addon sadd" style="width: 183px; text-align: left;">Exchange House Name <span class="required" style="color: red;">*</span></label>
                    <input type="text" class="form-control"  name="exchange[ex_house_name]" required="1" placeholder="Exchange House Name" value="<?php echo $information[0]['ex_house_infos']['ex_house_name'];?>">
                </div>
                    <input type="hidden" name="exchange[ex_house_id]" value="<?php echo $information[0]['ex_house_infos']['ex_house_id'];?>">
                 <div class="form-group input-group col-md-12">
                    <label class="input-group-addon sadd" style="width: 183px; text-align: left;">User ID <span class="required" style="color: red;">(Not Editable)</span></label>
                    <input type="text" class="form-control"  style="background-color: #fff;" name="exchange[ex_user_id]" required="1" placeholder="User ID" value="<?php echo $information[0]['ex_users']['ex_user_id'];?>" readonly>
                </div>
                
                <div class="form-group input-group col-md-12">
                    <label class="input-group-addon sadd" style="width: 183px; text-align: left;">Contact No <span class="required" style="color: red;">*</span></label>
                    <input type="text" class="form-control" id="inputSuccess" name="exchange[contact_no]" required="1" placeholder="Contact Number" value="<?php echo $information[0]['ex_house_infos']['contact_no'];?>">
                </div>
                
                 <div class="form-group input-group col-md-12">
                    <label class="input-group-addon sadd" style="width: 183px; text-align: left;">Email Address <span class="required" style="color: red;">*</span></label>
                    <input type="email" class="form-control" id="inputSuccess" name="exchange[email_address]" required="1" placeholder="Email Address" value="<?php echo $information[0]['ex_house_infos']['email_id'];?>">
                </div>
                
                <div class="form-group input-group col-md-12">
                    <label class="input-group-addon sadd" style="width: 183px; text-align: left;">Exchange Address <span class="required" style="color: red;">*</span></label>
                    <textarea class="form-control" rows="3" style="resize:none;" name="exchange[address]" placeholder="Exchange House Address" required="1"><?php echo $information[0]['ex_house_infos']['ex_address'];?></textarea>
                </div>

                 <div class="form-group input-group col-md-12">
                    <label class="input-group-addon sadd" style="width: 183px; text-align: left;">Website </label>
                    <input type="text" class="form-control" id="inputSuccess" name="exchange[website]" placeholder="Enter Website Address" value="<?php echo $information[0]['ex_house_infos']['website'];?>">
                </div>
                
                    <div style="text-align: right;">
                        <input type="reset" name="reset" value="Reset" class="btn btn-info" style="background-color: #d9534f;border-color: #d43f3a; "/>    
                        <input type="submit" name="exchange[submit]" value="Update" class="btn btn-info" style="background-color: #428bca;border-color: #357ebd; "/>
                </div>
                    
                    <br/><br/>
                <span class="required" style="color: red;">* Fields are required.</span>

           <?php echo $this->Form->end();?>
                </div>
            </div>
        </div>
    </div>
</div>