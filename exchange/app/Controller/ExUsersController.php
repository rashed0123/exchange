<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');


class ExUsersController extends AppController {
    
    var $uses = array('ExHouseInfo','ExUser','ExOtp');
    
    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        
    }
  
//    public function login() {
//	
//        //if already logged-in, redirect
//        if($this->Session->check('Auth.User')){
//                $this->redirect(array('action' => 'index'));		
//        }
//
//        // if we get the post information, try to authenticate
//       
//        
//        $this->layout = 'login_panel_layout';
//        
//        $array = array(
//            
//            'title'=> 'Remittance Exchange Login Panel'
//            
//        );
//        
//        $this->set($array);
//        
//         if ($this->request->is('post')) {
//             
//              //if user has atempted a login
//    
//        if ($this->Auth->login()) {
//            //If login detials are correct get user data
//            $marshal = $this->ExUser->find('first',
//                        array(
//                            'conditions'=>array(
//                                "ExUser.ex_user_id"     => $this->request->data['ex_user_id'],
//                            )
//                        )
//                    );
//                    if(!empty($marshal)){
//                        //set marshal session data to track logged in users and their data
//                        $this->Session->write("Marshal",$marshal);
//                    }
//                    //redirect user to the logged in page
//                    $this->redirect($this->Auth->redirect());
//                } else {
//                    $this->Session->setFlash(__('Invalid username or password, try again'));
//                    debug($this->Auth->request->data);
//                }
            
//            print_r($this->request->data);
//            exit;
            
//             echo $this->Auth->user('ex_user_id');
//             exit;
//                if ($this->Auth->login()) {
//                    echo '1';
//                    echo $this->Auth->user('username');
//                    exit;
//                        $this->Session->setFlash(__('<div class="success"><strong>Success: </strong>Welcome, '. $this->Auth->user('username').'</div>'));
//                        $this->redirect($this->Auth->redirectUrl());
//                } else {
//                        $this->Session->setFlash(__('<div class="error"><strong>Error: </strong>Invalid username or password</div>'));
//                }
//        }
//    }
//    
    public function login() {
        
        $userdata = $this->Session->read('Auth');
        if($userdata['ExUser']['ex_user_id'])
        {
            $this->redirect(array('action' => 'index'));
        }
        
        $this->layout = 'login_panel_layout';
        
        $array = array(
            
            'title'=> 'Remittance Exchange Login Panel'
            
        );
        
        $this->set($array);
        
        if ($this->request->is('post')) {
        
            
            $user = $this->ExUser->find('first', array('conditions' => array('ex_user_id' => $this->request->data['userid'])));
                
               if(!empty($user)){  
               
                    $db_pass        = $user['ExUser']['ex_password'];
                    
                    $input_password = md5($this->request->data['ex_password']);
                    
                    if($db_pass == $input_password)
                    {
//                        if (!isset($this->ExHouseInfo))
//                            
//                        $this->loadModel('ExHouseInfo');
                        
                        $ex_house_info_id  = $user['ExUser']['ex_house_info_id'];
                    
                        $ex_info = $this->ExHouseInfo->findByExHouseId($ex_house_info_id);
                        //print_r($ex_info);
                       // exit;
                        //success_status
                        
                        $otp['ExOtp']['success_status'] = 0;
                        
                        $this->Session->write('Auth',$user);
                        $this->Session->write('Otp',$otp);
                        $this->Session->write('HouseInfo',$ex_info);
                        
                        $session_data = $this->Session->read('Auth');
                       
                        //    echo $data['ExUser']['ex_user_id'];
                        
                        $otp_generate = rand(11111, 99999);
                        
                        $existing_data = $this->ExOtp->findByExUsersId($session_data['ExUser']['ex_user_id']);
                       // pr($existing_data);
                        //exit;
                        if(count($existing_data)>0)
                        {
                           $this->ExOtp->query("Update ex_otps SET otp_code ='".$otp_generate."',status='1', attemp=0,success_status=0 where ex_otp_id = '".$existing_data['ExOtp']['ex_otp_id']."' and ex_users_id='".$session_data['ExUser']['ex_user_id']."'");
                            //$ex_otp_id = '';
                           //$ex_otp_id = $existing_data['ExOtp']['ex_otp_id'];
                        }else{
                             $data_array = array(
                               // 'ex_otp_id'         => $ex_otp_id,
                                'ex_users_id'       => $session_data['ExUser']['ex_user_id'],
                                'otp_code'          => $otp_generate,
                                'status'            => 1,
                                'attemp'            => 0,
                                'success_status'    => 0
                            );
                            $this->ExOtp->save($data_array);
                        }
                        //$this->Session->write('otp',);
//                            $data_array = array(
//                                'ex_otp_id' => $existing_data['ExOtp']['ex_otp_id'],
//                                'ex_users_id' => $session_data['ExUser']['ex_user_id'],
//                                'otp_code' => $otp_generate,
//                                'status'    => 1
//                            );
//                            $this->ExOtp->save($data_array);

                        
                        $cus_email = urlencode($ex_info['ExHouseInfo']['email_id']);
                        
                        $email ='<html>
                                <body style="border:1px solid gray;max-width:800px;">
                                <div>
                                <div>';
                        $email .= '<p>Dear '.$ex_info["ExHouseInfo"]["ex_house_name"].',</p></div>
                                    Your OTP has been generated. <p> your OTP is: <strong>'.$otp_generate;
                        $email .= '</strong></p><p> Copy this OTP and paste it into your remittance exchange panel.</p></div>
                                </body>
                                </html>';

/// Email settings 
//
//                        $server = '202.51.191.67/epayment/index.php/cmticketxml/send_mail/?';
//                        $post_fileds = 'email_to=' . $cus_email . '&message=' ."$email" . '&subject=' . 'OTP Generate of Remittance Exchange';
//                        $ch = curl_init();
//                        curl_setopt($ch, CURLOPT_URL, $server);
//                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//                        curl_setopt($ch, CURLOPT_TIMEOUT, 100);
//                        curl_setopt($ch, CURLOPT_POST, true);
//                        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fileds);
//                        $step6_data = curl_exec($ch);
//                        //            pr($step6_data);die;
//                        if (curl_errno($ch)) {
//                            print curl_error($ch);
//                            echo "  something went wrong..... try later";
//                        }
//                        curl_close($ch);
                        

                        
                        $this->Session->setFlash('<div class="success"><strong>OTP Sent. </strong>Check your email inbox for OTP.</div>');
                        $this->redirect(array('action' => 'index'));
                        
                        
                       
                    }else{
                        $this->Session->setFlash('<div class="error"><strong>Error: </strong>Invalid password.</div>');
                   
                        $this->redirect(array('controller' => 'exusers','action'=> 'login'));
                    }
                    

                   
               }else{
                   
                   $this->Session->setFlash('<div class="error"><strong>Error: </strong>User ID is Invalid.</div>');
                   
                   $this->redirect($this->referer());
               }
        
        }
    }
    
    
    public function index()
    {
        $this->layout = 'login_panel_layout';
        $userdata = $this->Session->read('Auth');
        
        if($userdata['ExUser']['ex_user_id'])
        {
            
            $array = array(
                'title'=> 'Remittance Exchange OTP Panel'
            );

            $this->set($array);
            $this->layout = 'otp_panel_layout';
            $db_get_otp = $this->ExOtp->findByExUsersId($userdata['ExUser']['ex_user_id']);
            
            if($db_get_otp['ExOtp']['success_status'] ==1)
            {
                $this->redirect(array('controller'=>'dashboard', 'action' => 'index'));
                exit;
            }
            
            if($this->request->is('post'))
            {
                if($this->request->data['ExUsers']['submit'] == "Submit")
                {
                   $user_input_otp = $this->request->data['ExUsers']['otp_code'];
                   
                    $attemp  = $db_get_otp['ExOtp']['attemp'];
                    $s       = $db_get_otp['ExOtp']['status'];

                    if($attemp == 3 and $s == 1)
                    {
                         $this->Session->setFlash('<div class="error" style="padding-left:5px">Your have already tried 3 times. Click Resend OTP.</div>');
                         //$this->redirect(array('action' => 'index'));
                         //echo $this->Session->flash();
                         $this->redirect(array('controller'=>'exusers', 'action' => 'index'));
                         exit;
                    }
                   
                   if($user_input_otp == $db_get_otp['ExOtp']['otp_code'])
                   {
                       $attemps = $attemp+1; 
                       $this->ExOtp->query("Update ex_otps SET otp_code='', attemp='".$attemps."', status='2', success_status=1 where ex_otp_id = '".$db_get_otp['ExOtp']['ex_otp_id']."'");
                       
                        $otp['ExOtp']['success_status'] = 1;
                        
                        $this->Session->write('Otp',$otp);
                                               
                        $this->Session->setFlash('<div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-info alert-dismissable">
                                       <i class="fa fa-info-circle"></i>  <strong>Success: </strong>Welcome to dashboard.</strong> 
                                    </div>
                                </div>
                            </div>');
//                        echo 'success';
//                        exit;
                        $this->redirect(array('controller'=>'dashboard', 'action' => 'index'));
                        exit;
                        
                   }else{
                       
                        $attemps = $attemp+1; 

                         $this->ExOtp->query("Update ex_otps SET attemp='".$attemps."',  
                              status='1' where ex_otp_id = '".$db_get_otp['ExOtp']['ex_otp_id']."'");

                         $this->Session->setFlash('<div class="error" style="padding-left:5px">Your OTP Code is wrong. You have tried '.$attemps.' times.</div>');
                         //$this->redirect(array('action' => 'index'));
                         //echo $this->Session->flash();
                         $this->redirect(array('controller'=>'exusers', 'action' => 'index'));
                         exit;
                   }
                }
            }
        }else{
            $this->Session->delete('Auth');
            $this->Session->delete('HouseInfo');
            $this->Session->destroy();
            $this->redirect('login');
        }
        
        
//        $info = $this->ExUser->findByExTbusersId(1);
//        print_r($info);
        
    }
    
    

    public function logout() {
        
        $this->Session->delete('Auth');
        
        $this->Session->delete('HouseInfo');
        
        $this->Session->destroy();
        
        $this->redirect('login');
    }
    
    public function resend_otp()
    {
        
        $userdata = $this->Session->read('Auth');
        
        if($userdata['ExUser']['ex_user_id'])
        {
            $otp_generate = rand(11111, 99999);
                        
            $existing_data = $this->ExOtp->findByExUsersId($userdata['ExUser']['ex_user_id']);   

                if(count($existing_data))
                {
                   $this->ExOtp->query("Update ex_otps SET otp_code='".$otp_generate."',status='1', attemp=0,success_status=0 where ex_users_id='".$userdata['ExUser']['ex_user_id']."'");
                    //$ex_otp_id = '';
                   //$ex_otp_id = $existing_data['ExOtp']['ex_otp_id'];
                    
                }else{
                    $data_array = array(
                    'ex_otp_id'         => $ex_otp_id,
                    'ex_users_id'       => $userdata['ExUser']['ex_user_id'],
                    'otp_code'          => $otp_generate,
                    'status'            => 1
                );
                $this->ExOtp->save($data_array);
                }
                
                $otp['ExOtp']['success_status'] = 0;
                        
                $this->Session->write('Otp',$otp);
                $house_infos = $this->Session->read('HouseInfo');
//                print_r($house_infos);
//                exit;
                $cus_email = urlencode($house_infos['ExHouseInfo']['email_id']);
                
                $email ='<html>
                        <body style="border:1px solid gray;max-width:800px;">
                        <div>
                        <div>';
                $email .= '<p>Dear '.$house_infos["ExHouseInfo"]["ex_house_name"].',</p></div>
                            Your OTP has been generated. <p> your OTP is: <strong>'.$otp_generate;
                $email .= '</strong></p><p> Copy this OTP and paste it into your remittance exchange panel.</p></div>
                        </body>
                        </html>';
                      
    /// Email settings                   
//                $server = '202.51.191.67/epayment/index.php/cmticketxml/send_mail/?';
//                $post_fileds = 'email_to=' . $cus_email . '&message=' ."$email" . '&subject=' . 'OTP Generate of Remittance Exchange';
//                $ch = curl_init();
//                curl_setopt($ch, CURLOPT_URL, $server);
//                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//                curl_setopt($ch, CURLOPT_TIMEOUT, 100);
//                curl_setopt($ch, CURLOPT_POST, true);
//                curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fileds);
//                $step6_data = curl_exec($ch);
//                //            pr($step6_data);die;
//                if (curl_errno($ch)) {
//                    print curl_error($ch);
//                    echo "  something went wrong..... try later";
//                }
//                curl_close($ch);
                
                $this->Session->setFlash('<div class="success"><strong>OTP Sent. </strong>Please Check your inbox again.</div>');
                $this->redirect(array('action'=>'index'));
                exit;
        }else{

            $this->redirect(array('action'=>'login'));

        }
    }  
    
}