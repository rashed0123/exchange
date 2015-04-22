<section class="container">
    
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
                    <a href="<?php echo Router::url('/',true);?>exusers/resend_otp">Resend OTP</a> | 
                    <a href="<?php echo Router::url('/',true);?>exusers/logout">Logout</a>
                </div>
                
                <?php echo $this->element('panelFooter')?>
                
            </div>
            
        <?php echo $this->Form->end(); ?>
        
    </section>
    
</section>