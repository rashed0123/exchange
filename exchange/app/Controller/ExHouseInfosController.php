<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('AppController', 'Controller');


class ExHouseInfosController extends AppController {
    
    var $uses = array('ExHouseInfo','ExUser');
    
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
    
    
    function index()
    {
       // $allArticles = $this->ExHouseInfo->find('all');
        //debug($this->ExHouseInfo->lastQuery());
        $result = $this->ExUser->query("Select * From ex_users inner join ex_house_infos where ex_users.ex_house_info_id = ex_house_infos.ex_house_id 
            and ex_users.ex_user_type != 1");
        
//        find('all',array(
//            'conditions'    => array('ExUser.ex_house_info_id = ExHouseInfo.ex_house_id')
//        ));
       
        $this->set('houseInfo',$result);
        
    }
    
    function add_new_exchage_house()
    {
        if($this->request->is('post'))
        {
            if ($this->ExHouseInfo->validates()) {
               // pr($this->request->data);
                $ex_house_name      = $this->request->data['exchange']['ex_house_name'];
                $ex_user_id         = $this->request->data['exchange']['ex_user_id'];
                $contact_no      = $this->request->data['exchange']['contact_no'];
                $email_address         = $this->request->data['exchange']['email_address'];
                $address            = $this->request->data['exchange']['address'];
                $website            = $this->request->data['exchange']['website'];
                
                $check_valid = $this->check_userid($ex_user_id);
                if($check_valid)
                {
                    $this->Session->setFlash('<div class="alert alert-warning">
                                            <strong>Warning!</strong> This User ID already Exists.
                                        </div>');
                    //$this->redirect(array('controller'=>'dashboard', 'action' => 'index'));
                    $this->redirect(array('controller' =>'exhouseinfos', 'action' => 'add_new_exchage_house'));
                    exit;
                }
                
                $dataArray = array(
                    'ex_house_name' => $ex_house_name,
                    'contact_no'    => $contact_no,
                    'email_id'      => $email_address,
                    'ex_address'    => $address,
                    'website'       => $website
                );
                $this->ExHouseInfo->save($dataArray);
                $lastId = $this->ExHouseInfo->getLastInsertId();
                
                $ex_password = md5(123456);
                $dataUser = array(
                    'ex_user_id' => $ex_user_id,
                    'ex_password'=> $ex_password,
                    'ex_house_info_id'=> $lastId,
                    'ex_user_type'=> 2
                );
                 $this->ExUser->save($dataUser);
                //$this->set("last", $this->Myaccount->getLastInsertId());
                        
                $this->Session->setFlash('<div class="alert alert-success"><strong>Well done!</strong> You successfully added new remittance house.
                </div>');
                $this->redirect(array('controller' => 'exhouseinfos', 'action' => 'index'));
                
            } else {
                
                // didn't validate logic
                $errors = $this->ExHouseInfo->validationErrors;
                
                pr($errors);
                print_r($errors);
            }
            
            
            
            
        }
        
    }
    
    function check_userid($ex_user_id)
    {
        $row = $this->ExUser->query("Select * From ex_users where ex_user_id='".$ex_user_id."'");
        if(count($row))
        {
            return true;
        }else{
            return false;
        }
        
            
        
    }
    
    
    public function update_houseinfo($exhouseid = NULL)
    {
        
//        if(!isset($countries))
//        {
//            
//        }
//        $country = $this->Countries->find('all');
        
        if($this->request->is('post'))
        {
           // pr($this->request->data);
             $ex_house_name      = $this->request->data['exchange']['ex_house_name'];
             $ex_house_id      = $this->request->data['exchange']['ex_house_id'];
             //$ex_user_id         = $this->request->data['exchange']['ex_user_id'];
             $contact_no      = $this->request->data['exchange']['contact_no'];
             $email_address         = $this->request->data['exchange']['email_address'];
             $address            = $this->request->data['exchange']['address'];
             $website            = $this->request->data['exchange']['website'];


             $this->ExHouseInfo->query("Update ex_house_infos SET 
                 ex_house_name = '".$ex_house_name."',contact_no = '".$contact_no."',email_id = '".$email_address."',
                 ex_address = '".$address."',website = '".$website."' where ex_house_id = '".$ex_house_id."'"); 
//                $dataArray = array(
//                    'ex_house_id'   => $ex_house_id,
//                    'ex_house_name' => $ex_house_name,
//                    'contact_no'    => $contact_no,
//                    'email_id'      => $email_address,
//                    'ex_address'    => $address,
//                    'website'       => $website
//                );
//                $this->ExHouseInfo->save($dataArray);

             //$this->set("last", $this->Myaccount->getLastInsertId());

             $this->Session->setFlash('<div class="alert alert-success"><strong>Well done!</strong> You have successfully update exchange house information.
             </div>');
             $this->redirect(array('controller' => 'exhouseinfos', 'action' => 'index'));
        }
        //echo $this->params['url']['status'];
       $houseUpdateInfo =  $this->ExHouseInfo->query("Select * From ex_house_infos inner join ex_users where 
           ex_house_infos.ex_house_id = ex_users.ex_house_info_id and ex_users.ex_user_type = 2 and 
           ex_house_infos.ex_house_id='".base64_decode($exhouseid)."'");
       
       if(count($houseUpdateInfo))
       {
         //  pr($houseUpdateInfo);
           //exit;
           $this->set('information',$houseUpdateInfo);
           //$this->set('country',$country);
       }else{
           $this->Session->setFlash('<div class="alert alert-warning">
                                            <strong>Warning!</strong> This user is not valid.
                                        </div>');
           $this->redirect(array('controller' => 'exhouseinfos','action'=>'index'));
       }
       
    }
    
    function settings()
    {
        if($this->request->is('post'))
        {
           // pr($this->request->data);
             $ex_house_name      = $this->request->data['exchange']['ex_house_name'];
             $ex_house_id      = $this->request->data['exchange']['ex_house_id'];
             //$ex_user_id         = $this->request->data['exchange']['ex_user_id'];
             $contact_no      = $this->request->data['exchange']['contact_no'];
             $email_address         = $this->request->data['exchange']['email_address'];
             $address            = $this->request->data['exchange']['address'];
             $website            = $this->request->data['exchange']['website'];


             $this->ExHouseInfo->query("Update ex_house_infos SET 
                 ex_house_name = '".$ex_house_name."',contact_no = '".$contact_no."',email_id = '".$email_address."',
                 ex_address = '".$address."',website = '".$website."' where ex_house_id = '".$ex_house_id."'"); 


             $this->Session->setFlash('<div class="alert alert-success"><strong>Well done!</strong> You have successfully update exchange house information.
             </div>');
             $this->redirect(array('controller' => 'exhouseinfos', 'action' => 'settings'));
        }
        
        $se = $this->Session->read('HouseInfo');
        $ex_house_info_id = $se['ExHouseInfo']['ex_house_id'];
        //exit;
        $houseUpdateInfo =  $this->ExHouseInfo->query("Select * From ex_house_infos inner join ex_users where 
           ex_house_infos.ex_house_id = ex_users.ex_house_info_id  and 
           ex_house_infos.ex_house_id='".$ex_house_info_id."'");
       
        if(count($houseUpdateInfo)>0)
        {
         //  pr($houseUpdateInfo);
           //exit;
           $this->set('information',$houseUpdateInfo);
           //$this->set('country',$country);
        }else{
           $this->Session->setFlash('<div class="alert alert-warning">
                                            <strong>Warning!</strong> This user is not valid.
                                        </div>');
           $this->redirect(array('controller' => 'exhouseinfos','action'=>'index'));
        }
    }
    
    function changepassword()
    {
        $get_user_data = $this->Session->read("Auth"); 
        
        
        if($this->request->is('post'))
        {
            $current_password = md5($this->request->data['change']['current_password']);
//            echo $current_password = md5($this->request->data['change']['current_password']);
//            echo '<br/>';
//            echo $get_user_data['ExUser']['ex_password'];
//            exit;
            if($current_password != $get_user_data['ExUser']['ex_password'])
            {
                $this->Session->setFlash('<div class="alert alert-danger"><strong>Error:</strong> Your current password does not matches.
             </div>');
                $this->redirect(array('controllers' => '','action' => 'changepassword' ));
            }
           
            
            $new_password = $this->request->data['change']['new_password'];
            
            $confirm_password = $this->request->data['change']['confirm_password'];
            
            if(strlen($new_password) < 8 )
            {
                $this->Session->setFlash('<div class="alert alert-danger"><strong>Error:</strong> Your new password must be grater then or equal to 8 digits.
                </div>');
                $this->redirect(array('controllers' => '','action' => 'changepassword' ));
            }
            
            if($new_password != $confirm_password)
            {
                $this->Session->setFlash('<div class="alert alert-danger"><strong>Error:</strong> Your new password and confirm password does not matches.
                </div>');
                $this->redirect(array('controllers' => '','action' => 'changepassword' ));
            }
            $ex_pass    = md5($this->request->data['change']['new_password']);
            
            $ex_tbusers_id = $get_user_data['ExUser']['ex_tbusers_id'];
            
            $this->ExUser->query("Update ex_users SET ex_password = '".$ex_pass."' where ex_tbusers_id='".$ex_tbusers_id."'");
            
            $this->Session->setFlash('<div class="alert alert-success"><strong>Success:</strong> Your new password has been saved.
            </div>');
            $this->redirect(array('controllers' => '','action' => 'changepassword' ));
            
            
        }
        //print_r($get_user_data);
       // exit;
// $this->Session->
    }
}
