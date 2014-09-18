<?php

//App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
 
class OrderDetails extends AppModel {

    public $name = 'OrderDetails';
	public $useTable = 'order_details';
    
    public $belongsTo = array(
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'order_id',
            'type' => 'left'
        ));

	public $hasOne = array(
        'Product' => array(
            'className' => 'Product',
            'dependent' => false
        ));


}