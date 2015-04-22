<?php // pr($data);  ?>
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <!--<h1 class="page-header">-->
                    <!--Remitter <small></small>-->
                <!--</h1>-->
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Remitter
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <style>
            .box{
                text-align: center;
                border: 1px solid gray;
                border-radius: 7px;               
            }
            .sadd{
                width: 20%;
            }
            .btn{
                margin-bottom: 10px;
                width: 30%;
            }
            .btn-cancel{
                background: #204d74;
                color: #fff;
            }
            .btn-cancel:hover{
                color: #fff;
                background: #204d94;
            }
            #check a{
                cursor: pointer;
                text-decoration: none;
                color: #fff;
            }
            #check a:hover{
                color: rosybrown;
                text-decoration: none;
            }            
            #r_00 a{
                cursor: pointer;
                text-decoration: none;
                color: #fff;
            }
            #r_00 a:hover{
                cursor: pointer;
                text-decoration: none;
                color: rosybrown;
            }
            .sp_right{
                text-align: right;
            }
            .sp_left{
                text-align: left;
            }
        </style>

        <div class="row-fluid">
            <div class="col-md-12">        
                <div class="content">
                    <div class="box col-md-8">
                        <div id="print_page">
                            <h3>Remitter Information</h3>
                            <div class="form-group input-group col-md-12">
                                <span class="col-md-6 sp_right">Civil ID</span>
                                <span class="col-md-6 sp_left"><?php echo $data['civil_id']; ?></span>
                            </div>
                            <div class="form-group input-group col-md-12">
                                <span class="col-md-6 sp_right">Name</span>
                                <span class="col-md-6 sp_left"><?php echo $data['name']; ?></span>
                            </div>
                            <div class="form-group input-group col-md-12">
                                <span class="col-md-6 sp_right">Mobile No</span>
                                <span class="col-md-6 sp_left"><?php echo $data['mobile_no']; ?></span>
                            </div>
                            <div class="form-group input-group col-md-12">
                                <span class="col-md-6 sp_right">Address</span>
                                <span class="col-md-6 sp_left"><?php echo $data['address']; ?></span>
                            </div>   


                            <h3>Remittance Information</h3>  

                            <div class="form-group input-group col-md-12">
                                <span class="col-md-6 sp_right">Local Currency</span>
                                <span class="col-md-6 sp_left"><?php echo $data['currency']; ?></span>
                            </div>
                            <div class="form-group input-group col-md-12">
                                <span class="col-md-6 sp_right">Dollar</span>
                                <span class="col-md-6 sp_left"><?php echo $data['dollar']; ?></span>
                            </div>
                            <div class="form-group input-group col-md-12">
                                <span class="col-md-6 sp_right">Taka</span>
                                <span class="col-md-6 sp_left"><?php echo $data['taka']; ?></span>
                            </div>

                            <h3>Beneficiary Information</h3> 
                            <div class="form-group input-group col-md-12">
                                <span class="col-md-6 sp_right">A/C Type</span>
                                <span class="col-md-6 sp_left"><?php echo $data['ac_type']; ?></span>                          
                            </div> 

                            <div class="form-group input-group col-md-12">
                                <span class="col-md-6 sp_right">Service Name</span>
                                <span class="col-md-6 sp_left"><?php echo $data['mb_service']; ?></span>                          
                            </div> 
                            <div class="form-group input-group col-md-12">
                                <span class="col-md-6 sp_right">Mobile No</span>
                                <span class="col-md-6 sp_left"><?php echo $data['mb_account']; ?></span>                        
                            </div>                        
                            <div class="form-group input-group col-md-12" id="cd_name">
                                <span class="col-md-6 sp_right">Customer Name</span>
                                <span class="col-md-6 sp_left"><?php echo $data['cs_name']; ?></span>                        
                            </div>
                            <div class="form-group input-group col-md-12" id="cd_name">
                                <span class="col-md-6 sp_right">Transaction No</span>
                                <span class="col-md-6 sp_left"><?php echo $tr_id; ?></span>                        
                            </div>
                        </div>
                        <div class="col-md-12 success form-actions">                                                            
                            <input type="button" id="submit" class="btn btn-primary" value="Print" onclick="confirm_print(this)">
                            <?php echo $this->html->link('Again', array('controller' => 'remittance', 'action' => 'remitter'), array('class' => 'btn btn-cancel')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
</div>
<iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
<script>
    $(document).ready(function () {

    });
    function confirm_print() {
        var html = $('#print_page').html();
        window.frames["print_frame"].document.body.innerHTML = html;
        window.frames["print_frame"].window.focus();
        window.frames["print_frame"].window.print();
    }
</script>

