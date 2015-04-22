<?php

class RemittanceController extends AppController {
    
    function beforeFilter() {
        parent::beforeFilter();
        $authentication = $this->Session->read('Auth');
       
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

    public function remitter() {
        
    }

    public function remittance_info() {
        if (!isset($this->RemitterInfo))
            $this->loadModel('RemitterInfo');
        if (!isset($this->TmpRemitterInfo))
            $this->loadModel('TmpRemitterInfo');
        
        $remit_param = array();
        if ($this->request->is('post')) {
            $remit_param = $this->request->data;            
        } elseif ($this->Session->read('remit_param')) {
            $remit_param = $this->Session->read('remit_param');
        }
        $data = $remit_param; 
//        pr($data);
        
        if (!empty($data['civil_id'])) {
            $count = $this->TmpRemitterInfo->findByCivilId($data['civil_id']);
            if (!empty($count)) {
                $id = $count['TmpRemitterInfo']['id'];
            } else {
                $id = '';
            }
            $remiter_info = array(
                "id" => $id,
                "civil_id" => $data['civil_id'],
                "name" => $data['name'],
                "mobile_no" => $data['mobile_no'],
                "address" => $data['address']
            );

            $this->TmpRemitterInfo->save($remiter_info);
//             $this->RemitterInfo->save($data); 

            $this->set('data', $data);
            $this->set('remitter', $remiter_info);
        } else {
            echo 'Please Come into Right formate !!';
            die;
        }
//        die;
    }

    public function beneficiary_info() {
        if (!isset($this->RemitterInfo))
            $this->loadModel('RemitterInfo');
        if (!isset($this->TmpRemitterInfo))
            $this->loadModel('TmpRemitterInfo');        
        $data = $this->request->data;
        $this->Session->write('remit_param', $data);
        if (!empty($data['drate'])) {
//            pr($data);  
            $this->set('data', $data);
        } else {
            echo 'Please Come into Right formate !!';
            die;
        }
//        die;
    }

    public function all_info_confirm() {
        $data = $this->request->data;
        $this->set('data', $data);
        if ($this->request->is('post')) {
//            pr($data);
        }
    }
    public function confirm_payment(){
        if (!isset($this->RemitterInfo))
            $this->loadModel('RemitterInfo');
//        $data = $this->request->data;
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $tr_id = substr($data['response'],-14);
            $dollar = substr($data['dollar'], 2);
            $taka = substr($data['taka'], 4);
            
            $remiter = array(
                'civil_id' => $data['civil_id'],
                'tr_id' => $tr_id,
                'name' => $data['name'],
                'mobile_no' => $data['mobile_no'],
                'address' => $data['address'],
                'local_currency' => $data['currency'],
                'local_dollar' => $dollar,
                'dollar_rate' => $data['drate'],
                'bdt_rate' => $data['bdt_drate'],
                'taka' => $taka,
                'ac_type' => $data['ac_type'],
                'mb_service' => $data['mb_service'],
                'ben_mobile' => $data['mb_account'], 
                'cus_name' => $data['cs_name'], 
                'response' => $data['response'], 
//                'status' => $data['status'], 
            );
            $this->RemitterInfo->save($remiter);
            $this->Session->write('remiter_sus', $data);
            $this->Session->write('tr_id', $tr_id);
//            $this->Session->setFlash('The Navigation has been deleted.');
            $this->redirect(array('action' => 'print_remitter'));            
//            pr($dollar);            
        }
    }
    
    public function print_remitter(){
        $data = $this->Session->read('remiter_sus');
        $tr_id = $this->Session->read('tr_id');
        $this->set('data', $data);
        $this->set('tr_id', $tr_id);
    }

    public function dashboard() {
        
    }

    public function agent() {
        
    }

    public function contact() {
        
    }

}
