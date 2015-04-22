<section class="container">
    
    <section class="login-form">
        
        <!--<form method="post" action="" role="login">-->
        <?php
            echo $this->Form->create(false, array('action' => 'login','type' => 'post','role'=>'login')); 
        ?>    
            <div class="panel panel-default">
                
                <div class="panel-body">
                    
                    <h3>Sign in to Remittance</h3>
                    <?php
                    
                    echo $this->Session->flash();
                        
                    
                        
                    ?>
                    <input type="text" name="userid" required placeholder="User ID" class="form-control" autocomplete="off"/>
                   
                    <input type="password" name="ex_password" required placeholder="Password" class="form-control" />
                    
                    <button type="submit" name="sign_in" class="btn btn-block btn-info" value="Sign In">Sign in</button>
                    
                </div>
                
                <?php echo $this->element('panelFooter')?>
                
            </div>
            
        <?php echo $this->Form->end(); ?>
        
    </section>
    
</section>