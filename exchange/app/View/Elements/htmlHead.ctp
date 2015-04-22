<?php echo $this->Html->docType('html5');?>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
  
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=1,initial-scale=1,user-scalable=1" />
	<title><?php echo $title; ?></title>
	<!-- Custom CSS -->
          <?php echo $this->Html->css(array('css/bootstrap.min','css/bootstrap-theme.min','style','google_font')); ?>
    
        
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
     <?php echo $this->html->script(array('html5shiv.min.js','respond.min.js')); ?>
      
    <![endif]-->
	<!-- jQuery Library -->
        <?php echo $this->html->script(array('jquery.1.10.0.js','bootstrap.min.js')); ?>
    <!-- Bootstrap Core JS -->
	
</head>
<body>