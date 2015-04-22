<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppModel', 'Model');


/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class ExHouseInfoModel extends Model {
    
    public $validate = array(
        'ex_house_name' => array(
            'alphaNumeric' => array(
                //'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'Exchange House Name is required.'
            )
        ),
        'ex_user_id' => array(
            'rule' => array('minLength', '8'),
            'required' => true,
            'message' => 'Minimum 8 characters long'
        ),
        'contact_no' => array(
            'rule' => 'Numeric',
            'required' => true,
            'message' => 'Contact Number will be Numeric'
        ),
        'address' => array(
           // 'rule' => 'Numeric',
            'required' => true,
            'message' => 'Exchange House Address is required'
        ),
        'email_address' => array(
            'rule' => 'email',
            'required' => true,
            'message' => 'Valid Email Address is required'
        )
    );
    
    public $useTable = 'ex_house_info';
    var $primary_key = 'ex_house_id';
    
    
}


