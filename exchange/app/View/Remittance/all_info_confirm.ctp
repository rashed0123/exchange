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
        </style>

        <div class="row-fluid">
            <div class="col-md-12">        
                <div class="content">
                    <div class="box col-md-8">

                        <h3>Remitter Information</h3>

                        <!--<form role="form">-->
                        <?php echo $this->Form->create(false, array('action' => 'confirm_payment', 'class' => '', 'role' => "form")); ?>

                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Civil ID</span>
                            <input type="text" name="civil_id"value="<?php echo $data['civil_id']; ?>" class="form-control" placeholder="@CivilID" readonly="readonly">
                        </div>
                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Name</span>
                            <input type="text" name="name"value="<?php echo $data['name']; ?>"class="form-control" placeholder="@khan"readonly="readonly">
                        </div>
                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Mobile No</span>
                            <input type="text"name="mobile_no"value="<?php echo $data['mobile_no']; ?>" class="form-control" placeholder="@mobile no"readonly="readonly">
                        </div>
                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Address</span>
                            <input type="text"name="address"value="<?php echo $data['address']; ?>" class="form-control" placeholder="@Rt,Saudi Arabia"readonly="readonly">
                        </div>

                        <h3>Remittance Information</h3>                        

                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Local Currency</span>
                            <input type="text"name="currency"value="<?php echo $data['currency']; ?>" class="form-control" placeholder="@local currency amount"readonly="readonly">
                        </div>
                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Dollar</span>
                            <input type="text"name="dollar"value="<?php echo $data['dollar']; ?>" class="form-control" placeholder="$.dolar"readonly="readonly">
                        </div>
                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Taka</span>
                            <input type="text"name="taka"value="<?php echo $data['taka']; ?>" class="form-control" placeholder="৳.taka"readonly="readonly">
                            <input type="hidden"name="drate"value="<?php echo $data['drate']; ?>">
                            <input type="hidden"name="bdt_drate"value="<?php echo $data['bdt_drate']; ?>">
                        </div>
                        <a name='benificiary'></a>
                        <h3>Beneficiary Information</h3> 
                        <div id="loding_modal" style="display:none;"><img src="../img/loading.gif"></div>
                        <div id="loding_msg" style="display:none; color: red"><p><b>Sorry Something is wrong!! Your Process not successful!!</b></p></div>
                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">A/C Type</span>
                            <input type="text" class="form-control" id="ac_type" name="ac_type" value="<?php $ac_type = $data['ac_type']; echo 'Mobile Banking Service';?>" readonly="readonly" >                            
                        </div> 
                        
                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Service Name</span>
                            <?php if($data['mb_service'] == 1){
                                $service_name = 'HelloCash';
                                }
                                elseif($data['mb_service'] == 2){
                                    $service_name = 'UCash';
                                }
                            ?>
                            <input type="text" class="form-control" id="mb_service" name="mb_service"value="<?php echo $service_name;?>" readonly="readonly" >                            
                        </div> 
                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Mobile No</span>
                            <input type="text" class="form-control" id="mb_account"  name="mb_account" value="<?php echo $data['mb_account'];?>" readonly="readonly">                            
                        </div>                        
                        <div class="form-group input-group col-md-12" id="cd_name">
                            <span class="input-group-addon sadd">Customer Name</span>
                            <?php if(!empty($data['cs_name'])){
                                $customer_name =$data['cs_name'];
                                }
                                else{
                                    $customer_name ='New Customer';
                                }
                            ?>
                            <input type="text" id="cs_name" name="cs_name" class="form-control" value="<?php echo $customer_name;?>" readonly="readonly">                            
                        </div>
                        <div class="col-md-12 success form-actions">                                                            
                            <input type="button" id="submit" class="btn btn-primary" value="Confirm" onclick="confirm_payment(this)">
                            <?php echo $this->html->link('Cancel', array('controller' => '', 'action' => ''), array('class' => 'btn btn-cancel')); ?>
                        </div>
                        <input id="sus_msg" type="hidden" name="response" value="">
                        <input id="submitForm" type="submit" value="Submit" style="display:none;">
                        
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
</div>
<script>
    $(document).ready(function () {
        
    });
    function confirm_payment() {
        var ac_type = '<?php echo $data['mb_service']; ?>';
        var mobile_no = "<?php echo $data['mb_account'];?>";
        var amount = "<?php echo $data['taka']; ?>"; 
        
        $('#loding_modal').css("display", "block");
        $.ajax({
            type: 'POST',
            url: '<?php echo Router::url('/', true); ?>' + 'ajax/confirm_payment',
            data: {ac_type: ac_type, mobile_no: mobile_no, amount: amount},
            cache: false,
            success: function (data) {
                var obj = $.parseJSON(data);
                $.each(obj, function () {
                    var flag = this['flag'];
                    var msg = this['msg'];
                    
                    if(flag=='1'){
//                        alert(msg);
                        $('#sus_msg').val(msg);
                        $('#submitForm').click();                        
                    }else{
//                        alert(flag+' '+msg);
                        $('#loding_msg').css("display", "block");
                    }
                });
//alert(data);
                $('#loding_modal').css("display", "none");
            }
        });
    }
</script>

