<section class="login-form">
        
    <!--<form method="post" action="" role="login">-->
    <?php
        echo $this->Form->create(false, array('action' => 'index','type' => 'post','role'=>'login')); 
    ?>    
        <div class="panel panel-default">

            <div class="panel-body">

                <p>Enter OTP </p>
                <?php echo $this->Session->flash(); ?>
                <input type="text" name="ExUsers[otp_code]" required placeholder="OTP Code" class="form-control" autocomplete="off"/>

                <button type="submit" name="ExUsers[submit]" class="btn btn-block btn-info" value="Submit">Submit</button>
                
            </div>
            <div class="panel-footer" style="padding: 0px 25px 0px 33px;font-size: 12px; text-align: center;">
                    <a href="<?php echo Router::url('/',true);?>exusers/resend_otp">Resend OTP</a> | 
                <a href="<?php echo Router::url('/',true);?>exusers/logout">Logout</a>
                

            </div>
           

        </div>

    <?php echo $this->Form->end(); ?>
        
</section>