<?php

App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

    
class User extends AppModel {
    
    public $hasOne = array(
        'Customer' => array(
            'className' => 'Customer',
            //'conditions' => array('Customer.user_id' => 'User.id'),
            'dependent' => false
        )
    );
    

    public function beforeSave($options = array()) {
        if (!$this->id || $this->id) {
            $passwordHasher = new SimplePasswordHasher();
            /*$data = $this->request->data;
            $data['User']['password'] = AuthComponent::password($data['User']['password']);*/
            $this->data['User']['password'] = $passwordHasher->hash(
              $this->data['User']['password']
            ); 
        }
        return true;
    }
}