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
                        <?php echo $this->Form->create(false, array('action' => 'all_info_confirm', 'class' => '', 'role' => "form")); ?>

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
                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">A/C Type</span>
                            <?php
                            $status = array(/* 'bank_ac' => 'Bank Account', */'m_banking' => 'Mobile Banking Service');
//                            echo $this->Form->input('to', array('options' => array(), 'empty' => '-- To --', 'div' => false, 'label' => false, "required" => "required"));
                            echo $this->Form->input('ac_type', array('label' => false, 'type' => 'select', 'options' => $status, 'empty' => 'Select A/C Type', 'default' => 'Choose one', 'class' => "form-control"));
                            ?>  
                            <!--<input type="text" class="form-control" placeholder="@account type">-->
                        </div>

                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Service Name</span>
                            <?php
                            $service = array(1 => 'HelloCash', 2 => 'Ucash ');
//                            echo $this->Form->input('to', array('options' => array(), 'empty' => '-- To --', 'div' => false, 'label' => false, "required" => "required"));
                            echo $this->Form->input('mb_service', array('label' => false, 'type' => 'select', 'options' => $service, 'empty' => 'Select Service', 'default' => 'Choose one', 'class' => "form-control"));
                            ?>  
                            <!--<input type="text" class="form-control" placeholder="@account type">-->
                        </div>
                        <div id="loding" style="display:none;"><img src="../img/loading.gif"></div>
                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Mobile No</span>
                            <input type="text" class="form-control" id="mb_account" onblur="checkFunction()" name="mb_account" placeholder="@mobile no"onkeyup = "removeChar(this);" maxlength="15">
                            <span class="input-group-addon sadd" id="check" onclick="checkFunction()" style="background-color:#204d74;"><a>Check</a></span>
                        </div>                        
                        <div class="form-group input-group col-md-12" id="cd_name" style="display:none;" >
                            <span class="input-group-addon sadd">Customer Name</span>
                            <input type="text" id="cs_name" name="cs_name" class="form-control" value="" placeholder="@name">
                            <span class="input-group-addon sadd" id="r_1" style="display:none">Register</span>
                            <span class="input-group-addon sadd" id="r_2"style="display:none;color: red;">Block</span>
                            <span class="input-group-addon sadd" id="r_0" style="display:none; color: rosybrown;">Not Register</span>
                            <span class="input-group-addon sadd" id="r_00" style="display:none;background-color:#204d74;" data-toggle="modal" data-target="#myModal"><a>Register Now</a></span>
                        </div>
                        <!--
                                                <div class="form-group input-group col-md-12">
                                                    <span class="input-group-addon sadd">A/C No</span>
                                                    <input type="text" class="form-control" placeholder="@account number">
                                                </div> -->

                        <div class="col-md-12 success form-actions">                                                            
                            <button type="submit" id="submit" class="btn btn-primary">Confirm</button>
                            <?php echo $this->html->link('Back', array('controller' => 'remittance', 'action' => 'remittance_info'), array('class' => 'btn btn-cancel')); ?>
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php // echo $this->Form->create(false, array('action' => '', 'class' => '', 'role' => "form")); ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel"><b>Register New User</b></h3>
            </div>
            <div class="modal-body">
                <div id="loding_modal" style="display:none;"><img src="../img/loading.gif"></div>
                <p><b>Please insert all data carefully:</b></p>
                <div id="error_msg" style="color:red;font-weight: bold"></div>
                <div class="form-group input-group col-md-12">
                    <span class="input-group-addon sadd">Service Name</span>
                    <input type="text" id="srvc_name" name="srvc_name" value="" class="form-control" placeholder="Service Name" readonly="readonly">
                    <input type="hide" id="srvc_name_code"value="" style="display:none;">
                </div>
                <div class="form-group input-group col-md-12">
                    <span class="input-group-addon sadd">Mobile No</span>
                    <input type="text" id="nw_mobile_no" name="nw_mobile_no"value="" class="form-control" placeholder="@mobile no" readonly="readonly">
                </div>
                <div class="form-group input-group col-md-12">
                    <span class="input-group-addon sadd">ID Type</span>
                    <?php
                    $id_type = array(1 => 'National ID', 2 => 'Passport ID', '3' => 'Driving License', '4' => 'Citizen Certificate');
                    echo $this->Form->input('id_type', array('label' => false, 'type' => 'select', 'options' => $id_type,  'default' => 'Choose one', 'class' => "form-control"));
                    ?>  
                    <!--<input type="text" class="form-control" placeholder="@account type">-->
                </div>
                <div id="national_id"class="form-group input-group col-md-12" style="">
                    <span class="input-group-addon sadd">National ID</span>
                    <input type="text" id="nid" name="nid" value="" class="form-control" placeholder="@NationalID" maxlength="18">
                </div>
                <div id="passport_id"class="form-group input-group col-md-12"style="display:none">
                    <span class="input-group-addon sadd">Passport ID</span>
                    <input type="text" id="passport" name="passport" value="" class="form-control" placeholder="@PassportID">
                </div>
                <div id="driving_lid"class="form-group input-group col-md-12"style="display:none">
                    <span class="input-group-addon sadd">Driving License</span>
                    <input type="text" id="drv_id" name="drv_lid"value="" class="form-control" placeholder="@Driving Licences ID">
                </div>
                <div id="cc_ertificate"class="form-group input-group col-md-12"style="display:none">
                    <span class="input-group-addon sadd">Citizen Certificate</span>
                    <input type="text" id="ciz_id" name="ciz_id"value="" class="form-control" placeholder="@Citizen Certificate">
                </div>
                <!--
                <div class="form-group input-group col-md-12">
                    <span class="input-group-addon sadd">Civil ID</span>
                    <input type="text" name="civil_id"value="<?php // echo $data['civil_id'];         ?>" class="form-control" placeholder="@CivilID">
                </div>-->                           
            </div>
            <div class="modal-footer">
                <button id='modal_submit' onclick="msubmitFunction()"  class="btn btn-primary" style="margin-bottom: 0px;">Confirm</button> 
                <button id="modal_close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            <!--</form>-->
        </div>
    </div>
</div>
<script>
  //  alert('dfaf');
    $(document).ready(function () {
        
        
        
    });
    $('#submit').attr('disabled', 'disabled');

        $("#id_type").change(function () {
            var str = "";
            $("#id_type option:selected").each(function () {
                str += $(this).val() + " ";
            });
            if ($.trim(str) == '1') {
                $('#national_id').css("display", "table");
                $('#passport_id').css("display", "none");
                $('#driving_lid').css("display", "none");
                $('#cc_ertificate').css("display", "none");
            }
            else if ($.trim(str) == '2') {
                $('#passport_id').css("display", "table");
                $('#national_id').css("display", "none");
                $('#driving_lid').css("display", "none");
                $('#cc_ertificate').css("display", "none");
            }
            else if ($.trim(str) == '3') {
                $('#driving_lid').css("display", "table");
                $('#national_id').css("display", "none");
                $('#passport_id').css("display", "none");
                $('#cc_ertificate').css("display", "none");
            }
            else if ($.trim(str) == '4') {
                $('#cc_ertificate').css("display", "table");
                $('#national_id').css("display", "none");
                $('#driving_lid').css("display", "none");
                $('#passport_id').css("display", "none");
            }
        });
    $("#r_00").click(function () {
            var mb_no = $('#mb_account').val();
            var mb_service = $('#mb_service').val();
//            alert(mb_no);
//            return false;
            if(mb_service==1){
                var mb_srvc= 'HelloCash';
            } else if(mb_service == 2){
                var mb_srvc= 'UCash';
            }
            
            $('#nw_mobile_no').val(mb_no);
            $('#srvc_name').val(mb_srvc);
            $('#srvc_name_code').val(mb_service);
        });
    function removeChar(item) {
        var val = item.value;
//        alert(val);
        val = val.replace(/[^0-9]/g, "");
        if (val == ' ') {
            val = ''
        }
        ;
        item.value = val;
    }
    function checkFunction() {
//        if (typeof (form) === 'undefined')
//            form = 'beneficiary_infoForm';
//        $.jCryption.getKeys("<?php // echo Router::url('/', true);             ?>main.php?validation=call", function (keys) {
//            $.jCryption.encrypt($('#' + form).serialize(), keys, function (encrypted) {
//                var dataStr = 'HMWCall=' + encrypted;
//                    var dataStr = $('#' + form).serialize();
        var mb_account = $('#mb_account').val();
        var mb_service = $('#mb_service').val();
        if (mb_service != '') {
            if (mb_account != '') {
                $('#loding').css("display", "block");
//                 alert(mb_account);
//                 return false;
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Router::url('/', true); ?>' + 'ajax/is_register',
                    data: {account_no: mb_account, account_type: mb_service},
                    cache: false,
                    success: function (data) {
                       // alert(data);
                        var obj = $.parseJSON(data);
                        $.each(obj, function () {
                            $("#cs_name").val(this['msg']);
                            var obj = this['flag'];
//                    $("#cs_name").html(this['flag']);
                            //$("#btn_save").prop('disabled', false);
//                            alert(obj);
                            if (obj == '1') {
                                $('#r_1').css("display", "table-cell");
                                $('#submit').removeAttr('disabled');
                                $('#r_2').css("display", "none");
                                $('#r_0').css("display", "none");
                                $('#r_00').css("display", "none");
                            } else if (obj == '2') {
                                $('#r_1').css("display", "none");
                                $('#r_2').css("display", "table-cell");
                                $('#submit').attr('disabled', 'disabled');
                                $('#r_0').css("display", "none");
                                $('#r_00').css("display", "none");
                            } else {
                                $('#r_1').css("display", "none");
                                $('#r_2').css("display", "none");
                                $('#r_0').css("display", "table-cell");
                                $('#submit').attr('disabled', 'disabled');
                                $('#r_00').css("display", "table-cell");
                            }
                        });
//                    $('#SearchTo').hide();
//                        $('#cs_name').html(data);
                        $('#cd_name').css("display", "table");
                        $('#loding').css("display", "none");
//                        alert(data);
                    }
                });
            } else {
                alert('Please Enter Mobile Number!');
            }
        } else {
            alert('Please Enter Service Name First!');
        }
//            });
//        });

    }
    function msubmitFunction() {
        var srvc_name = $('#srvc_name_code').val();
        var nw_mobile_no = $('#nw_mobile_no').val();
        var id_type = $('#id_type').val();
        if (id_type == '1') {
            var value = $('#nid').val();
        } else if (id_type == '2') {
            var value = $('#passport').val();
        } else if (id_type == '3') {
            var value = $('#drv_id').val();
        } else if (id_type == '4') {
            var value = $('#ciz_id').val();
        }        
        if (srvc_name != '') {
            if (nw_mobile_no != '') {
                if (value != '') {
                    $('#loding_modal').css("display", "block");
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo Router::url('/', true); ?>' + 'ajax/new_register',
                        data: {srvc_name: srvc_name, mobile_no: nw_mobile_no, type: id_type, value: value},
                        cache: false,
                        success: function (data) {
                            var obj = $.parseJSON(data);
                            $.each(obj, function () {
                                var flag = this['flag'];
                                var msg = this['msg'];
                                if(flag == 0){                                    
                                    $('#error_msg').html(msg);
//                                    alert(msg);
                                }else{
                                    $('#modal_close').click();
                                    checkFunction();
                                }
                            });
                            $('#loding_modal').css("display", "none");
                        }
                    });
                } else {
                    alert('Please Enter Your ID!');
                }
            } else {
                alert('Mobile no not be empty!!');
            }
        } else {
            alert('Service name is Empty!!');
        }

    }
</script>