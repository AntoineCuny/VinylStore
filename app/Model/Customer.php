<?php

//App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
 
class Customer extends AppModel {

    public $hasOne = array(
        'User' => array(
            'className' => 'User',
            //'conditions' => array('Customer.user_id' => 'User.id'),
            'dependent' => false
        )
    );
    
}