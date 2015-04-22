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
        </style>

        <div class="row-fluid">
            <div class="col-md-12">        
                <div class="content">
                    <div class="box col-md-8">

                        <h3>Remitter Information</h3>

                        <!--<form role="form">-->
                        <?php echo $this->Form->create(false, array('action' => 'remittance_info', 'class' => '', 'role' => "form")); ?>
                        <div id="loding" style="display:none;"><img src="../img/loading.gif"></div>
                        <div class="form-group input-group col-md-12">
                            <span class="input-group-addon sadd">Civil ID</span>
                            <input type="text" id="civilid" name="civil_id" class="form-control" placeholder="@CivilID" required="required" autocomplete="off">
                        </div>
                        <div id="ajax_call">
                            <div class="form-group input-group col-md-12">
                                <span class="input-group-addon sadd">Name</span>
                                <input  type="text" name="name" class="form-control" required="required" placeholder="@khan">
                            </div>
                            <div class="form-group input-group col-md-12">
                                <span class="input-group-addon sadd">Mobile No</span>
                                <input type="text" name="mobile_no" class="form-control" required="required" placeholder="@mobile no" onkeyup = "removeChar(this);">
                            </div>
                            <div class="form-group input-group col-md-12">
                                <span class="input-group-addon sadd">Address</span>
                                <input type="text" name="address" class="form-control" required="required" placeholder="@Rt,Saudi Arabia">
                            </div>
                            <div class="col-md-12 success form-actions">                                                            
                                <button type="submit" class="btn btn-primary">Submit</button>                            
                            </div>
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
    $('#civilid').on('blur', function (e) {
        var res = $('#civilid').val();
        $('#loding').css("display", "block");
        $.ajax({
            type: 'POST',
            url: '<?php echo Router::url('/', true); ?>' + 'ajax/ajax_operator',
            data: {civil_id: res},
            cache: false,
            success: function (data) {
//                    $('#SearchTo').hide();
                $('#ajax_call').html(data);
                $('#loding').css("display", "none");
//                    alert(data);
            }
        });
    });

</script>