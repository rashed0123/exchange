<?php

App::uses('AppController', 'Controller');
App::uses('Xml', 'Utility');

class AjaxController extends AppController {

    var $name = "Ajax";
    public $components = array('RequestHandler');
    public $helpers = array('Html', 'Js' => array('Jquery'), 'Session');
    
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
    
    public function ajax_operator() {
        if ($this->RequestHandler->isAjax()) {
            if (!isset($this->TmpRemitterInfo))
                $this->loadModel('TmpRemitterInfo');
            $civil_id = $this->data['civil_id'];
            $remitter = $this->TmpRemitterInfo->findByCivilId($civil_id);
            $this->set('remitter', $remitter);
        }
    }

    public function is_register() {
        if ($this->RequestHandler->isAjax()) {
            $ac_no = $this->data['account_no'];
            $ac_type = $this->data['account_type'];
//            $data = $this->data;


            $server = '192.168.10.124/hellocash_api/api.php?rquest=is_register';
            
            $post_fileds = 'mphone=' . $ac_no . '&bank_id=' . $ac_type;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $server);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 100);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fileds);
            $step3_data = curl_exec($ch);

            if (curl_errno($ch)) {
                print curl_error($ch);
                echo "  something went wrong..... try later";
            } else {
                curl_close($ch);
            }
//            echo $ac_type;
//            exit;
//           $this->set('rcv_data', $ac_type);
           $this->set('rcv_data', base64_decode($step3_data));
//            $this->set('data', $step3_data);
//            $this->set('datas', $step3_data);
        }
    }

    public function new_register() {
        if ($this->RequestHandler->isAjax()) {
            $ac_type = $this->data['srvc_name'];
            $mobile_no = $this->data['mobile_no'];
            $type = $this->data['type'];
            $value = $this->data['value'];
//            $ac_type= 1;

            $server = '192.168.10.124/hellocash_api/api.php?rquest=registration';
            $post_fileds = 'mphone=' . $mobile_no . '&bank_id=' . $ac_type . '&photo_id_type=' . $type . '&photo_id=' . $value;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $server);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 100);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fileds);
            $step3_data = curl_exec($ch);

            if (curl_errno($ch)) {
                print curl_error($ch);
                echo "  something went wrong..... try later";
            } else {
                curl_close($ch);
            }

            $this->set('data', base64_decode($step3_data));
//            $this->set('data2', $mobile_no);
//            $this->set('data3', $type);
//            $this->set('data4', $value);
        }
    }

    public function confirm_payment() {
        if ($this->RequestHandler->isAjax()) {
            $ac_type = $this->data['ac_type'];
            $mobile_no = $this->data['mobile_no'];
            $amount_rcv = $this->data['amount'];
            $amount = substr($amount_rcv,4);
            
            
            $server = '192.168.10.124/hellocash_api/api.php?rquest=m_transfer';
            $post_fileds = 'mphone=' . $mobile_no . '&bank_id=' . $ac_type .'&amount='.$amount;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $server);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, 100);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fileds);
            $step3_data = curl_exec($ch);

            if (curl_errno($ch)) {
                print curl_error($ch);
                echo "  something went wrong..... try later";
            } else {
                curl_close($ch);
            }
            
            $this->set('data', base64_decode($step3_data));
        }
    }

}
