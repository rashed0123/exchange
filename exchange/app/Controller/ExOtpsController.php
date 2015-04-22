<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');

/**
 * CakePHP ExOtpController
 * @author IT
 */
class ExOtpsController extends AppController {
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }
    
    public function index($id) {
        
    }

}
