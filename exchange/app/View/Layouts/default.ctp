<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$cakeDescription = __d('cake_dev', 'Remittance Exchange');

$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        echo $this->Html->meta('icon');


        echo $this->Html->css(array('bootstrap.min', 'sb-admin'));
        echo $this->Html->css('plugins/morris');
        echo $this->Html->css('font-awesome/css/font-awesome.min');
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
        <?php
        echo $this->Html->script(array(
            'jquery.js',
            'bootstrap.min.js',
            'plugins/morris/raphael.min.js',
            'plugins/morris/morris.min.js',
            'plugins/morris/morris-data.js',
//            'hmw/jquery.hmw.js'
            'jquery-1.11.0.min.js'
        ));
        ?>
    </head>
    <body>
        <div id="wrapper">

            <!-- Navigation -->
             <?php echo $this->element('topmenu')?>

            <div id="page-wrapper">

                <div class="container-fluid">
                    

                    <div id="content"> 
                        <?php echo $this->fetch('content'); ?>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

        </div>
        
        <?php  echo $this->element('sql_dump'); ?>
        
    </body>
</html>
