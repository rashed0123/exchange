<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppModel', 'Model');

//App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');


class ExUserModel extends AppModel {
   //$primary = ''
    var $belongsTo = array(
        'ExHouseInfos' => array(
            'className' => 'ExHouseInfos',
            'fields' => array('ex_house_id', 'ex_house_name'),
            'foreignKey' => 'ex_house_id',
//            'localKey' => 'group_id'
        )
    );
   
    
}
