<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        
    <div class="col-lg-12">
<!--                <h1 class="page-header">
            Exchange House <small>Information</small>
        </h1>-->
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Change Password
            </li>
        </ol>
    </div>
      
        
        <div class="col-lg-4">
            <div class="panel panel-success">
                <div class="panel-heading" style="color: #fff;background-color: #428bca;border-color: #357ebd;">
                    <h3 class="panel-title">Password change form</h3>
                </div>
                <div class="panel-body">
                    
            <?php
                echo $this->Session->Flash();
                echo $this->Form->create(false, array('action' => 'changepassword','type' => 'post','role'=>'form')); 
            ?>  
                <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess">Current password <span class="required" style="color: red;">*</span></label>
                    <input type="password" class="form-control" id="inputSuccess" name="change[current_password]" required="1" placeholder="Current Password">
                </div>

                <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess">New password <span class="required" style="color: red;">* (minimum 8 digits)</span></label>
                    <input type="password" class="form-control" id="inputSuccess" name="change[new_password]" required="1" placeholder="New Password">
                </div>
                
                <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess">Confirm new password <span class="required" style="color: red;">*</span></label>
                    <input type="password" class="form-control" id="inputSuccess" name="change[confirm_password]" required="1" placeholder="Confirm New Password">
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