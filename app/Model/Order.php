<?php

//App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
 
class Order extends AppModel {

	public $useTable = 'orders';
    
    public $belongsTo = array(
        'Customer' => array(
            'className' => 'Customer',
            'foreignKey' => 'customer_id',
            'type' => 'left'
        ));

	public $hasMany = array(
        'OrderItems' => array(
            'className' => 'OrderDetails',
            'dependent' => false
        ));


}