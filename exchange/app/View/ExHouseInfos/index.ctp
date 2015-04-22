<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        
    <div class="col-lg-12">
<!--                <h1 class="page-header">
            Exchange House <small>Information</small>
        </h1>-->
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Exchange House
            </li>
        </ol>
    </div>
        
        
        
        
        <div class="col-lg-12">
            <div>
                <a href="<?php echo Router::url('/',true);?>exhouseinfos/add_new_exchage_house"><button type="button" class="btn btn-primary">Add New Exchange House</button></a>
            </div>
        <br/>
        <?php echo $this->Session->flash();?>
            <div class="panel panel-success">
                <div class="panel-heading" style="color: #fff;background-color: #428bca;border-color: #357ebd;">
                    <h3 class="panel-title" >Exchange House List</h3>
                </div>
                <div class="panel-body">
                    
                    <div class="row">
                    <div class="col-lg-12">
<!--                        <h2>Contextual Classes</h2>-->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th width="6%">SL No.</th>
                                        <th>Ex. House Name</th>
                                        <th>Contact No</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(!empty($houseInfo)):
                                            $i = 1;
                                            foreach($houseInfo as $houseinfos):
                                    ?>
                                        <tr class="active">
                                           <td><?php echo $i;?></td>
                                           <td><?php echo $houseinfos['ex_house_infos']['ex_house_name'];?></td>
                                           <td><?php echo $houseinfos['ex_house_infos']['contact_no'];?></td>
                                           <td><?php echo $houseinfos['ex_house_infos']['email_id'];?></td>
                                           <td><?php echo $houseinfos['ex_house_infos']['contact_no'];?></td>
                                           <td>
                                               <button type="button" class="btn btn-xs btn-default"><a href="<?php echo Router::url('/',TRUE);?>exhouseinfos/update_houseinfo/<?php echo base64_encode($houseinfos['ex_house_infos']['ex_house_id']);?>">Edit</a></button>
                                               <button type="button" class="btn btn-xs btn-default"><a href="<?php echo Router::url('/',TRUE);?>exhouseinfos/delete_houseinfo/<?php echo $houseinfos['ex_house_infos']['ex_house_id'];?>">Delete</a></button>
                                               
                                           </td>
                                       </tr>
                                    <?php
                                        $i++;
                                            endforeach;
                                        endif;
                                            
                                    ?>
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                    
                </div>
            </div>

        </div>
    </div>
</div>