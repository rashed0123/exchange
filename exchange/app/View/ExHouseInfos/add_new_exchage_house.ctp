<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        
    <div class="col-lg-12">
<!--                <h1 class="page-header">
            Exchange House <small>Information</small>
        </h1>-->
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> New Exchange House
            </li>
        </ol>
    </div>
       <!-- <div class="col-lg-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Register New Exchange House</h3>
                </div>
                <div class="panel-body">
            <form role="form">

                <div class="form-group has-success">
                    <label class="control-label" for="inputSuccess">Input with success</label>
                    <input type="text" class="form-control" id="inputSuccess">
                </div>

                <div class="form-group has-warning">
                    <label class="control-label" for="inputWarning">Input with warning</label>
                    <input type="text" class="form-control" id="inputWarning">
                </div>

                <div class="form-group has-error">
                    <label class="control-label" for="inputError">Input with error</label>
                    <input type="text" class="form-control" id="inputError">
                </div>

            </form>
                </div>
            </div>
        </div>-->
        
        <div class="col-lg-6">
            <div class="panel panel-success">
                <div class="panel-heading" style="color: #fff;background-color: #428bca;border-color: #357ebd;">
                    <h3 class="panel-title">Register New Exchange House</h3>
                </div>
                <div class="panel-body">
                   
            <?php
                echo $this->Session->Flash();
                echo $this->Form->create(false, array('action' => 'add_new_exchage_house','type' => 'post','role'=>'form')); 
            ?>  
                <div class="form-group input-group col-md-12">
                    <label class="input-group-addon sadd" style="width: 183px; text-align: left;">Exchange House Name <span class="required" style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="exchange[ex_house_name]" required="1" placeholder="Exchange House Name">
                </div>

                 <div class="form-group input-group col-md-12">
                    <label class="input-group-addon sadd" style="width: 183px; text-align: left;">User ID <span class="required" style="color: red;">*</span></label>
                    <input type="text" class="form-control" name="exchange[ex_user_id]" required="1" placeholder="User ID">
                </div>
                
                 <div class="form-group input-group col-md-12">
                    <label class="input-group-addon sadd" style="width: 183px; text-align: left;">Contact No <span class="required" style="color: red;">*</span></label>
                    <input type="text" class="form-control"  name="exchange[contact_no]" required="1" placeholder="Contact Number">
                </div>
                
                 <div class="form-group input-group col-md-12">
                    <label class="input-group-addon sadd" style="width: 183px;text-align: left;">Email Address <span class="required" style="color: red;">*</span></label>
                    <input type="email" class="form-control" name="exchange[email_address]" required="1" placeholder="Email Address">
                </div>
                
                 <div class="form-group input-group col-md-12">
                    <label class="input-group-addon sadd" style="width: 183px; text-align: left;">Exchange Address <span class="required" style="color: red;">*</span></label>
                    <textarea class="form-control" rows="3" style="resize:none;" name="exchange[address]" placeholder="Exchange House Address" required="1"></textarea>
                </div>

                 <div class="form-group input-group col-md-12">
                    <label class="input-group-addon sadd" style="width: 183px; text-align: left;">Website </label>
                    <input type="text" class="form-control" name="exchange[website]" placeholder="Enter Website Address">
                </div>
                
                    <div style="text-align: right;">
                        <input type="reset" name="reset" value="Reset" class="btn btn-info" style="background-color: #d9534f;border-color: #d43f3a; "/>    
                        <input type="submit" name="exchange[submit]" value="Submit" class="btn btn-info" style="background-color: #428bca;border-color: #357ebd; "/>
                </div>
                    
                    <br/><br/>
                <span class="required" style="color: red;">* Fields are required.</span>

           <?php echo $this->Form->end();?>
                </div>
            </div>
        </div>
    </div>
</div>