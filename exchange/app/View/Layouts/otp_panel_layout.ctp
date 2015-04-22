<?php echo $this->element('htmlHead'); ?>
<style type="text/css">
    .error{
        background-color: #f2dede;
        color: #b92c28;
       
        height: 30px;
    }
    .error strong{
        margin-left: 12px;
    }
    .success{
        background-color: #c1e2b3;
        color: #0a0;
       
        height: 30px;
    }
    .success strong{
        margin-left: 12px;
    }
</style>

 <?php echo $this->fetch('content'); ?>
<?php 
    echo $this->element('sql_dump'); 
    
    echo $this->element('htmlFooter');
?>