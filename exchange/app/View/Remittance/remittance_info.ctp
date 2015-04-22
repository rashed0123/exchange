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
            #drate{
                color: red;
            }
            #bdt_drate{
                color: red;
            }
        </style>

        <div class="row-fluid">
            <div class="col-md-12">        
                <div class="content">
                    <div class="box col-md-8">

                        <h3>Remitter Information</h3>

                        <!--<form role="form">-->
                        <?php echo $this->Form->create(false, array('action' => 'beneficiary_info#benificiary', 'class' => '', 'role' => "form")); ?>

                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Civil ID</span>
                            <input type="text" class="form-control" name="civil_id" value="<?php echo $remitter['civil_id']; ?>" placeholder="@CivilID" readonly="readonly">
                        </div>
                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Name</span>
                            <input type="text" class="form-control" name="name" value="<?php echo $remitter['name']; ?>" placeholder="@khan" readonly="readonly">
                        </div>
                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Mobile No</span>
                            <input type="text" class="form-control" name="mobile_no" value="<?php echo $data ['mobile_no']; ?>" placeholder="@mobile no">
                        </div>
                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Address</span>
                            <input type="text" class="form-control" name="address" value="<?php echo $data ['address']; ?>" placeholder="@Rt,Saudi Arabia">
                        </div>

                        <h3>Remittance Information</h3>                        

                        <div class="form-group input-group col-md-12">                            
                            <span class="input-group-addon sadd">Local Currency </span>
                            <input type="text" id="currency" name="currency" class="form-control" value="<?php if(isset($data['currency'])){echo $data['currency'];}?>" placeholder="@local currency">
                            <span class="input-group-addon sadd">Local Dollar Rate</span>
                            <input type="text" id="drate" name="drate" value="<?php if(isset($data['drate'])){echo $data['drate'];}else{echo '3.75';}?>" class="form-control" placeholder="@3.75">                           
                        </div>
                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Dollar</span>
                            <input type="text" id="dollar" name="dollar" class="form-control" value="<?php if(isset($data['dollar'])){echo $data['dollar'];}?>" placeholder="$.dollar" readonly="readonly">
                            <span class="input-group-addon sadd">BDT Dollar Rate </span>
                            <input type="text" id="bdt_drate"name="bdt_drate" class="form-control" value="<?php if(isset($data['bdt_drate'])){echo $data['bdt_drate'];}else{echo '77.50';}?>" placeholder="@77.50">
                        </div>
                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Taka</span>
                            <input type="text" id="taka" name="taka" class="form-control" value="<?php if(isset($data['taka'])){echo $data['taka'];}?>" placeholder="৳.taka" readonly="readonly">                         
                        </div>                        
                        <div class="col-md-12 success form-actions">                                                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <?php echo $this->html->link('Cancel', array('controller' => 'remittance', 'action' => 'remitter'), array('class' => 'btn btn-cancel')); ?>
                        </div>
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
    $('#currency').on('blur', function (e) {
        var res = $('#currency').val();
        var drate = $('#drate').val();
        var bdrate = $('#bdt_drate').val();
//            sadiya riayal 3.75 = 1 us dollar
        if (drate != '') {
            var dollar = parseFloat(res) / parseFloat(drate);
        } else {
            var dollar = parseFloat(res) / parseFloat(3.75);
        }
        $('#dollar').val('$.' + dollar.toFixed(3));
//            1 dollar = 77.45 taka
        if (bdrate != '') {
            var taka = parseFloat(dollar.toFixed(3)) * parseFloat(bdrate);
        } else {
            var taka = parseFloat(dollar.toFixed(3)) * parseFloat(77.45);
        }
        $('#taka').val('৳.' + taka.toFixed(3));
//            alert(dollar);
    });
    $('#drate').on('blur', function (e) {
        var currency = $('#currency').val();
        var drate = $('#drate').val();
        var bdrate = $('#bdt_drate').val();
//            sadiya riayal 3.75 = 1 us dollar
        var dollar = parseFloat(currency) / parseFloat(drate);
        $('#dollar').val('$.' + dollar.toFixed(3));
//            1 dollar = 77.45 taka
        if (bdrate != '') {
            var taka = parseFloat(dollar.toFixed(3)) * parseFloat(bdrate);
        } else {
            var taka = parseFloat(dollar.toFixed(3)) * parseFloat(77.45);
        }
        $('#taka').val('৳.' + taka.toFixed(3));
//            alert(dollar);
    });
    $('#bdt_drate').on('blur', function (e) {
        var dollars = $('#dollar').val();
        var dollar = dollars.substr(2);
        var drate = $('#bdt_drate').val();
//            sadiya riayal 3.75 = 1 us dollar            
        var taka = parseFloat(dollar) * parseFloat(drate);
        $('#taka').val('৳.' + taka.toFixed(3));
//            alert(dollar);
    });
</script>