<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

App::uses('AppController', 'Controller');

/**
 * CakePHP DashboardController
 * @author IT
 */
class DashboardController extends AppController {

   function beforeFilter() {
       parent::beforeFilter();
       
       $authentication  = $this->Session->read('Auth');
       $otp             = $this->Session->read('Otp');
       
        if($authentication['ExUser']['ex_user_id'] == "")
        {
            $this->redirect(array('controller'=>'exusers','action'=>'login'));
        }
        
        if($otp['ExOtp']['success_status'] == 0)
        {
            $this->Session->setFlash('<div class="error"><strong>Error: </strong>Your must be check your OTP Code.</div>');
            
            $this->redirect(array('controller'=>'exusers','action'=>'index'));
        }

        $HouseInfo = $this->Session->read('HouseInfo');

        $this->set('username',$authentication['ExUser']['ex_user_id']);

        $this->set('admin_type',$authentication['ExUser']['ex_user_type']);

        $this->set('ex_house_name',$HouseInfo['ExHouseInfo']['ex_house_name']);
        $this->set('title_for_layout',$HouseInfo['ExHouseInfo']['ex_house_name']);
        $this->Auth->allow();
    
   }
    public function index() {
       
    }

}
